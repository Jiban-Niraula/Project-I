<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\CategoryRequestForm;
use App\Http\Middleware\AdminMiddleware;


    class CategoryController extends Controller
    {
        public function index() {
            // Fetch categories with the associated 'created_by' user
            $category = Category::with('created_by')->where('is_deleted', false)->get();
            return view('admin.category.index', compact('category'));
        }

        public function create(){
            return view('admin.category.create');
        }

        // Controller function to store the created category
        public function store(CategoryRequestForm $request){
            $data = $request->validated();

            $category = new Category;

            $category->name = $data['name'];
            $category->slug = $this->generateSlug($data['name']);;
            $category->description = $data['description'];
            $category->levelType = $data['levelType'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keyword = $data['meta_keyword'];
            $category->navbar_status = $request->has('navbar_status'); // This will be true if checked, false if not
            $category->status = $request->has('status'); // Same logic applies here
            $category->created_by = auth()->user()->id;
            $category->save();

            // Return with a success message or redirect
            return redirect('admin/faculty')->with('message', 'Faculty added successfully!');
        }

        public function edit($category_id){
            $category = Category::find($category_id);
            return view('admin.category.edit',compact('category'));
        }
        public function update(CategoryRequestForm $request, $category_id){
            $data = $request->validated();

            $category = Category::find($category_id);
            $category->name = $data['name'];
            $category->slug = $this->generateSlug($data['name']);;
            $category->description = $data['description'];
            
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keyword = $data['meta_keyword'];
            $category->navbar_status = $request->has('navbar_status'); // This will be true if checked, false if not
            $category->status = $request->has('status'); // Same logic applies here
            $category->created_by = auth()->user()->id;
            $category->update();

            // Return with a success message or redirect
            return redirect('admin/faculty')->with('message', 'Faculty Updated successfully!');
        }

        public function destroy($category_id){
            // Find the category by ID
            $category = Category::find($category_id);

            // Check if the category exists
            if ($category) {
                // Perform soft delete
                $category->is_deleted = true; // or $category->is_deleted = 1;
                $category->save();

                // Return a success message or redirect
                return redirect('admin/faculty')->with('message', 'Category deleted successfully!');
            }

            // If the category does not exist
            return redirect('admin/faculty')->with('error', 'Category not found!');
        }

        private function generateSlug($name)
        {
            // Convert to lowercase, remove special characters, and replace spaces with hyphens
            $slug = strtolower(trim($name)); // Lowercase and trim the name
            $slug = preg_replace('/[^a-z0-9 -]/', '', $slug); // Remove special characters
            $slug = preg_replace('/\s+/', '-', $slug); // Replace spaces with dashes
            $slug = preg_replace('/-+/', '-', $slug); // Replace multiple dashes with a single one
    
            // Check if the slug already exists, and append a number if necessary
            $count = Category::where('slug', $slug)->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1); // Append a number to make the slug unique
            }
    
            return $slug;
        }

        
    }

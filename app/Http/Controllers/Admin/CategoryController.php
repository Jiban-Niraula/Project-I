<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\CategoryRequestForm;
use App\Http\Middleware\AdminMiddleware;


class CategoryController extends Controller
{
    public function index(){
            // Fetch only categories where is_deleted is false
            $category = Category::where('is_deleted',false)->get();// or ->where('is_deleted', 0)
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
        $category->slug = $data['slug'];
        $category->description = $data['description'];

        // Correct the method to check if the image is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/category', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $data['meta_title']; // Fixed typo
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->has('navbar_status'); // This will be true if checked, false if not
        $category->status = $request->has('status'); // Same logic applies here
        $category->created_by = auth()->user()->id;
        $category->save();

        // Return with a success message or redirect
        return redirect('admin/category')->with('message', 'Category added successfully!');
    }

    public function edit($category_id){
        $category = Category::find($category_id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(CategoryRequestForm $request, $category_id){
        $data = $request->validated();

        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/category', $filename);
            $category->image = $filename;
            }
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->has('navbar_status'); // This will be true if checked, false if not
        $category->status = $request->has('status'); // Same logic applies here
        $category->created_by = auth()->user()->id;
        $category->update();

        // Return with a success message or redirect
        return redirect('admin/category')->with('message', 'Category Updated successfully!');
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
            return redirect('admin/category')->with('message', 'Category deleted successfully!');
        }

        // If the category does not exist
        return redirect('admin/category')->with('error', 'Category not found!');
    }

}

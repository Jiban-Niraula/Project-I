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
        return view('admin.category.index');
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
}

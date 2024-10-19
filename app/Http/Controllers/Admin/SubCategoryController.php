<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category; // Import the Category model
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SubCategoryRequestForm;

class SubCategoryController extends Controller
{
    // Display the list of subcategories
    public function index()
    {
        $subcategories = SubCategory::where('is_deleted', false)->get();
        return view('admin.subcategory.index', compact('subcategories'));
    }

    // Show the form to create a new subcategory
    public function create()
    {
        // Fetch only non-deleted categories
        $categories = Category::where('is_deleted', false)->get();
        return view('admin.subcategory.create', compact('categories'));
    }

    // Store a new subcategory
    public function store(SubCategoryRequestForm $request)
    {
        // Validate the input
        $validatedData = $request->validated();

        // Generate a unique slug
        $slug = \Str::slug($validatedData['slug']);
        $existingSlugCount = SubCategory::where('slug', $slug)->count();

        if ($existingSlugCount > 0) {
            $slug = $slug . '-' . time(); // Append timestamp for uniqueness
        }

        // Create a new subcategory
        $subcategory = new SubCategory();
        $subcategory->name = $validatedData['name'];
        $subcategory->slug = $slug;
        $subcategory->category_id = $validatedData['category_id'];
        $subcategory->navbar_status = $request->has('navbar_status');
        $subcategory->status = $request->has('status');
        $subcategory->created_by = auth()->id();
        $subcategory->save();

        return redirect('admin/subcategory')->with('message', 'Subcategory created successfully!');
    }


    public function edit($subcategory_id)
    {
        $subcategory = SubCategory::findOrFail($subcategory_id);
        // Fetch categories for the dropdown (if required)
        $categories = Category::where('is_deleted', false)->get();
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(SubCategoryRequestForm $request, $subcategory_id)
    {
        // Validate the input
        $validatedData = $request->validated();

        $subcategory = SubCategory::findOrFail($subcategory_id);
        $subcategory->name = $validatedData['name'];
        $subcategory->slug = $validatedData['slug']; // Update the slug
        $subcategory->category_id = $validatedData['category_id']; // Update foreign key to Category
        $subcategory->navbar_status = $request->has('navbar_status'); // Checkbox handling
        $subcategory->status = $request->has('status'); // Checkbox handling
        $subcategory->save(); // Save the updated subcategory

        return redirect('admin/subcategory')->with('success', 'SubCategory updated successfully.');
    }

    public function destroy($subcategory_id)
    {
        $subcategory = SubCategory::findOrFail($subcategory_id);
        $subcategory->is_deleted = true; // Soft delete
        $subcategory->save();

        return redirect('admin/subcategory')->with('success', 'SubCategory deleted successfully.');
    }
}

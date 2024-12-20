<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PostFormRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('is_deleted', false)->get();
        return view('admin.post.index', compact('posts'));
    }

    public function create(){
            $category = Category::where('status', '0')->where('is_deleted', '0')->get();
            return view('admin.post.create', compact('category'));
    }

    public function store(PostFormRequest $request){

        $data = $request->validated();

        $post = new Post;

        $post->name = $data['name'];
        $post->category_id = $data['category_id'];
        $post->slug = $this->generateSlug($data['name']);
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'] ?? null;
        $post->status = $request->status == true ? "1":"0";
        $post->created_by = Auth::user()->id;
        $post->save();

        try {
            $post->save();
            return redirect('admin/post')->with('message','Post Added Successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Failed to add post: ' . $e->getMessage());
        }


    }

    public function edit($post_id)
    {
    $post = Post::find($post_id);
    if (!$post) {
        return redirect('admin/posts')->with('error', 'Post not found!');
    }

    $categories = Category::all();
    $subcategories = SubCategory::all();

    return view('admin.post.edit', compact('post', 'categories', 'subcategories'));
}

public function update(PostFormRequest $request, $post_id)
{
    // Validate the request data
    $data = $request->validated();

    // Find the post by ID
    $post = Post::find($post_id);
    if (!$post) {
        return redirect('admin/post')->with('error', 'Post not found!');
    }

    // Update post fields with validated data
    $post->name = $data['name'];
    $post->slug = $this->generateSlug($data['name']);
    $post->description = $data['description'];
    $post->category_id = $data['category_id'];
    $post->yt_iframe = $data['yt_iframe'];
    $post->meta_title = $data['meta_title'];
    $post->meta_description = $data['meta_description'];
    $post->meta_keyword = $data['meta_keyword'];


    // Update checkbox values
    $post->status = $request->has('status'); // Active or not

    // Save the updated post
    $post->update();

    // Redirect back with a success message
    return redirect('admin/post')->with('message', 'Post updated successfully!');
}

public function destroy($post_id){
    // dd($post_id);
    $post = Post::findOrFail($post_id);
    $post->is_deleted = true; // Soft delete
    $post->update();

    return redirect('admin/post')->with('success', 'Post deleted successfully.');
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


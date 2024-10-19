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
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create(){
            $category = Category::where('status', '0')->where('is_deleted', '0')->get();
            $subcategory = subcategory::where('status', '0')->where('is_deleted', '0')->get();
            return view('admin.post.create', compact('category','subcategory'));
    }

    public function store(PostFormRequest $request){

        $data = $request->validated();

        $post = new Post;

        $post->name = $data['name'];
        $post->category_id = $data['category_id'];
        $post->subcategory_id = $data['subcategory_id'];
        $post->slug = $data['slug'];
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


}


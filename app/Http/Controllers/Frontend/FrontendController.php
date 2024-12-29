<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category; // Import Category model correctly
use App\Models\Post;     // Import Post model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function ViewCategoryPost($category_slug)
    {
        // Find category by slug and status
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();

        if ($category) {
            // Get posts related to the category
            $posts = Post::where('category_id', $category->id)->where('status', '0')->get();
            return view ('frontend.post.index');
        } else {
            // If no category found, redirect to homepage
            return redirect('/');
        }

        // Pass posts to the view
        return view('frontend.index', compact('posts'));
    }
}

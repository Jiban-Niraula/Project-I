<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Post;
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
        // Find category by slug, status, and is_deleted
        $category = Category::where('slug', $category_slug)
            ->where('status', '0')
            ->where('is_deleted', '0')
            ->first();

        if ($category) {
            // Get posts related to the category
            $posts = Post::where('category_id', $category->id)
                ->where('status', '0')
                ->paginate(5);

            // Pass category and posts to the view
            return view('frontend.post.index', compact('category', 'posts'));
        } else {
            // If no category found, redirect to the homepage with an optional message
            return redirect('/')->with('status', 'Category not found.');
        }
    }
}

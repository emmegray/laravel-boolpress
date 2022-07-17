<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category','tags')->paginate(10);
        $categories = Category::all();
        $tags = Tag::all();

        return response()->json(compact('posts', 'categories', 'tags'));
    }

    public function getPost($slug){
        $post = Post::where('slug', $slug)->with(['category', 'tag'])->first();

        return response()->json($post);
    }

    public function getPostByCategory($category_slug){
        $post_by_category = Category::where('slug', $category_slug)->with('posts')->first();

        return response()->json($post_by_category);
    }

    public function getPostByTag($tag_slug){
        $post_by_tag = Tag::where('slug', $tag_slug)->with('posts')->first();

        return response()->json($post_by_tag);
    }

    public function getPostByCatTag($category_slug, $tag_slug){
        $category = Category::where('slug', $category_slug)->first();

        $tag = Tag::where('slug', $tag_slug)->first();
        $tag_id = $tag->id;

        $posts = Post::where('category_id', $category->id)->whereHas('tags', function ($query) use ($tag_id) {
            $query->where('id', $tag_id);
        })->with(['category', 'tags'])->get();

        return response()->json($posts);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.index', compact('posts', 'categories', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $new_post = new Post();
        $data = $request->all();

        if(array_key_exists('image', $data)){
            $data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $date['image'] = Storage::put('uploads', $data['image']);
        }

        if (array_key_exists('tags', $data)) {
            $new_post->tags()->attach($data['tags']);
        }

        $new_post->fill($data);
        $new_post->slug = Post::generateSlug($request->title);

        $new_post->save();
        return redirect()->route('admin.posts.show', $new_post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where("slug", $slug)->first();
        if ($post) {
            $categories = Category::all();
            $tags = Tag::all();
            return view('admin.posts.show', compact('post', 'categories', 'tags'));
        }
        abort(404, 'Post not found');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if ($post) {
            $categories = Category::all();
            $tags = Tag::all();
            return view('admin.posts.edit', compact('post', 'categories', 'tags'));
        }
        abort(404, 'Post not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $data = $request->all();

        if (array_key_exists('image', $data)) {

            if ($post->image) {
                Storage::delete($post->image);
            }

            $data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $data['image'] = Storage::put('uploads', $data['image']);
        }

        if($data['title'] != $post->title){
            $data['slug'] = Post::generateSlug($data['title']);
        }

        $post->update($data);

        if(array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('admin.index')->with('message', "Post $post->name was deleted");
    }

    /* Return the posts as array */
    public function getPosts() {
        $posts = Post::all();
        return $posts;
    }
}

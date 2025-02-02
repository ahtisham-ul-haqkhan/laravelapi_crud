<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();
         return response()->json([
            'message' => 'List of Post',
            'posts' => $posts
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
        $post = Post::create($request->validated());
        return response()->json([
            'message' => 'New Post Created!',
            'post' => $post
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);
        return response()->json([
            'message' => 'View Post',
            'post' => $post
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // dd($post->toArray());
        // dd($request->all());
        // $post->title = $request->title;
        // $post->content = $request->content ?? $post->content;
        // $post->save();
        $post->update($request->validated());
        return response()->json([
            'message' => 'Update Post',
            'post' => $post
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return response()->json([
            'message' => 'Deleted Post',
            'post' => $post->delete()
        ]);
    }
}

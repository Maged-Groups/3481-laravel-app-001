<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // In one step
        // $posts = Post::withCount(['user', 'reactions'])->get();

        // In 2 steps
        $posts = Post::withCount(['user', 'reactions'])->get();
        // $posts->load(['user', 'postStatus']);

        // $postsCollection = PostResource::collection($posts);
        // $postsCollection = new PostCollection($posts);
        $postsCollection = PostCollection::make($posts);

        return $this->jsonResponse(200, count($posts).' posts found', $postsCollection);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // Gate::authorize('create');

        $post_data = $request->validated();

        $post_data['user_id'] = $request->user()->id;

        $new_post = Post::create($post_data);

        $data =  PostResource::make($new_post);

        return $this->jsonResponse(201, 'Post created successfully', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load(['user', 'postStatus', 'comments']);

        // $postResource = PostResource::make($post);
        // OR //
        $postResource = new PostResource($post);

        return $postResource;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        return $request->validated();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Call
    }
}

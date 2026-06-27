<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Cache the posts into cache store
     *
     * @return array|mixed
     */
    private function cachePosts()
    {
        return Cache::rememberForever(Post::POST_KEY, fn () =>   Post::with(['user', 'postStatus', 'comments'])->get()->toArray() );
    }

    /**
     * Hydrate the posts (Turn array to collection)
     *
     * @param  array  $posts
     * @return Collection
     */
    private function hydratePosts($posts)
    {
        return Post::hydrate($posts);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->cachePosts();

        $models = $this->hydratePosts($posts);

        $postsCollection = PostCollection::make($models);

        return $this->jsonResponse(200, $models->count().' posts found', $postsCollection);
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

        if ($new_post) {
            Cache::forget(Post::POST_KEY);

            $this->cachePosts();
        }

        $data = PostResource::make($new_post);

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
       $data = $request->validated();

       $updated_post = $post->update($data);

       if ($updated_post) {
        Cache::forget(Post::POST_KEY);

        $this->cachePosts();

        $data = PostResource::make($post);

        return $this->jsonResponse(200, 'Post updated successfully', $data);
       }

       return $this->jsonResponse(400, 'Post not updated', null);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $deleted_post = $post->delete();

        if ($deleted_post) {
            Cache::forget(Post::POST_KEY);

            $this->cachePosts();
        }

        return $this->jsonResponse(200, 'Post deleted successfully');
    }
}

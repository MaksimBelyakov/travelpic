<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostReSource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        $posts = PostReSource::collection(Post::all())->resolve();
        return inertia('Post/Index', compact('posts'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data['post']);

        foreach ($data['images'] as $image) {
          $path = Storage::disk('public')->put('/images',$image);
          $post->images()->create(['path' => $path]);

        }

        return PostReSource::make($post);
    }

    public function show(Post $post)
    {
        $post = PostReSource::make($post)->resolve();
        return inertia('Post/Show', compact('post'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        $post = $post->fresh();
        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return \response(Response::HTTP_NO_CONTENT);
    }

    public function create()
    {
        return inertia('Post/CreatePost');
    }
}

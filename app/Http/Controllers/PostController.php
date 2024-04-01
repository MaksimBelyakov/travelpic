<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostReSource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index(){
        return PostReSource::collection(Post::all())->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);
        return $post;
    }

    public function show(Post $post)
    {
        return $post;
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
}

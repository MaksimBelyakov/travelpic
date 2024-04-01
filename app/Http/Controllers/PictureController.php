<?php

namespace App\Http\Controllers;

use App\Http\Requests\Picture\StoreRequest;
use App\Http\Requests\Picture\UpdateRequest;
use App\Http\Resources\Picture\PictureReource;
use App\Http\Resources\Picture\PictureResource;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PictureController extends Controller
{
    public function index()
    {
        return PictureResource::collection(Picture::all())->resolve();
    }

    public function store(StoreRequest $request)
    {   
        $data = $request->validated();
        
        return Picture::create($data);
        
    }

    public function show(Picture $picture)
    {
        return PictureResource::make($picture)->resolve();
    }

    public function update(UpdateRequest $request, Picture $picture)
    {
        $data = $request->validated();
        $picture->update($data);
        return $picture->fresh();

    }

    public function destroy(Picture $picture)
    {
        $picture->delete();
        return response(Response::HTTP_OK);
    }
}

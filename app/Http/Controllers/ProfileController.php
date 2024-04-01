<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\StoreRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return ProfileResource::collection(Profile::all())->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        return Profile::create($data);
    }

    public function show(Profile $profile)
    {
        return ProfileResource::make($profile)->resolve();
    }
}

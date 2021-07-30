<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Services\UploadService;
use Illuminate\Support\Facades\Auth;

class HarvestService
{
    public function create(object $request)
    {
        $data               = $request->validated();
        $data['slug']       = Str::slug($request->title, '-');
        $data['user_id']    = Auth::id();

        if ($request->hasFile('image')) {
            $uploadService = new UploadService();
            $data['image'] = $uploadService->uploadToPublic($request, 'image', 'harvest_image');
        }

        return $data;
    }


    public function update(object $request)
    {
        $data               = $request->validated();
        $data['slug']       = Str::slug($request->name, '-');
        $data['user_id']    = Auth::id();
        return $data;
    }
}

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

        $uploadedImages = [];
        if ($request->has('images')) {
            foreach ($request->images as $index => $image) {
                $uploadService = new UploadService();
                $fileName = $uploadService->uploadToPublic($request, "images.$index", 'harvest_image');

                if ($fileName) {
                    $uploadedImages[] = $fileName;
                }
            }
        }

        $data['images'] = serialize($uploadedImages);

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

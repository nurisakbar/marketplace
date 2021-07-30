<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Services\UploadService;

class ForumService
{
    public function create(object $request)
    {
        $data           = $request->all();
        $data['slug']   = Str::slug($request->topic, '-');

        if ($request->hasFile('images')) {
            $uploadService = new UploadService();
            $data['images'] = $uploadService->uploadToPublic($request, 'images', 'category_image');
        }

        return $data;
    }


    public function update(object $request)
    {
        $data           = $request->all();
        $data['slug']   = Str::slug($request->topic, '-');
        return $data;
    }
}

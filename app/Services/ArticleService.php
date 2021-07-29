<?php

namespace App\Services;

use Illuminate\Support\Str;

class ArticleService
{

    public function create(object $request)
    {
        $data           = $request->all();
        $data['slug']   = Str::slug($request->title, '-');

        if ($request->hasFile('image')) {
            $uploadService = new UploadService();
            $data['image'] = $uploadService->uploadToPublic($request, 'image', 'article_image');
        }

        return $data;
    }

    public function update(object $request)
    {
        $data           = $request->all();
        $data['slug']   = Str::slug($request->title, '-');
        return $data;
    }
}

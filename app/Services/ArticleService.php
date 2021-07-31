<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleService
{

    public function create(object $request)
    {
        $data            = $request->all();
        $data['slug']    = Str::slug($request->title, '-');
        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('image')) {
            $uploadService = new UploadService();
            $data['image'] = $uploadService->uploadToPublic($request, 'image', 'article_image');
        }

        return $data;
    }

    public function update(object $request)
    {
        $data            = $request->all();
        $data['slug']    = Str::slug($request->title, '-');
        $data['user_id'] = Auth::user()->id;
        return $data;
    }
}

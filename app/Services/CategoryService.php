<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Services\UploadService;

class CategoryService
{
    public function create(object $request)
    {
        $data           = $request->all();
        $data['slug']   = Str::slug($request->name, '-');

        if ($request->hasFile('image')) {
            $file           = $request->file('image');
            $file_name      = str_replace(' ', '', $file->getClientOriginalName());
            $file->move('category_image', $file_name);
            $data['image'] = $file_name;
            // $uploadService = new UploadService();
            // $data['image'] = $uploadService->uploadToPublic($request, 'image', 'category_image');
        }

        return $data;
    }


    public function update(object $request)
    {
        $data           = $request->all();
        $data['slug']   = Str::slug($request->name, '-');
        return $data;
    }
}

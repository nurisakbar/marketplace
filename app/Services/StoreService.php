<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Services\UploadService;

class StoreService
{
    public function create(object $request)
    {
        $data           = $request->all();

        if ($request->hasFile('logo')) {
            $uploadService = new UploadService();
            $data['logo'] = $uploadService->uploadToPublic($request, 'logo', 'store_logo');
        }

        return $data;
    }


    public function update(object $request)
    {
        $data           = $request->all();
        return $data;
    }
}

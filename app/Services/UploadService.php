<?php

namespace App\Services;

use Illuminate\Support\Str;

class UploadService
{
    public function uploadToPublic($request, $inputName, $folderName)
    {
        if ($request->hasFile($inputName)) {
            $file           = $request->file($inputName);
            $file_name      = str_replace(' ', '', date('YmdHis') . '_' . $file->getClientOriginalName());
            $file->move($folderName, $file_name);
            return $file_name;
        }
        return null;
    }
}

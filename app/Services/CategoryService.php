<?php
namespace App\Services;

use Illuminate\Support\Str;

class CategoryService
{
    public function store(object $request)
    {
        $data           = $request->all();
        $data['slug']   = Str::slug($request->name, '-');

        if ($request->hasFile('image')) {
            $file           = $request->file('image');
            $file_name      = str_replace(' ', '', $file->getClientOriginalName());
            $file->move('category_image', $file_name);
            $data['image'] = $file_name;
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

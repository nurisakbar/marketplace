<?php

namespace App\Services;

class UserAddressService
{
    public function create(object $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        return $data;
    }
}

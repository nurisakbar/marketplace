<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $fillable = ['user_id', 'lebel', 'address', 'phone', 'name', 'village_id', 'default'];
}

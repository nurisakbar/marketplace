<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Traits\TransformableTrait;

class Village extends Model
{
    use TransformableTrait;
    use HasFactory;
    protected $fillable = ['id', 'district_id', 'name'];
}

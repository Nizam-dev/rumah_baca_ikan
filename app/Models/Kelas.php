<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'kelas','deleted_at','jenjang_id'
    ];
    protected $dates = ['deleted_at'];

    
}

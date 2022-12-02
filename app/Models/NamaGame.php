<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NamaGame extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'nama_game',
    ];

    protected $dates = ['deleted_at'];


}

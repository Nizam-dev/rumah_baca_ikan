<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mapel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'mapel','kelas_id'
    ];
    protected $dates = ['deleted_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'bab','judul','link_youtube','mapel_id'
    ];
    protected $dates = ['deleted_at'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jenjang',
        'kelas',
    ];

    public function kelas_() { 
        return $this->belongsTo(Kelas::class,'kelas');
    }

    public function jenjang_() { 
        return $this->belongsTo(Jenjang::class,'jenjang');
    }
}

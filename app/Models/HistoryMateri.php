<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryMateri extends Model
{
    use HasFactory;
    protected $fillable = [
        'mapel_id',
        'materi_id',
        'user_id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihanGandaQuiz extends Model
{
    use HasFactory;
    protected  $fillable= [
        'quiz_game_id','jawaban'
    ];
}

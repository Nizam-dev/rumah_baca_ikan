<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizGame extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'nama_game_id','soal','jawaban','gambar'
    ];

    protected $dates = ['deleted_at'];

    public function gandaquiz()
    {
        return $this->hasMany(PilihanGandaQuiz::class);
    }

}

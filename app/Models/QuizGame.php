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

    public static function cek_history($nama_game_id){
        return  QuizGame::join('skors','skors.quiz_game_id','quiz_games.id')
        ->where('quiz_games.nama_game_id',$nama_game_id)
        ->where('skors.user_id',auth()->user()->id)
        ->select('skors.*','quiz_games.id as sid');
    }



}

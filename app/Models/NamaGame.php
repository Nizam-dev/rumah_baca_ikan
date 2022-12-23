<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class NamaGame extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'nama_game',
    ];

    protected $dates = ['deleted_at'];

    public function quiz_game()
    {
        return $this->hasMany(QuizGame::class);
    }

    public static function cek_skor()
    {
        return NamaGame::leftjoin('quiz_games','quiz_games.nama_game_id','nama_games.id')
        // ->leftjoin('skors','skors.quiz_game_id','quiz_games.id')
        ->leftjoin('skors', function($join){
            $join->on('skors.quiz_game_id','quiz_games.id');
            $join->where('skors.user_id',auth()->user()->id);
        })
        ->select('nama_games.id as id','nama_games.nama_game as nama_game',DB::raw('SUM(skors.skor) as skor'))
        ->groupBy('id','nama_game')
        ->get();
    }


}

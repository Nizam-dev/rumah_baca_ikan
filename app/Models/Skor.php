<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skor extends Model
{
    use HasFactory;
    protected $fillable=[
        'skor',
        'quiz_game_id',
        'user_id',
    ];

    public static function cek_poin($nama_game_id){
        $poin = Skor::join('quiz_games','quiz_games.id','skors.quiz_game_id')
        ->where('quiz_games.nama_game_id',$nama_game_id)
        ->where('skors.user_id',auth()->user()->id)
        ->select('skors.*')->get();
        $point_saya = [
            "banyak_quiz"=>$poin->count(),
            "benar"=>$poin->where('skor','!=',0)->count(),
            "salah"=>$poin->where('skor','==',0)->count(),
            "skor"=>$poin->sum('skor')
        ];
        return $point_saya;
    }
}

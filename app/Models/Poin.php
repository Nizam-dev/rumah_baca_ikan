<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    use HasFactory;
    protected $fillable=[
        'pertanyaan_id','user_id','poin'
    ];

    public static function cek_poin($mapel_id){
        $poin = Poin::join('pertanyaans','pertanyaans.id','poins.pertanyaan_id')
        ->where('pertanyaans.mapel_id',$mapel_id)
        ->where('poins.user_id',auth()->user()->id)
        ->select('poins.*')->get();
        $point_saya = [
            "banyak_quiz"=>$poin->count(),
            "benar"=>$poin->where('poin','!=',0)->count(),
            "salah"=>$poin->where('poin','==',0)->count(),
            "poin"=>$poin->sum('poin')
        ];
        return $point_saya;
    }
}

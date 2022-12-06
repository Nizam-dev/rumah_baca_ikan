<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pertanyaan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'mapel_id','soal','jawaban',
    ];

    protected $dates = ['deleted_at'];

    public function ganda()
    {
        return $this->hasMany(PilihanGanda::class);
    }

    public static function cek_history($mapel_id){
        return  Pertanyaan::join('poins','poins.pertanyaan_id','pertanyaans.id')
        ->where('pertanyaans.mapel_id',$mapel_id)
        ->where('poins.user_id',auth()->user()->id)
        ->select('poins.*','pertanyaans.id as pid');
    }
    
}

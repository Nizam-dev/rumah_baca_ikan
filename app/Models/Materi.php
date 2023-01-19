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
        'bab','judul','link_youtube','mapel_id','pdf'
    ];
    protected $dates = ['deleted_at'];

    public static function history_materi($mapel_id,$user_id)
    {
        return Materi::where('mapel_id',$mapel_id)
        ->with(['history'=> function($q) use($user_id){
            $q->where('user_id',$user_id);
            // $q->first();
        }])->get();
    }

    public static function next_history_materi($materi_id,$mapel_id,$user_id)
    {
        return Materi::where('mapel_id',$mapel_id)
        ->where('materis.id', '>', $materi_id)->orderBy('materis.id')
        ->with(['history'=> function($q) use($user_id){
            $q->where('user_id',$user_id);
            // $q->first();
        }])->first();

    }

    public function history()
    {
        return $this->hasMany(HistoryMateri::class);
    }

}

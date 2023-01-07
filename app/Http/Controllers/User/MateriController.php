<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\HistoryMateri;

class MateriController extends Controller
{
    public function materi($id)
    {
        $materi = Materi::find($id);
        $next_materi = Materi::next_history_materi($id,$materi->mapel_id,auth()->user()->id);
        return view('user.materi.materi',compact('materi','next_materi'));
    }

    public function history_update($id)
    {
        $m = Materi::find($id);
        $materi = Materi::where('mapel_id',$m->mapel_id)->where('materis.id', '>', $id)->orderBy('materis.id')->first();
        if($materi){
            HistoryMateri::firstOrCreate([
                'mapel_id'=> $materi->mapel_id,
                'materi_id'=>$materi->id,
                'user_id'=>auth()->user()->id,
            ]);
        }
        return response()->json(['status'=>'sukses']);
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\HistoryMateri;
use App\Models\Pertanyaan;
use App\Models\Poin;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::where('kelas_id',auth()->user()->profile->kelas)->get();
        return view('user.mapel.mapel',compact('mapels'));
    }

    public function mapel_view($id)
    {
        $first_materi = Materi::where('mapel_id',$id)->first();
        if($first_materi){
            HistoryMateri::firstOrCreate([
                'mapel_id'=> $id,
                'materi_id'=> $first_materi->id,
                'user_id'=>auth()->user()->id,
            ]);
        }
        $mapel = Mapel::find($id);
        $materis = Materi::history_materi($id,auth()->user()->id);

        $pertanyaans = Pertanyaan::where('mapel_id',$id)->get();

        $p = Poin::join('pertanyaans','pertanyaans.id','poins.pertanyaan_id')
        ->where('pertanyaans.mapel_id',$id)
        ->where('poins.user_id',auth()->user()->id)->get();
        if($p->isEmpty()){
            $poin = 'belum';
        }else{
            $poin = Poin::cek_poin($id);
        }

        return view('user.mapel.mapel_view',compact('materis','mapel','pertanyaans','poin'));
    }
}

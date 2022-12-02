<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Materi;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::where('kelas_id',auth()->user()->profile->kelas)->get();
        return view('user.mapel.mapel',compact('mapels'));
    }

    public function mapel_view($id)
    {
        $mapel = Mapel::find($id);
        $materis = Materi::where('mapel_id',$id)->get();
        return view('user.mapel.mapel_view',compact('materis','mapel'));
    }
}

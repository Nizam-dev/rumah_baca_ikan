<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Slider;

class BerandaController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->profile);
        if(!auth()->user()->profile){
            return redirect('kelas');
        }

        $last_materi = Materi::join('mapels','mapels.id','materis.mapel_id')
        ->where('mapels.kelas_id',auth()->user()->profile->kelas)
        ->select('materis.*','mapels.mapel','mapels.kelas_id')
        ->latest()->take(5)->get();
        $sliders = Slider::all();
        return view('user.beranda.beranda',compact('last_materi','sliders'));
    }
}

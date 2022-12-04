<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;

class MateriController extends Controller
{
    public function materi($id)
    {
        $materi = Materi::find($id);
        $next_materi = Materi::where('id', '>', $id)->orderBy('id')->first();
        return view('user.materi.materi',compact('materi'));
    }
}

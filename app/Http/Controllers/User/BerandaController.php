<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->profile);
        if(!auth()->user()->profile){
            return redirect('profile');
        }
        return view('user.beranda.beranda');
    }
}

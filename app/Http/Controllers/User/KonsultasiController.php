<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Routing\Controller as RoutingController;

class KonsultasiController extends RoutingController
{
    public function index()
    {
        $chats = Chat::whereIn('from',[auth()->user()->id,1])
        ->whereIn('to',[1,auth()->user()->id])
        ->get();
        return view('user.konsultasi.konsultasi',compact('chats'));
    }
}

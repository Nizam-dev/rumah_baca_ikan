<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;
use Illuminate\Routing\Controller as RoutingController;

class InformasiController extends RoutingController
{
    public function index()
    {
        $informasi = Informasi::orderBy('id','DESC')->get();
        return view('user.informasi.informasi',compact('informasi'));
    }

    public function detail($id)
    {
        $info = Informasi::findOrFail($id);
        return view('user.informasi.detail',compact('info'));
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;

class AkunController extends RoutingController
{
    public function index()
    {
        return view('user.akun.akun');
    }
}

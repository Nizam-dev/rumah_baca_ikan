<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jenjang;
use App\Models\Kelas;
use App\Models\profile;
use Illuminate\Routing\Controller as RoutingController;

class ProfileController extends RoutingController
{
    public function kelas()
    {
        $jenjang = Jenjang::all();
        return view('user.profile.profile',compact('jenjang'));
    }

    public function store(Request $request)
    {

        profile::updateOrCreate(['user_id'=>auth()->user()->id],$request->all());
        return redirect('akun')->with('success','Kelas Berhasil diupdate');
    }

    public function profile_update(Request $request)
    {

        auth()->user()->update($request->all());
        return redirect('akun')->with('success','Profile Berhasil diupdate');
    }

    public function profile()
    {
        return view('user.profile.profile_user');
    }

    public function get_kelas($id)
    {
        return Kelas::where('jenjang_id',$id)->get();
    }
}

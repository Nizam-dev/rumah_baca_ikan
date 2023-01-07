<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jenjang;
use App\Models\Kelas;
use App\Models\profile;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
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

    public function ganti_password()
    {
        return view('user.profile.profile_password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password'=>'required'
        ]);

        auth()->user()->update([
            'password'=>bcrypt($request->password)
        ]);

        return redirect('akun')->with('success','Password Berhasil diupdate');
    }

    public function update_foto(Request $request)
    {
        $request->validate([
            'foto'=>'required'
        ]);

        $foto_sebelumnya = auth()->user()->foto;

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $tujuan_upload = public_path('/images/profil/');
            $nama_file = date('d-m-Y-H-i-').auth()->user()->name.'.'.$file->getClientOriginalExtension();
            $file->move($tujuan_upload,$nama_file);

            $foto_lama = public_path('/images/profil/'.$foto_sebelumnya);
            if($foto_sebelumnya != 'defaultfoto.png' && file_exists($foto_lama)){
                File::delete($foto_lama);
            }
            auth()->user()->update([
                'foto'=>$nama_file
            ]);
        }


        return redirect('akun')->with('success','Foto Profil Berhasil diupdate');
    }

}

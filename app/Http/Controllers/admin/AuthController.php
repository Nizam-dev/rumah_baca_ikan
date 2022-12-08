<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\NamaGame;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function postlogin(Request $request)
    {

        $input = $request->all();

        $rules = [

            'username'     => 'required',
            'password'  => 'required',

        ];
        // error message untuk validasi
        $message = [
            'required' => ':attribute tidak boleh kosong!'
        ];
        // instansiasi validator
        $validator = Validator::make($request->all(), $rules, $message);

        // proses validasi
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

       

        // if(User::where('username',$request->username)->whereIn('status_akun',[1,2])->first()){
        if (User::where('username', '=', $input['username'])->first() == true) {
            if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            
                   
                switch (Auth::user()->role) {
                    case 'admin':
                        return redirect('/admin-beranda');
                        break;
                    case 'user':
                        return redirect('/beranda');
                        break;
                    default:
                        return redirect('/login');
                        break;
                }
            } else {
                return redirect()->back()
                    ->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()
                ->with('error', 'Email tidak ada atau belum terdaftar');
        // }}else{
        //     return redirect()->back()
        //     ->with('error', 'Akun Belum terverifikasi. Silahkan hubungi admin atau cek email anda untuk verifikasi akun');
        // }
        }
    }

    public function login()
    {
        if(auth()->check()){
            switch (Auth::user()->role) {
                case 'admin':
                    return redirect('/admin-beranda');
                    break;
                case 'user':
                    return redirect('/beranda');
                    break;
                default:
                    return redirect('/login');
                    break;
            }
        }
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function beranda(){

        $siswa = User::where('role','user')->count();
        $mapel = Mapel::count();
        $game= NamaGame::count();
     

        return view('admin.beranda',compact('mapel','siswa','game'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getprofil(){
        $users =User::where('id',auth()->user()->id)->first();
        // return $users;

        return view('admin.profil',compact('users'));
    }

    public function profile_update(Request $request)
    {
        if($request->password){
            auth()->user()->update([
                'password'=> bcrypt($request->password)
            ]);


        }else{
            auth()->user()->update($request->all());
        }

       
        return redirect('admin-profil')->with('success','Profile Admin Berhasil diupdate');
    }

    

}
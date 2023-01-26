<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\NamaGame;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function postregister(Request $request)
    {
        $token =$this->getRandomString();
        $input = $request->all();

        $rules = [

            'username'     => 'required',
            'password'  => 'required',
            'no_hp'  => 'required',
            'name'  => 'required',
            'email'  => 'required',
        

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


        if($request->password!=$request->kpassword){
            return redirect()->back()->with('error','Password tidak sama');
        }

        if (User::where('username', '=', $input['username'])->first() == false) {
            $request->merge([
                'role' => 'user',
                'password' => bcrypt($request->password),            
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'username' => $request->username,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'status_akun' =>0,
                'token'=>$token
                
            ]);
            User::create($request->except(['_token']));

     
            $email =$request->email;
       
			$link = getenv('APP_URL') . "api/aktivasi/$token";
			$name = $request->name;

			$data = [
				'name' => $request->name,
				'body' => "Selamat akun anda sudah terdaftar .silahkan klik link di bawah untuk verifikasi.$link"
			];

			Mail::send('email.mail', $data, function ($message) use ($name, $email) {

			
				$message->to($email, $name)->subject('Pemberitahuan Rumah Kreatif Nelayan');
			});
          

            return redirect('login')->with('message', 'Berhasil Mendaftar Silahkan Cek email');
            // return $i;
        } else {
            // return "eror";
            return redirect()->back()->with('error', 'username sudah terdaftar');
        }
    }
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

       

        
        if (User::where('username', '=', $input['username'])->first() == true) {
            if(User::where('username',$request->username)->where('status_akun',1)->first()){
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
                
                ->with('error', 'Akun Belum terverifikasi. Silahkan hubungi admin atau cek email anda untuk verifikasi akun');
        }
    }else{
            return redirect()->back()
            ->with('error', 'Email tidak ada atau belum terdaftar');
        }
        // }
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

    public function lupa_password_post(Request $request){
        $cekemail= User::where('email',$request->email)->first();
        $token = $this->getRandomString();
     
        // return $cekemail;

        if($cekemail){
            $email= $cekemail->email;

            // if($cekemail->token_lupapassword){
               

            $req=[
                'token_lupapassword' =>$token,
            ];

            // return $req;

            $cekemail->update($req);
        // }

          

            $link = getenv('APP_URL') . "password_baru/".$cekemail->token_lupapassword;
            $name = $cekemail->name;
            $data = [
                'name' => $name,
                'body' => "Kepada Pengguna : $name. ",
              
                'link' => "$link"
            ];
     
            Mail::send('email.lupapassword', $data, function ($message) use ($name, $email) {
     
       
                $message->to($email, $name)->subject('Pemberitahuan Rumah Kreatif Nelayan');
            });
            return redirect()->back()
            ->with('message', 'Silahkan cek email anda untuk melakukan perubahan paswword anda');
            // return redirect('lupa_password')->with('message', 'Berhasil Mendaftar');

        }else{

            return redirect()->back()
            ->with('error', 'email tidak terdaftar. silahkan masukkan email terdaftar');

        }
        
    }

    public function password_baru($id)
    {
        $token_lp = User::where('token_lupapassword',$id)->first();
        if($token_lp){
        return view('auth.password_baru',compact('id'));

        }else{

            return "Kode token salah. silahkan langi lupa password";

        }
      
    }
    public function password_baru_post($id,Request $request)
    {
        $rules = [

 
            'password'  => 'required',
            // 'ulangi_password'=>'same:password'
             
        ];
          // error message untuk validasi
          $message = [
            'required' => ':attribute tidak boleh kosong!'
        ];
        // instansiasi validator
        $validator = ValidatoR::make($request->all(), $rules, $message);
        
        // proses validasi
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if($request->password!=$request->ulang_password){
            return redirect()->back()->with('error', 'Pastikan Password dan Konfirmasi Password Sama');
    
        }
        $token_lp = User::where('token_lupapassword',$id)->update([
            'password'=>bcrypt($request->password),
        ]);

        if($token_lp){
         return redirect('login')
            ->with('message_lupapassword', '');

        }else{

            return redirect()->back()->with('error', 'Gagal ubah password');

        }
      
    }

    public function getRandomString($panjang = 50)
	{
		$karakter = '012345678dssd9abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$panjang_karakter = strlen($karakter);
		$randomString = '';
		for ($i = 0; $i < $panjang; $i++) {
			$randomString .= $karakter[rand(0, $panjang_karakter - 1)];
		}
		return $randomString;
	}


    public function aktivasi($id){
        $link = getenv('APP_URL');
        $user = User::where('token', $id)->where('status_akun', '0')->first();

		if ($user) {

			$user->update(['status_akun' => "1"]);

			$name = $user->nama;
			$email = $user->email;
			$body = "Selamat Akun Anda Sudah Aktif. Silahkan cek email anda dan akses link ke $link";
			$data = [
				'name' => $name,
				'body' => $body,
			];

			Mail::send('email.sukses', $data, function ($message) use ($name, $email) {

				$message->to($email, $name)->subject('Pemberitahuan Akun');
				$message->from('rumahkreatifkedungringin@gmail.com', 'Rumah Kreatif Nelayan App');
			});

			return view('email.validasi', compact('body'));
		} else {

			$body = "Maaf halaman ini sudah kadaluarsa !!";

			return view('email.validasi', compact('body'));
		}
    }
    

}
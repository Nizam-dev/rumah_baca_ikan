<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $informasi = Informasi::orderBy('id','desc')->get();
        return view('admin.informasi.kelolainformasi',compact('informasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $namaFiles = '';
        //
        $this->validate($request, [
            // check validtion for image or file
                  'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
              ]);


            $tujuan_upload = public_path('gambar-informasi');
            $file = $request->file('gambar');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            // $req['gambar_layanan']=$namaFile;
            $namaFiles = $namaFile;
      

         Informasi::create([
            "judul"=>$request->judul,
            "deskripsi"=>$request->deskripsi, 
            'gambar' => $namaFiles

        ]);
        return redirect()->back()->with('message', 'Berita Informasi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $informasi = Informasi::find($id);
        $informasi->gambar =url('public/gambar-informasi/'.$informasi->gambar);
        return view('admin.informasi.editinformasi',compact('informasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $namaFiles = '';
        //
        if($request->hasFile('gambar')){


            $tujuan_upload = public_path('gambar-informasi');
            $file = $request->file('gambar');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            // $req['gambar_layanan']=$namaFile;
            $namaFiles = $namaFile;
        }
      

         Informasi::create([
            "judul"=>$request->judul,
            "deskripsi"=>$request->deskripsi, 
            'gambar' => $namaFiles

        ]);
        return redirect()->back()->with('message', 'Berita Informasi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Informasi::destroy($id);
        return redirect()->back()->with('message', 'Berita Informasi Berhasil Dihapus');
    }
}

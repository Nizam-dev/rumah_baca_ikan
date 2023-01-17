<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;
use App\Models\Mapel;
use App\Models\Materi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function materi($mapel){

        $materi = Materi::where('mapel_id',$mapel)->get();
        
        $mapel = Mapel::where('id',$mapel)->first();

       
        
      

        return view('admin.materi',compact('materi','mapel'));

    }
    public function index()
    {
        //
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

        if($request->hasFile('pdf')){

            $tujuan_upload = public_path('pdf');
            $file = $request->file('pdf');
     
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            // $req['gambar_layanan']=$namaFile;
            $namaFiles = $namaFile;
        }
        

        Materi::create(["mapel_id" => $request->mapel_id,"bab" => $request->bab,"judul" => $request->judul,
        "link_youtube" => $request->link_youtube,"pdf"=>$namaFiles]);
        return redirect()->back()->with('message', 'Materi Berhasil Ditambahkan');
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
        $materi = Materi::find($id);
        $mapel = Mapel::where('id',$materi->mapel_id)->first();
        $materi->pdf =url('public/pdf/'.$materi->pdf);

        return view('admin.viewmateri',compact('materi','mapel'));
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
   
        if($request->hasFile('pdf')){

            $tujuan_upload = public_path('pdf');
            $file = $request->file('pdf');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            File::delete($tujuan_upload . '/' . Materi::find($id)->pdf);
            $file->move($tujuan_upload, $namaFile);
            // $req['gambar_layanan']=$namaFile;
            $namaFiles = $namaFile;
        }
        Materi::where('id',$id)->update(["bab" => $request->bab,"judul" => $request->judul,"link_youtube" => $request->link_youtube,"pdf"=>$namaFiles]);
        return redirect()->back()->with('message', 'Materi Berhasil Diupdate');
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
        Materi::where('id',$id)->delete();
        return redirect()->back()->with('message', 'Materi Berhasil Dihapus');
    }
}

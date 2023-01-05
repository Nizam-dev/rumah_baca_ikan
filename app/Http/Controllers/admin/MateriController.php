<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;
use App\Models\Mapel;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;

class MateriController extends RoutingController
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
        Materi::create(["mapel_id" => $request->mapel_id,"bab" => $request->bab,"judul" => $request->judul,"link_youtube" => $request->link_youtube,]);
        return redirect()->back()->with('message', 'Kelas Berhasil Ditambahkan');
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
        return view('admin.viewmateri',compact('materi'));
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
        Materi::where('id',$id)->update(["bab" => $request->bab,"judul" => $request->judul,"link_youtube" => $request->link_youtube,]);
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

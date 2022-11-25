<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function mapel($kelas){

        $mapel = Mapel::where('kelas_id',$kelas)->get();
        
        $kelas = Kelas::where('id',$kelas)->first();
      

        return view('admin.mapel',compact('kelas','mapel'));

    }
    public function index()
    {
        //
        $mapel = Mapel::orderBy('mapel','asc')->get();

        return view('admin.mapel',compact('mapel'));
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
        Mapel::create(["mapel" => $request->mapel,"kelas_id"=>$request->kelas_id]);
        return redirect()->back()->with('message', 'Mapel Berhasil Ditambahkan');
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
        Mapel::where('id', '=', $id)->update(["mapel" => $request->mapel]);
        return redirect()->back()->with('message', 'Mapel Berhasil Diubah');
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
        Mapel::where('id',$id)->delete();
        return redirect()->back()->with('message', 'Mapel Berhasil Dihapus');
    }
}

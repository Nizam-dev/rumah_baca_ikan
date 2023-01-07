<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kelas($jenjang){

        $kelas = Kelas::where('jenjang_id',$jenjang)->get();
        
        $jenjang = Jenjang::where('id',$jenjang)->first();
      

        return view('admin.kelas',compact('kelas','jenjang'));

    }
    public function index()
    {
        //
        $kelas = Kelas::orderBy('kelas','asc')->get();

        return view('admin.kelas',compact('kelas'));
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
        Kelas::create(["kelas" => $request->kelas,"jenjang_id" => $request->jenjang_id,]);
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
        Kelas::where('id', '=', $id)->update(["kelas" => $request->kelas]);
        return redirect()->back()->with('message', 'Kelas Berhasil Diubah');
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
        Kelas::where('id',$id)->delete();
        return redirect()->back()->with('message', 'Kelas Berhasil Dihapus');
    }
}

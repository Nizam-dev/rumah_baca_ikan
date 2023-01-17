<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PeminjamanBuku;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamanBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $peminjaman = PeminjamanBuku::orderBy('id','desc')->get();

        return view('admin.peminjamanbuku.index',compact('peminjaman'));
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
        // return $request;
        $req = $request->all();
        $req['status_buku']= 'dipinjam';
        PeminjamanBuku::create($req);
        return redirect()->back()->with("message","Data Peminjam Berhasil DItambahkan");
        
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
        $data = PeminjamanBuku::find($id);

        return view('admin.peminjamanbuku.detail',compact('data'));
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
        $data = PeminjamanBuku::find($id);

        return view('admin.peminjamanbuku.edit',compact('data'));
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
        $req = $request->all();
        $req['status_buku']= $request->status_buku;
        $req['tanggal_pengembalian']= $request->tanggal_pengembalian;
        
        PeminjamanBuku::where('id',$id)->first()->update($req);
        return redirect('admin-peminjaman-buku')->with("message","Data Peminjam Berhasil Diupdate");
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
        
        PeminjamanBuku::destroy($id);
        return redirect()->back()->with("message","Data Peminjam Berhasil Dihapus");
        
    }
}

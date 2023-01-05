<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NamaGame;
use App\Models\QuizGame;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;

class NamaGameController extends RoutingController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $namagame = NamaGame::orderBy('nama_game','asc')->get();

        return view('admin.quizgame.namagame',compact('namagame'));
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
        NamaGame::create(["nama_game" => $request->nama_game]);
        return redirect()->back()->with('message', 'Nama Game Berhasil Ditambahkan');
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
        NamaGame::where('id', '=', $id)->update(["nama_game" => $request->nama_game]);
        return redirect()->back()->with('message', 'Nama Game Berhasil Diubah');
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
        QuizGame::where('nama_game_id',$id)->delete();
        NamaGame::where('id',$id)->delete();

        return redirect()->back()->with("message","Nama Game berhasil dihapus");
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\Pertanyaan;
use App\Models\PilihanGanda;
use Illuminate\Http\Request;

class SoalController extends Controller
{

    public function tambahsoal(){
        return view('admin.soal.tambahsoal');
    }

    public function soal($materi){
        $soal = Pertanyaan::where('materi_id',$materi)->get();
        $materi = Materi::where('id',$materi)->first();

        return view('admin.soal.kelolasoal',compact('soal','materi'));
    }

    public function viewsoal($id){
        // $materi = Materi::where('id',$id)->first();
        
        // return 's';
        $s = Pertanyaan::where('id', '=', $id)->with(['ganda' => function($q){
            $q->inRandomOrder();
        }])->first();
       
    
    //    return $s;
        return view('admin.soal.viewsoal',compact('s'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('admin.soal.kelolasoal');
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
       
        
        


        $kunci_jawaban = PilihanGanda::create([
            "jawaban"=>$request->jawbenar,
            "pertanyaan_id"=>$soal_id
        ])->id;

        $soal_id = Pertanyaan::create([
            "soal"=>$request->soal,
            // "label"=>$request->label,
            "jawaban"=>$kunci_jawaban, 
              // "skor"=>$request->skor,
            "materi_id"=>$request->materi_id
        ])->id;

        foreach ($request->jaw as $key => $ganda) {
            PilihanGanda::create([
                "jawaban"=>$ganda,
                "pertanyaan_id"=>$soal_id
            ]);
        }

        Pertanyaan::where("id","=",$soal_id)->update([
            "jawaban"=>$kunci_jawaban
        ]);

        return redirect()->back()->with('message', 'Soal Berhasil Ditambahkan');
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
        $s = Pertanyaan::where('id', '=', $id)->with('ganda')->first();

        return view('admin.soal.editsoal',compact('s'));
       
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
    public function update(Request $req, $id)
    {
        //
        Pertanyaan::where('id', '=', $id)
        ->update([
            "soal"=>$req->soal,
        ]);
        $p=Pertanyaan::where('id', '=', $id)->first();
        // return $p;
        $benar = PilihanGanda::where("pertanyaan_id",$id)->first();
        $benar->update([
            "jawaban"=>$req->jawbenar
        ]);
        foreach ($req->jaw as $key => $value) {
            PilihanGanda::where("id",$key)->update([
                "jawaban"=> $value
            ]);  
        }

        return redirect("materi-soal/".$p->materi_id)->with("message","Soal berhasil diedit");
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
         PilihanGanda::where('pertanyaan_id',$id)->delete();
        Pertanyaan::where('id',$id)->delete();

        return redirect()->back()->with("message","Soal berhasil dihapus");

        
    }
}

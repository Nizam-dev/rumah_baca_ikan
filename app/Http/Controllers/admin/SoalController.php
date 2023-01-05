<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\Pertanyaan;
use App\Models\PilihanGanda;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;

class SoalController extends RoutingController
{

    public function tambahsoal(){
        return view('admin.soal.tambahsoal');
    }

    public function soal($mapel){
        $soal = Pertanyaan::where('mapel_id',$mapel)->get();
        $mapels = Mapel::where('id',$mapel)->first();
  

        // return $mapel;

        return view('admin.soal.kelolasoal',compact('soal','mapels'));
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
       
    

        $soal_id = Pertanyaan::create([
            "soal"=>$request->soal,
            // "label"=>$request->label,
            "jawaban"=>$request->jawbenar, 
              // "skor"=>$request->skor,
            "mapel_id"=>$request->mapel_id
        ])->id;

          
        $kunci_jawaban = PilihanGanda::create([
            "jawaban"=>$request->jawbenar,
            "pertanyaan_id"=>$soal_id
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

    public function hapus_select(Request $request){
        // return $request->ceklist;
        if($request->ceklist){
            //melakukan update ceklist yg dipilih/all
            
            PilihanGanda::whereIn('pertanyaan_id',$request->ceklist)->delete();
        Pertanyaan::whereIn('id',$request->ceklist)->delete();
            return redirect()->back()->with('message','Data Berhasil di Update');
        }else{
            //jika tidak ada hanya redirect kosongan
            return redirect()->back();
        }
    }
}

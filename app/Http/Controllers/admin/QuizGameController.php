<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NamaGame;
use App\Models\PilihanGandaQuiz;
use App\Models\QuizGame;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class QuizGameController extends Controller
{

    public function namagame($namagame){
        $quizgame = QuizGame::where('nama_game_id',$namagame)->get();
        $namagame = NamaGame::where('id',$namagame)->first();

        return view('admin.quizgame.quizgame',compact('quizgame','namagame'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quizgame = QuizGame::all();

        return view('admin.quizgame.quizgame',compact('quizgame'));
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
   


            $tujuan_upload = public_path('gambar-game');
            $file = $request->file('gambar');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            // $req['gambar_layanan']=$namaFile;
            $namaFiles = $namaFile;
      

        $soal_id = QuizGame::create([
            "soal"=>$request->soal,
            // "label"=>$request->label,
            "jawaban"=>$request->jawbenar, 
              "nama_game_id"=>$request->nama_game_id,
            'gambar' => $namaFiles

        ])->id;


        $kunci_jawaban = PilihanGandaQuiz::create([
            "jawaban"=>$request->jawbenar,
            "quiz_game_id"=>$soal_id
        ])->id;

        foreach ($request->jaw as $key => $ganda) {
            PilihanGandaQuiz::create([
                "jawaban"=>$ganda,
                "quiz_game_id"=>$soal_id
            ]);
        }

        QuizGame::where("id","=",$soal_id)->update([
            "jawaban"=>$kunci_jawaban
        ]);

        return redirect()->back()->with('message', 'Quiz Game Berhasil Ditambahkan');
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
        $s = QuizGame::where('id', '=', $id)->with('gandaquiz')->first();
        $s->gambar =url('public/gambar-game/'.$s->gambar);

        return view('admin.quizgame.editquizgame',compact('s'));
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

        $namaFiles = '';
        //
   
        if($req->hasFile('gambar')){

            $tujuan_upload = public_path('gambar-game');
            $file = $req->file('gambar');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            File::delete($tujuan_upload . '/' . QuizGame::find($id)->gambar);
            $file->move($tujuan_upload, $namaFile);
            // $req['gambar_layanan']=$namaFile;
            $namaFiles = $namaFile;

        }
        QuizGame::where('id', '=', $id)
        ->update([
            "soal"=>$req->soal,
            "gambar"=>$namaFiles,
        ]);
        $p=QuizGame::where('id', '=', $id)->first();
        // return $p;
        $benar = PilihanGandaQuiz::where("quiz_game_id",$id)->first();
        $benar->update([
            "jawaban"=>$req->jawbenar
        ]);
        foreach ($req->jaw as $key => $value) {
            PilihanGandaQuiz::where("id",$key)->update([
                "jawaban"=> $value
            ]);  
        }

        return redirect("namagame-quizgame/".$p->nama_game_id)->with("message","Pertanyaan Quiz berhasil diedit");
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

        $q =QuizGame::where('id',$id)->first();
        $tujuan_upload = public_path('gambar-game');

        if($q){
            File::delete($tujuan_upload . '/' . $q->gambar);

            QuizGame::where('id',$id)->delete();

        }
      

        return redirect()->back()->with("message","Pertanyaan Quiz berhasil dihapus");
    }


    public function viewsoal($id){
        // $materi = Materi::where('id',$id)->first();
        
        // return 's';
        $s = QuizGame::where('id', '=', $id)->with(['gandaquiz' => function($q){
            $q->inRandomOrder();
        }])->first();
        $s->gambar =url('public/gambar-game/'.$s->gambar);
    
    //    return $s;
        return view('admin.quizgame.viewquizgame',compact('s'));
    }


    public function hapus_select(Request $request){
        // return $request->ceklist;
      
      
        if($request->ceklist){
            //melakukan update ceklist yg dipilih/all
            $q =QuizGame::whereIn('id',$request->ceklist)->get();
            // return $q;
            $tujuan_upload = public_path('gambar-game');
    
            if($q){
                // $files = array($q->gambar);

                foreach($q as $V){
                    File::delete([$tujuan_upload . '/' . $V->gambar]);

                }

               
                QuizGame::whereIn('id',$request->ceklist)->delete();
            }
      
            return redirect()->back()->with('message','Quiz Game Berhasil di Hapus');
        }else{
            //jika tidak ada hanya redirect kosongan
            return redirect()->back();
        }
    }
}

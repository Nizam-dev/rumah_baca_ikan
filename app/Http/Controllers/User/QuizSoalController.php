<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use App\Models\Poin;

class QuizSoalController extends Controller
{
    public function quiz($id)
    {
        $quizes = Pertanyaan::where('mapel_id',$id);
        // dd($quiz);
        $banyak_quiz = $quizes->count();
        $history_pertanyaan = Pertanyaan::cek_history($id)->latest('poins.id')->first();
        if(!$history_pertanyaan){
            $quiz = $quizes->first();
        }else{
            $quiz = $quizes->where('id', '>', $history_pertanyaan->pid)->orderBy('id')->first();
            if(!$quiz){
                $poin = Poin::cek_poin($id);
                return view('user.quiz_soal.quiz_end',compact('id','poin'));
            }
        }
        $no_quiz;
        $all_quiz = Pertanyaan::where('mapel_id',$id)->get();
        foreach($all_quiz as $n=>$q){
            if($q->id == $quiz->id){
                $no_quiz = $n+1;
            }
        }
        return view('user.quiz_soal.quiz_soal',compact('id','quiz','banyak_quiz','no_quiz'));
    }

    public function cek_jawaban(Request $request)
    {
        $pertanyaan = Pertanyaan::find($request->id);
        $poin = $pertanyaan->jawaban == $request->jawaban ? 10 : 0;
        $history_poin = Poin::where('user_id',auth()->user()->id)->where('pertanyaan_id',$request->id)->first();
        $next_quiz = Pertanyaan::where('mapel_id',$pertanyaan->mapel_id)->where('id', '>', $request->id)->orderBy('id')->first();
        if(!$history_poin){
            Poin::create([
                'user_id'=>auth()->user()->id,
                'poin'=>$poin,
                'pertanyaan_id'=>$request->id
            ]);
        }

        return response()->json([
            'status'=> $pertanyaan->jawaban == $request->jawaban ? 'benar' : 'salah',
            'jawaban_benar'=> $pertanyaan->jawaban,
            'next_quiz'=> $next_quiz ? true : false
        ]);
    }
}

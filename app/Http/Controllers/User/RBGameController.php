<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NamaGame;
use App\Models\PilihanGandaQuiz;
use App\Models\QuizGame;
use App\Models\Skor;
use App\Models\User;
use DB;

class RBGameController extends Controller
{
    public function index()
    {
        $users = User::leftjoin('skors','skors.user_id','users.id')
        ->where('users.role','!=','admin')
        ->select('users.id','users.name as name','users.foto as foto',DB::raw('SUM(skors.skor) as skor'))
        ->groupBy('id','name','foto')
        ->orderBy('skor','DESC')
        ->get();
        $games = NamaGame::cek_skor();
        return view('user.rbgame.rbgame',compact('games','users'));
    }

    public function quiz_game($id){
        $quizes = QuizGame::where('nama_game_id',$id);
        // dd($quiz);
        $banyak_quiz = $quizes->count();
        $history_pertanyaan = QuizGame::cek_history($id)->latest('skors.id')->first();
        if(!$history_pertanyaan){
            $quiz = $quizes->first();
        }else{
            $quiz = $quizes->where('id', '>', $history_pertanyaan->sid)->orderBy('id')->first();
            if(!$quiz){
                $poin = Skor::cek_poin($id);
                return view('user.rbgame.quiz_end',compact('id','poin'));
            }
        }

        $no_quiz;
        $all_quiz = QuizGame::where('nama_game_id',$id)->get();
        foreach($all_quiz as $n=>$q){
            if($q->id == $quiz->id){
                $no_quiz = $n+1;
            }
        }
        return view('user.rbgame.quiz_game',compact('id','quiz','banyak_quiz','no_quiz'));
    }


    public function cek_jawaban(Request $request)
    {
        $pertanyaan = QuizGame::find($request->id);
        $poin = $pertanyaan->jawaban == $request->jawaban ? 20 : 0;
        $history_poin = Skor::where('user_id',auth()->user()->id)->where('quiz_game_id',$request->id)->first();
        $next_quiz = QuizGame::where('nama_game_id',$pertanyaan->nama_game_id)->where('id', '>', $request->id)->orderBy('id')->first();
        if(!$history_poin){
            Skor::create([
                'user_id'=>auth()->user()->id,
                'skor'=>$poin,
                'quiz_game_id'=>$request->id
            ]);
        }

        return response()->json([
            'status'=> $pertanyaan->jawaban == $request->jawaban ? 'benar' : 'salah',
            'jawaban_benar'=> $pertanyaan->jawaban,
            'next_quiz'=> $next_quiz ? true : false
        ]);
    }

}

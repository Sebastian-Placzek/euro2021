<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Bet;

class matchesController extends Controller
{
    public function showAvailableMatches(){
        $matches = DB::select("Select * from matches where match_time > NOW()
        and id not in ((select match_id from bets where user_id = ? ))",array(Auth::user()->id));
        $matches = json_decode(json_encode($matches), true);
       return view('matches')->with('matches',$matches);
    }
    public function bet(Request $req){
        $input = $req->input();
        $match = Match::where('id',$input['id'])->firstOrFail();
        return view('bet')->with('match',$match);
    }

    public function showClosedMatches(){
        $matches = Match::where('match_time','<',date("Y-m-d H:i:s"))->where('scored','=',0)->get();
        return view('closedmatches')->with('matches',$matches);
    }
    public function showScoredMatches(){
        $matches = Match::where('match_time','<',date("Y-m-d H:i:s"))->where('scored','=',1)->get();
        return view('scoredmatches')->with('matches',$matches);
    }


    public function setResult(Request $req){
        $input = $req->input();
        $match = Match::where('id',$input['id'])->firstOrFail();
        return view('setresult')->with('match',$match);
    }

    public function updateMatch(Request $req){

        $input = $req->input();
        $match = Match::where('id',$input['match_id'])->firstOrFail();
        $match->result1 = $input['result1'];
        $match->result2 = $input['result1'];
        $match->scored = 1;
        $match->save();

        $bets = Bet::where('match_id',$input['match_id'])->get();
        foreach ($bets as $bet){
            $points = 0;
            if ($bet['result1'] == $input['result1'] and $bet['result2'] == $input['result2'] ){
                $points = $points + 3;
            }
            else{
                $points = 0;
            }


            if($bet['result1'] > $bet['result2'] and $input['result1'] > $input['result2'] or
                    $bet['result1'] < $bet['result2'] and $input['result1'] < $input['result2']){
                $points = $points + 1;
            }
            elseif($bet['result1'] == $bet['result2'] and $input['result1'] == $input['result2'] ){
                $points = $points + 2;
            }
            else {
                $points = $points + 0;
            }
            $bet_model = Bet::where('id',$bet['id'])->firstOrFail();
            $bet_model->score = $points;
            $bet_model->save();


        }

        return redirect('closedmatches');
    }

    public function deleteScore(Request $req){
        $input = $req->input();
        $match = Match::where('id',$input['id'])->firstOrFail();
        $match->scored = 0;
        $match->result1 = NULL;
        $match->result2 = NULL;
        $match->save();

        $bets = Bet::where('match_id',$input['id'])->get();
        foreach($bets as $bet){
            $bet['score'] = NULL;
            $bet->save();
        }
        return redirect('scoredmatches');
    }
    public function showAddMatch(){
        return view('addmatch');
    }
    public function addMatch(Request $req){
        $input = $req->input();
        $match = new Match();
        $match->team1 = $input['team1'];
        $match->team2 = $input['team2'];
        $match->match_time = $input['match_time'];
        $match->save();
        return redirect('matches');
    }

}

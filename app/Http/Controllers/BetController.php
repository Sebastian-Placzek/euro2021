<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bet;
use App\Models\Match;
use Illuminate\Support\Facades\DB;


class BetController extends Controller
{

    public function addBet(Request $req){
       $input = $req->input();
       $bet = new Bet();
       $bet->user_id = Auth::user()->id;
       $bet->match_id = $input['match_id'];
       $bet->result1 = $input['result1'];
       $bet->result2 = $input['result2'];
       $bet->save();
       return redirect('home');
    }


    public function updateBet(Request $req){
        $update = $req->input();
        if ($update['match_time'] < date("Y-m-d H:i:s")) {
            $error = 'Its too late to change prediction of result';
            return redirect('mybets')->with('error',$error);
        }else{
            Bet::findOrFail($update['bet_id'])->update(['result1' => $update['result1'] , 'result2' => $update['result2']]);
            return redirect('mybets');
        }

    }


    public function showBets(){
        $myBets = DB::table('bets')
            ->join('matches', 'bets.match_id', '=', 'matches.id')
            ->select('bets.*', 'matches.team1','matches.team2','matches.match_time')
            ->where('bets.user_id', Auth::user()->id)
            ->get();
        $myBets = json_decode($myBets,true);
        return view('mybets')->with('myBets',$myBets);
    }
    public function editBet(Request $req){
        $input = $req->input();
        $bet = DB::select('SELECT b.id,b.result1,b.result2,m.team1,m.team2,m.match_time
        from bets as b
        join matches as m
        on b.match_id = m.id
        where b.id = ?',array($input['id']));
        $bet = json_decode(json_encode($bet), true);
        return view('editbetform')->with('bets',$bet);
        }
    public function scoreboard(){
        $scoreboard = DB::select('select b.user_id,u.name,sum(b.score) as score,count(*) as bet_count
        from bets as b
        join users as u
        on b.user_id = u.id
        group by b.user_id,u.name
        order by score desc
        ');
        $scoreboard = json_decode(json_encode($scoreboard), true);
        return view('scoreboard')->with('scores',$scoreboard);
    }



}

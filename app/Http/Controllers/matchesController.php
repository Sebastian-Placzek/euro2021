<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class matchesController extends Controller
{
    public function showAvailableMatches(){
        $matches = DB::select("Select * from matches where match_time > NOW()
        and id not in ((select match_id from bets where user_id = ? )) limit 1",array(Auth::user()->id));
        $matches = json_decode(json_encode($matches), true);
       return view('matches')->with('matches',$matches);
    }
    public function bet(Request $req){
        $input = $req->input();
        $match = Match::where('id',$input['id'])->firstOrFail();
        return view('bet')->with('match',$match);
    }

}

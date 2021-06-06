<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Match;

class Bet extends Model
{
    use HasFactory;
    protected $table = 'bets';
    public $timestamps = false;
    protected $fillable = ['result1','result2'];

    public function match(){
        return $this->belongsTo(Match::class,'match_id','id');
    }
}

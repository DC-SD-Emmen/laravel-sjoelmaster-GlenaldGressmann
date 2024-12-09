<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['player_id', 'score'];
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GamesController extends Controller
{
   
    public function games()
    {
        $users = User::all();
        return view('games', compact('users'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
{
    if ($user->role == 'admin') {
        return redirect('/admin');
    }
    return redirect('/home');
}
}

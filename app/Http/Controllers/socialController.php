<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class socialController extends Controller
{
    public function redirct($service){

        return Socialite::driver()->redirect();
    }
    public function callback($service){

        return $user = Socialite::with($service)->user();
    }
}

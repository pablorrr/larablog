<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function userlogin(Request $request){

        return $request->input();
    }
}

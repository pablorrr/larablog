<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function userLogin(Request $request){

     $data = $request->input();//wyciaganie danych z forlularza
     $request->session()->put('user',$data['user']);//utworzenie zmeinnej sesyjnenj o nazwie user
    // echo session('user');
        return redirect('profile');
    }
}

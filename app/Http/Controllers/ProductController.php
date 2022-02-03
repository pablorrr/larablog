<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $fruits = ['mamngo', 'orange'];
        return view('welcome',compact('fruits'));
    }
}

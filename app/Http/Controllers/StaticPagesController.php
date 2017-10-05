<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    //
    public function home(){
      return view('pages/home');
    }

    public function about()
    {
      return view('pages/about');
    }

    public function help()
    {
      return view('pages/help');
    }
    public function test()
    {
      return view('layouts.test');
    }
}

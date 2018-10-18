<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class GuestController extends Controller
{
    public function index(){
        if(!Auth::guest())
            return redirect()->route('home');
        return view('index');
    }
}

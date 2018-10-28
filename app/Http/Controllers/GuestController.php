<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Business;
use App\Boletin;
use Auth;
class GuestController extends Controller
{
    public function index(){
        if(!Auth::guest())
            return redirect()->route('home');
        $businesses = Business::all();
        $boletin = Boletin::inRandomOrder()->get()->first();

        return view('index',
        [
            'businesses' => $businesses,
            'boletin' => $boletin]);
    }
}

<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function __construct(){

    }
    public function inicio(){
        return view('empresa.index');
    }
    public function cuenta(){
        return view('vistas.cuenta');
    }
    public function notificaciones(){
        return view('vistas.notificaciones');
    }
    public function LanzarBoletin(){
        return view('empresa.LanzarBoletin');
    }
    public function boletines(){
        return view('empresa.boletines');
    }
    // Cierra el perfil y regresa a la selección de perfiles
    public function logout(){
        User::where('id', auth()->user()->id)->update(['loggedAs' => 'vacio']);
        User::where('id', auth()->user()->id)->update(['loggedAsBusiness' => 'vacio']);
        User::where('id', auth()->user()->id)->update(['loggedIn' => false]);
        return redirect()->route('home');
    }
}

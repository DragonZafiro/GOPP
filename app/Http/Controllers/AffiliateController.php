<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function __construct(){

    }
    public function inicio(){
        return view('afiliador.index');
    }
    public function cuenta(){
        return view('vistas.cuenta',['user' => auth()->user()]);
    }
    public function notificaciones(){
        return view('vistas.notificaciones');
    }
    public function saldo(){
        return view('afiliador.saldo');
    }
    // Cierra el perfil y regresa a la selección de perfiles
    public function logout(){
        if(User::where('id', auth()->user()->id)->update(['loggedIn' => false])){
            User::where('id', auth()->user()->id)->update(['loggedAs' => 'vacio']);
            User::where('id', auth()->user()->id)->update(['loggedAsBusiness' => 'vacio']);
            return redirect()->route('home');
        }
    }
}

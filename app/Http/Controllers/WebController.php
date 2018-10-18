<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class WebController extends Controller
{
    // Middleware - Obliga al usuario a elegir un perfil
    public function __construct(){
        return $this->middleware('auth');
    }
    public function about(){
        return view('vistas.acercade');
    }
    public function praemie(){
        return view('vistas.praemie');
    }
    // Selección de perfil
    public function seleccionarModo(){
        // Si ya ha ingresado con algún perfil, redirecciona a su inicio
        if(Auth::check() && Auth::user()->loggedIn == true && Auth::user()->loggedAs == 'usuario'){
            return redirect()->route('usuario.promos');
        }
        else if(Auth::check() && Auth::user()->loggedIn == true && Auth::user()->loggedAs == 'empresa'){
            return redirect()->route('empresa.inicio');
        }
        else if(Auth::check() && Auth::user()->loggedIn == true && Auth::user()->loggedAs == 'afiliador'){
            return redirect()->route('afiliador.inicio');
        }
        else if(Auth::check() && Auth::user()->loggedIn == true && Auth::user()->loggedAs == 'repartidor'){
            return redirect()->route('repartidor.inicio');
        }
        else
        {
            return view('mode');
        }// Regresa a selección de perfil
    }
    // Valida su sesión, verificando que tenga sus permisos.
    public function validar(){
        $data = request()->all();
        // Usuario
        if((auth()->user()->usuario || auth()->user()->admin) && $data['modo'] == 'usuario'){
            User::where('id', auth()->user()->id)->update(['loggedIn' => true]);
            User::where('id', auth()->user()->id)->update(['loggedAs' => $data['modo']]);
        }
        // Empresa
        else if((auth()->user()->empresa || auth()->user()->admin) && $data['modo'] == 'empresa'){
            User::where('id', auth()->user()->id)->update(['loggedAs' => $data['modo']]);
        }
        // Afiliador
        else if((auth()->user()->afiliador || auth()->user()->admin) && $data['modo'] == 'afiliador'){
            User::where('id', auth()->user()->id)->update(['loggedIn' => true]);
            User::where('id', auth()->user()->id)->update(['loggedAs' => $data['modo']]);
        }
        // Repartidor
        else if((auth()->user()->repartidor || auth()->user()->admin) && $data['modo'] == 'repartidor'){
            User::where('id', auth()->user()->id)->update(['loggedIn' => true]);
            User::where('id', auth()->user()->id)->update(['loggedAs' => $data['modo']]);
        }
        else if ((auth()->user()->empresa || auth()->user()->admin) && $data['modo'] == 'select_empresa'){
            User::where('id', auth()->user()->id)->update(['loggedIn' => true]);
            User::where('id', auth()->user()->id)->update(['loggedAsBusiness' => $data['business_id']]);
        }
        return redirect()->route('home');
    }
}

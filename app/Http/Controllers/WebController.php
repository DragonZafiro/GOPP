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
        $user = Auth::user();
        // Si ya ha ingresado con algún perfil, redirecciona a su inicio
        if(Auth::check() && $user->loggedIn == true && $user->loggedAs == 'usuario'){
            return redirect()->route('usuario.promos');
        }
        else if(Auth::check() && $user->loggedIn == true && $user->loggedAs == 'empresa'){
            return redirect()->route('empresa.inicio');
        }
        else if(Auth::check() && $user->loggedIn == true && $user->loggedAs == 'afiliador'){
            return redirect()->route('afiliador.inicio');
        }
        else if(Auth::check() && $user->loggedIn == true && $user->loggedAs == 'repartidor'){
            return redirect()->route('repartidor.inicio');
        }
        else
        {
            return view('mode',['user' => $user]);
        }// Regresa a selección de perfil
    }
    // Valida su sesión, verificando que tenga sus permisos.
    public function validar(){
        $data = request()->all();
        $user = Auth::user();
        // Usuario
        if(($user->usuario || $user->admin) && $data['modo'] == 'usuario'){
            User::where('id', $user->id)->update(['loggedIn' => true]);
            User::where('id', $user->id)->update(['loggedAs' => $data['modo']]);
        }
        // Empresa
        else if(($user->empresa || $user->admin) && $data['modo'] == 'empresa'){
            User::where('id', $user->id)->update(['loggedAs' => $data['modo']]);
        }
        // Afiliador
        else if(($user->afiliador || $user->admin) && $data['modo'] == 'afiliador'){
            User::where('id', $user->id)->update(['loggedIn' => true]);
            User::where('id', $user->id)->update(['loggedAs' => $data['modo']]);
        }
        // Repartidor
        else if(($user->repartidor || $user->admin) && $data['modo'] == 'repartidor'){
            User::where('id', $user->id)->update(['loggedIn' => true]);
            User::where('id', $user->id)->update(['loggedAs' => $data['modo']]);
        }
        else if (($user->empresa || $user->admin) && $data['modo'] == 'select_empresa'){
            User::where('id', $user->id)->update(['loggedIn' => true]);
            User::where('id', $user->id)->update(['loggedAsBusiness' => $data['business_id']]);
        }
        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Business;
use Auth;
class UserController extends Controller
{
    public function __construct(){
        //return $this->middleware('session');
    }
    public function promos(){
        return view('usuario.index');
    }
    public function categorias(){
        return view('usuario.categorias');
    }
    public function cuenta(){
        return view('vistas.cuenta');
    }
    public function puntos(){
        return view('usuario.puntos');
    }
    public function empresas(Request $request){
		$s = $request->query('s');
		// Query and paginate result
		$business = Business::where('nombre', 'like', "%$s%")
            ->orWhere('descripcion', 'like', "%$s%");
        $business = Business::where('nombre', 'like', "%$s%")
            ->orWhere('descripcion', 'like', "%$s%");
        return view('usuario.empresas', ['business' => $business, 's' => $s ]);
    }
    public function mapa(){
        return view('usuario.mapa');
    }
    public function notificaciones(){
        return view('vistas.notificaciones');
    }
    public function guardados(){
        return view('usuario.guardados');
    }
    public function loquequieras(){
        return view('usuario.loquequieras');
    }
    public function comparteyGana(){
        return view('usuario.comparteyGana');
    }
    public function MisPedidos(){
        return view('usuario.MisPedidos');
    }
    public function factura(){
        return view('vistas.factura');
    }
    public function favor(){
        return view('usuario.favor');
    }
    public function mostrarEmpresa($id)
    {
        return view('vistas.empresa')
            ->with('business', Business::find($id));
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

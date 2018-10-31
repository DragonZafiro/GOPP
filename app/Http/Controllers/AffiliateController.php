<?php
namespace App\Http\Controllers;
use App\User;
use App\Business;
use App\Afiliador;
use Auth;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function __construct(){

    }
    public function inicio(){
        $business =  auth()->user()->getAfiliadorBusiness();
        return view('afiliador.index',['business' => $business]);
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
    public function afiliar(Request $request){
        if($request['codigo'] != null){
            $business = Business::where('codigo_afiliador', $request['codigo'])->get();
            if($business->first() != null && $business->first()->getAfiliador()->first() == null){
                Afiliador::create([
                    'user_id' => auth()->user()->id,
                    'business_id' => $business->first()->id,
                    'codigo_afiliador' => $business->first()->codigo_afiliador
                ]);
                return redirect()->route('afiliador.cuenta');
            }
        }
        return redirect()->route('afiliador.cuenta')
            ->withErrors([
            'codigo' => 'El código es incorrecto'
        ]);
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

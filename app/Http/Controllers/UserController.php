<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Business;
use Auth;
class UserController extends Controller
{
    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'foto' => 'required|file|mimes:jpeg,gif,png',
            'nombre' => 'required|max:255',
            'last_name' => 'required|max:255',
            'nick' => 'required|max:255',
            'email' => 'required|email',
            'confirmPassword' => 'required|max:255',
            'fecha_nac' => 'required|date',
            'direccion_calle' => 'required|max:255',
            'direccion_num' => 'required|max:255',
            'direccion_estado' => 'required|max:255',
            'direccion_cp' => 'required|max:255',
            'pais' => 'required|max:255'
        ]);
        $data = [
            'name' => $request['nombre'],
            'last_name' => $request['last_name'],
            'nick' => $request['nick'],
            'password' => bcrypt($request['confirmPassword']),
            'email' => $request['email'],
            'fecha_nac' => $request['fecha_nac'],
            'frase' => 'mi frase',
            'direccion_num' => $request['direccion_num'],
            'direccion_calle' => $request['direccion_calle'],
            'direccion_delegacion' => 'La Paz',
            'direccion_cp' => $request['direccion_cp'],
            'direccion_estado' => $request['direccion_estado'],
            'pais' => $request['pais'],
            'puntos' => '0'
        ];

        if ($user = User::create($data)) {
            if ($request->file('foto')) {
                $file = $request->file('foto');
                $file_name = $user->id . '_' . $user->nick . '.' . $file->extension();
                $file_path = 'dist/img/user/profile/';
                $file->move($file_path, $file_name);
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    return redirect()->intended('home');
                }
            }
        }
        $errors = $validator->errors();
        return response()->json([
            'success' => false,
            'message' => json_decode($errors)
        ], 422);

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

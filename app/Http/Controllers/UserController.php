<?php

namespace App\Http\Controllers;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;
use App\Business;
use App\CategoryModel;
use App\Boletin;
use App\Products;
use App\FavoriteProducts;
use App\FavoriteBusiness;
use Auth;


class UserController extends Controller
{
    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'foto' => 'required|file|mimes:jpeg,gif,png',
            'nombre' => 'required|max:255',
            'last_name' => 'required|max:255',
            'nick' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'confirmPassword' => 'required|max:255',
            'fecha_nac' => 'required|date',
            'direccion_calle' => 'required|max:255',
            'direccion_num' => 'required|max:255',
            'direccion_estado' => 'required|max:255',
            'direccion_cp' => 'required|max:255',
            'pais' => 'required|max:255'
        ],[
            'foto.file' => 'Debes elegir una imagen valida',
            'foto.mimes' => 'Debes elegir una imagen valida',
            'nombre.required' => 'Debes escribir tu(s) nombre(s)',
            'last_name.required' => 'Debes escribir tus apellidos',
            'nick.required' => 'Debes escribir un usuario',
            'nick.unique' => 'Este usuario ya se encuentra registrado',
            'email.required' => 'Debes escribir tu correo electrónico',
            'email.unique' => 'Este correo ya se encuentra registrado',
            'confirmPassword.required' => 'Debes escribir alguna contraseña',
            'direccion_calle.required' => 'Debes escribir tu dirección',
            'direccion_num.required' => 'Debes escribir el número de tu piso/casa/etc',
            'direccion_estado.required' => 'Debes escribir el estado en donde vives',
            'direccion_cp.required' => 'Debes escribir tu código postal',
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
            }
            return response()->json(['sucess' => true, 'message' => "ok"]);
        }
        $errors = $validator->errors();
        return response()->json([
            'success' => false,
            'message' => json_decode($errors)
        ], 422);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $temp_nick = $user->nick;

        $validator = $this->validate($request, [
            'foto' => 'file|mimes:jpeg,png',
            'nombre' => 'required|max:255',
            'last_name' => 'required|max:255',
            'nick' => 'required|max:255|unique:users,nick,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
            'fecha_nac' => 'required|date',
            'direccion_calle' => 'required|max:255',
            'direccion_num' => 'required|max:255',
            'direccion_estado' => 'required|max:255',
            'direccion_cp' => 'required|max:255',
            'pais' => 'required|max:255'
        ],[
            'foto.file' => 'Debes elegir una imagen valida',
            'foto.mimes' => 'Debes elegir una imagen valida',
            'nombre.required' => 'Debes escribir tu(s) nombre(s)',
            'last_name.required' => 'Debes escribir tus apellidos',
            'nick.required' => 'Debes escribir un usuario',
            'nick.unique' => 'Este usuario ya se encuentra registrado',
            'email.required' => 'Debes escribir tu correo electrónico',
            'email.unique' => 'Este correo ya se encuentra registrado',
            'direccion_calle.required' => 'Debes escribir tu dirección',
            'direccion_num.required' => 'Debes escribir el número de tu piso/casa/etc',
            'direccion_estado.required' => 'Debes escribir el estado en donde vives',
            'direccion_cp.required' => 'Debes escribir tu código postal',
        ]);

        if ($user->update([
            'name' => $request['nombre'],
            'last_name' => $request['last_name'],
            'nick' => $request['nick'],
            'email' => $request['email'],
            'fecha_nac' => $request['fecha_nac'],
            'direccion_num' => $request['direccion_num'],
            'direccion_calle' => $request['direccion_calle'],
            'direccion_delegacion' => 'La Paz',
            'direccion_cp' => $request['direccion_cp'],
            'direccion_estado' => $request['direccion_estado'],
            'pais' => $request['pais'],
        ])){
            if ($request->file('foto')) { // Modificar foto anterior
                $file = $request->file('foto');
                $file_name = $user->id . '_' . $user->nick . '.' . $file->extension();
                $try_path = 'dist/img/user/profile/'.$user->id . '_' . $temp_nick . '.png';
                $try_path2 = 'dist/img/user/profile/'.$user->id . '_' . $temp_nick . '.jpeg';
                $file_path = 'dist/img/user/profile/';
                if (Storage::disk('public')->exists($try_path)) // Borra foto anterior
                    Storage::disk('public')->delete($try_path);
                if (Storage::disk('public')->exists($try_path2)) // Borra foto anterior
                    Storage::disk('public')->delete($try_path2);
                $file->move($file_path, $file_name);
            }
            else{ // Actualizar foto con nuevo nick
                if($temp_nick != $user->nick)
                {
                    $file_path = 'dist/img/user/profile/';
                    $try_path = $file_path.$user->id . '_' . $temp_nick . '.png';
                    $try_path2 = $file_path.$user->id . '_' . $temp_nick . '.jpeg';
                    if (Storage::disk('public')->exists($try_path)){
                        Storage::disk('public')->move($try_path, $file_path.$user->id.'_'.$user->nick.'.png');
                    }
                    if (Storage::disk('public')->exists($try_path2)){
                        Storage::disk('public')->move($try_path2, $file_path.$user->id.'_'.$user->nick.'.jpeg');
                    }
                }
            }
            if(($user->empresa || $user->admin) && $temp_nick != $user->nick){
                $businesses = $user->getBusiness();
                foreach($businesses as $business)
                {
                    $file_path = 'dist/img/business/profile/';
                    $try_path = $file_path.$business->id . "_" .$business->user_id. "_".$temp_nick.'.png';
                    $try_path2 = $file_path.$business->id . "_" .$business->user_id. "_".$temp_nick.'.jpeg';
                    if (Storage::disk('public')->exists($try_path)) // Borra foto anterior
                        Storage::disk('public')->move($try_path, $file_path.$business->id . "_" .$business->user_id. "_".$user->nick.'.png');
                    if (Storage::disk('public')->exists($try_path2)) // Borra foto anterior
                        Storage::disk('public')->move($try_path2, $file_path.$business->id . "_" .$business->user_id. "_".$user->nick.'.jpeg');
                }
            }
            return response()->json(['sucess' => true, 'message' => "ok"]);
        }
        $errors = $validator->errors();
        return response()->json([
            'success' => false,
            'message' => json_decode($errors)
        ], 422);
    }
    public function edit($id){
        return User::find($id);
    }
    public function promos(){
        $businesses = Business::all();
        $boletin = Boletin::inRandomOrder()->get()->first();
        return view('usuario.index',
        ['businesses' => $businesses,
        'boletin' => $boletin]);
    }
    public function categorias(){
        $categories = CategoryModel::all();
        return view('usuario.categorias', ['categories' => $categories]);
    }
    public function cuenta(){
        return view('vistas.cuenta',['user' => auth()->user()]);
    }
    public function puntos(){
        $products = Products::where('puntos','>','0')->get();
        return view('usuario.puntos',[
            'products' => $products,
            'user' => auth()->user(),
        ]);
    }
    public function empresas(Request $request){
        $s = $request->query('s');
        $q = $request->query('categoria');
        $category = CategoryModel::find($q);
        $categories = CategoryModel::all();
		// Query and paginate result
        if($category == null){
            $business = Business::where('descripcion', 'like', "%$s%")
            ->orWhere('nombre', 'like', "%$s%");
        }
        else{
            $q = Business::where('descripcion', 'like', "%$s%")
            ->orWhere('nombre', 'like', "%$s%");
            $business = $q->where('category_id', '=', $category->id);
        }
        return view('usuario.empresas',
        ['business' => $business,
        's' => $s ,
        'category' => $category,
        'categories' => $categories]);
    }
    public function favorito($id){
        if(Products::find($id)){
            $user = auth()->user();
            $favorito = FavoriteProducts::where('user_id', $user->id)
                ->where('product_id', $id);
            if($favorito->count() == 0){
                $fav = FavoriteProducts::create([
                    'user_id' => $user->id,
                    'product_id' => $id
                ]);
                return response()->json([
                    'success' => true
                ]);
            }
            else{
                if($favorito->delete())
                return response()->json([
                    'success' => true
                ]);
            }
        }
        return response()->json([
            'success' => false
        ]);
    }
    public function favoritoEmpresa($id){
        if(Business::find($id)){
            $user = auth()->user();
            $favorito = FavoriteBusiness::where('user_id', $user->id)
                ->where('business_id', $id);
            if($favorito->count() == 0){
                $fav = FavoriteBusiness::create([
                    'user_id' => $user->id,
                    'business_id' => $id
                ]);
                return response()->json([
                    'success' => true
                ]);
            }
            else{
                if($favorito->delete())
                return response()->json([
                    'success' => true
                ]);
            }
        }
        return response()->json([
            'success' => false
        ]);
    }
    public function mapa(){
        return view('usuario.mapa');
    }
    public function notificaciones(){
        return view('vistas.notificaciones');
    }
    public function guardados(){
        $products = FavoriteProducts::where('user_id', auth()->user()->id)->get();
        $businesses = FavoriteBusiness::where('user_id', auth()->user()->id)->get();
        return view('usuario.guardados', [
            'products' => $products,
            'businesses' => $businesses]);
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
    public function mostrarEmpresa($id){
        return view('vistas.empresa',[
            'business' => Business::find($id),
            'user' => auth()->user()]);
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

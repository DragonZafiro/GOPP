<?php

namespace App\Http\Controllers;
use App\User;
use App\Business;
use App\CategoryModel;
use App\Boletin;
use App\Afiliador;
use App\FavoriteBusiness;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
{
    public function __construct(){

    }
    public function inicio(){
        $user = auth()->user();
        $neg = Business::find($user->loggedAsBusiness);
        $category = CategoryModel::find($neg->category_id);
        $businesses = $category->getBusiness();
        return view('empresa.index', ['businesses' => $businesses, 'category' => $category]);
    }
    public function cuenta(){
        $boletin = Boletin::inRandomOrder()->get()->first();
        $user = auth()->user();
        $business = Business::find($user->loggedAsBusiness);
        $afiliador = Afiliador::where('business_id', $business->id)->get();
        return view('vistas.cuenta',[
            'user' => $user,
            'boletin' => $boletin,
            'business' => $business,
            'category' => $business->category,
            'afiliador' => $afiliador,
        ]);
    }
    public function miempresa(){
        $user = auth()->user();
        return view('vistas.empresa',[
            'business' => Business::find($user->loggedAsBusiness),
            'user' => $user]);
    }
    public function seguidores(){
        $users = FavoriteBusiness::where('business_id', auth()->user()->loggedAsBusiness)->get();
        return view('empresa.seguidores', [
            'users' => $users]);
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
    public function edit($id){
        return Business::find($id);
    }
    public function update(Request $request, $id){
        $business = Business::find($id);

        $validator = $this->validate($request,[
            'nombre_empresa' => 'required|max:255',
            'direccion' => 'required|max:255',
            'telefono' => 'required|numeric',
            'email_empresa' => 'required|email|max:255|unique:business,email,'.$business->id,
            'web' => 'required|max:255',
            'categoria' => 'required|max:255',
            'descripcion' => 'required|max:255',
        ],[
            'nombre_empresa.required' => 'No has escrito el nombre'
        ]);

        if($business->update([
            'nombre' => $request['nombre_empresa'],
            'direccion' => $request['direccion'],
            'telefono' => $request['telefono'],
            'email' => $request['email_empresa'],
            'web' => $request['web'],
            'category_id' => $request['categoria'],
            'descripcion' => $request['descripcion'],
            'facebook' => $request['facebook'],
            'instagram' => $request['instagram'],
            'twitter' => $request['twitter'],
            'whatsapp' => $request['whatsapp']
            ])
        ){
            if ($request->file('foto')) { // Modificar foto anterior
                $file = $request->file('foto');
                $file_name = $business->id . "_" .$business->user_id.'.'. $file->extension();
                $file_path = 'dist/img/business/profile/';
                // Borrar foto anterior si existe
                $try_path = 'dist/img/business/profile/'.$business->id . "_" .$business->user_id.'.png';
                $try_path2 = 'dist/img/business/profile/'.$business->id . "_" .$business->user_id.'.jpeg';
                if (Storage::disk('public')->exists($try_path)) // Borra foto anterior
                    Storage::disk('public')->delete($try_path);
                if (Storage::disk('public')->exists($try_path2)) // Borra foto anterior
                    Storage::disk('public')->delete($try_path2);
                // Colocar nueva imagen
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
    public function codigo($id){
        $business = Business::find($id);
        $afiliador = Afiliador::where('business_id', $business->id)->get();
        if($afiliador->count() > 0) return "error";
        if(auth()->user() == $business->user){
            if($business->codigo_afiliador == null)
                $business->codigo_afiliador = md5(uniqid(rand(), true));
            $business->save();
            return $business;
        }
        return "error";
    }
    public function desafiliar($id){
        $business = Business::find($id);
        $afiliador = Afiliador::where('business_id', $business->id)->get();
        if ($afiliador->count() == 0) return "error";
        if (auth()->user() == $business->user) {
            if ($business->codigo_afiliador != null)
            {
                $business->codigo_afiliador = null;
                $business->save();
                return Afiliador::destroy($afiliador->first()->id);
            }
        }
        return response()->json([
            'success' => false,
            'message' => "no"
        ], 422);
    }
    // Cierra el perfil y regresa a la selección de perfiles
    public function logout(){
        User::where('id', auth()->user()->id)->update(['loggedAs' => 'vacio']);
        User::where('id', auth()->user()->id)->update(['loggedAsBusiness' => 'vacio']);
        User::where('id', auth()->user()->id)->update(['loggedIn' => false]);
        return redirect()->route('home');
    }
}

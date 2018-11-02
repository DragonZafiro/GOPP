<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Promos;
use Yajra\DataTables\Datatables;

class PromosController extends Controller
{
    public function index()
    {
        return view('empresa.ofertas');
    }
    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'product_id' => 'numeric',
            'precio' => 'required|numeric',
            'encabezado' => 'required',
            'compraMinima' => 'numeric',
            'descripcion' => 'required',
            'fecha_fin' => 'required',
            'plantilla' => 'required'
        ], [
            'product_id.numeric' => 'No has seleccionado el producto',
            'precio.required' => 'No has escrito el precio',
            'precio.numeric' => 'El precio debe de ser un número',
            'encabezado.required' => 'No has escrito el título',
            'compraMinima.numeric' => 'El valor debe de ser un número',
            'descripcion.required' => 'No has escrito la descripción',
            'fecha_fin.required' => 'No has escrito el día de finalización',
            'plantilla.required' => 'No has seleccionado la plantilla'
        ]);
        $data = [
            'business_id' => intval(Auth::user()->loggedAsBusiness),
            'product_id' => $request['product_id'],
            'precio' => $request['precio'],
            'compraMinima' => $request['compraMinima'],
            'encabezado' => $request['encabezado'],
            'descripcion' => $request['descripcion'],
            'fecha_inicio' => $request['fecha_fin'],
            'fecha_fin' => $request['fecha_fin'],
            'plantilla' => $request['plantilla']
        ];

        if (Promos::create($data)) {
            return response()->json(['sucess' => true, 'message' => "ok"]);
        }
        $errors = $validator->errors();
        return response()->json([
            'success' => false,
            'message' => json_decode($errors)
        ], 422);

    }
    public function edit($id)
    {
        return Promos::find($id);
    }
    public function destroy($id)
    {
        Promos::destroy($id);
    }
    public function update(Request $request, $id)
    {
        $validator = $this->validate($request, [
            'product_id' => 'numeric',
            'precio' => 'required|numeric',
            'encabezado' => 'required',
            'compraMinima' => 'numeric',
            'descripcion' => 'required',
            'fecha_fin' => 'required',
            'plantilla' => 'required'
        ], [
            'product_id.numeric' => 'No has seleccionado el producto',
            'precio.required' => 'No has escrito el precio',
            'precio.numeric' => 'El precio debe de ser un número',
            'encabezado.required' => 'No has escrito el título',
            'compraMinima.numeric' => 'El valor debe de ser un número',
            'descripcion.required' => 'No has escrito la descripción',
            'fecha_fin.required' => 'No has escrito el día de finalización',
            'plantilla.required' => 'No has seleccionado la plantilla'
        ]);

        $promo = Promos::find($id);
        if($promo
            ->update([
                'nombre' => $request['nombre'],
                'codigo' => $request['codigo'],
                'marca' => $request['marca'],
                'tipo' => $request['tipo'],
                'descripcion' => $request['descripcion'],
                'precio' => $request['precio'],
                'puntos' => $request['dines'],
                'stock' => $request['stock'],
                'comentario' => $request['comentario']
        ]))
            return response()->json(['sucess' => true, 'message' => "ok"]);

        $errors = $validator->errors();
        return response()->json([
            'success' => false,
            'message' => json_decode($errors)
        ], 422);
    }
    public function AllPromos()
    {
        $id = intval(Auth::user()->loggedAsBusiness);
        $promo = Promos::where('business_id', $id)->get();
        return Datatables::of($promo)
            ->addColumn('action', function ($promo) {
                $buttons = '<a href="producto/' . $promo->getProduct()->id . '" class="btn btn-sm btn-success text-white"><i class="fas fa-eye"></i></a>' .
                    ' <a onclick="editForm(' . $promo->id . ')" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i></a>' .
                    ' <a onclick="deleteData(' . $promo->id . ')" class="btn btn-sm btn-danger text-white"><i class="fas fa-times"></i></a>';
                return $buttons;
            })
            ->addColumn('foto', function ($promo) {
                $photo = $promo->getProduct()->getProductImg();
                return $photo;
            })
            ->make(true);
    }
}

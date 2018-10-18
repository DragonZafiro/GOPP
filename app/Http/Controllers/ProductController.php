<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Products;
use Yajra\DataTables\Datatables;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        return view('empresa.productos');
    }
    public function show($id)
    {
        return view('vistas.producto')
            ->with('producto', Products::find($id));
    }
    public function store(Request $request)
    {
        $validator = $this->validate($request,[
            'file' => 'required|file|mimes:jpeg,gif,png',
            'nombre' => 'required|max:255',
            'codigo' => 'required|numeric',
            'marca' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:1',
            'puntos' => 'required|numeric',
            'stock' => 'required|numeric'
        ],[
            'file.required' => 'No has seleccionado una foto',
            'nombre.required' => 'No has escrito el nombre',
            'codigo.required' => 'No has escrito el código',
            'marca.required' => 'No has escrito la marca',
            'descripcion.required' => 'No has escrito la descripción',
            'precio.required' => 'No has escrito el precio',
            'puntos.required' => 'No has escrito los dines',
            'stock.required' => 'No has escrito las existencias',
            'file.file' => 'No has seleccionado una foto',
            'file.mimes' => 'La foto seleccionada no es válida',
            'codigo.numeric' => 'El código debe de ser númerico',
            'precio.numeric' => 'El precio debe de ser númerico',
            'puntos.numeric' => 'Los dines deben de ser númericos',
            'stock.numeric' => 'La existencia debe de ser númerica'
        ]);
        $data = [
            'business_id' => intval(Auth::user()->loggedAsBusiness),
            'nombre' => $request['nombre'],
            'codigo' => $request['codigo'],
            'marca' => $request['marca'],
            'tipo' => $request['tipo'],
            'descripcion' => $request['descripcion'],
            'precio' => $request['precio'],
            'puntos' => $request['puntos'],
            'stock' => $request['stock'],
            'comentario' => $request['comentario']
        ];

        if ($product = Products::create($data)) {
            if ($request->file('file')) {
              //  $path = Storage::disk('public')->put('dist/business/products/',$request->file('file'));

                $file = $request->file('file');
                $file_name = $product->id . '_' . $product->codigo . '.' . $file->extension();
                $file_path = 'dist/img/business/products/';
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
    public function edit($id){
        return Products::find($id);
    }
    public function destroy($id){
        Products::destroy($id);
    }
    public function update(Request $request, $id){

        $validator = $this->validate($request,[
            'file' => 'file|mimes:jpeg,gif,png',
            'nombre' => 'required|max:255',
            'codigo' => 'required|numeric',
            'marca' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:1',
            'puntos' => 'required|numeric',
            'stock' => 'required|numeric'
        ],[
            'file.required' => 'No has seleccionado una foto',
            'nombre.required' => 'No has escrito el nombre',
            'codigo.required' => 'No has escrito el código',
            'marca.required' => 'No has escrito la marca',
            'descripcion.required' => 'No has escrito la descripción',
            'precio.required' => 'No has escrito el precio',
            'puntos.required' => 'No has escrito los dines',
            'stock.required' => 'No has escrito las existencias',
            'file.file' => 'No has seleccionado una foto',
            'file.mimes' => 'La foto seleccionada no es válida',
            'codigo.numeric' => 'El código debe de ser númerico',
            'precio.numeric' => 'El precio debe de ser númerico',
            'puntos.numeric' => 'Los dines deben de ser númericos',
            'stock.numeric' => 'La existencia debe de ser númerica'
        ]);

        $product = Products::find($id);
        if ($request->file('file')) {
                $file = $request->file('file');
                $file_name = $product->id . '_' . $product->codigo . '.' . $file->extension();
                $file_path = 'dist/img/business/products/';
                if (Storage::exists($file_path ,$file_name))
                    Storage::delete($file_path , $file_name);
                $file->move($file_path, $file_name);
        }
        if($product->update([
                'nombre' => $request['nombre'],
                'codigo' => $request['codigo'],
                'marca' => $request['marca'],
                'tipo' => $request['tipo'],
                'descripcion' => $request['descripcion'],
                'precio' => $request['precio'],
                'puntos' => $request['puntos'],
                'stock' => $request['stock'],
                'comentario' => $request['comentario']
        ]))
            return response()->json(['sucess' => true, 'message' => "mamón"]);
        $errors = $validator->errors();
        return response()->json([
            'success' => false,
            'message' => json_decode($errors)
        ], 422);
    }
    public function AllProduct()
    {
        $id = intval(Auth::user()->loggedAsBusiness);
        $product = Products::where('business_id', $id)->get();
        return Datatables::of($product)
            ->addColumn('action', function ($product) {
                $buttons = '<a href="productos/'.$product->id.'" class="btn btn-sm btn-success text-white"><i class="fas fa-eye"></i></a>' .
                    ' <a onclick="editForm(' . $product->id . ')" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i></a>' .
                    ' <a onclick="deleteData(' . $product->id . ')" class="btn btn-sm btn-danger text-white"><i class="fas fa-times"></i></a>';
                return $buttons;
            })
            ->addColumn('foto', function ($product) {
                $photo = $product->getProductImg();
                return $photo;
            })
            ->addColumn('precio', function ($product) {
                return $product->precio;
            })
            ->addColumn('puntos', function ($product) {
                return $product->puntos;
            })
            ->addColumn('stock', function ($product) {
                return $product->stock;
            })
            ->make(true);
    }
}

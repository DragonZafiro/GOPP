<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use Auth;
use App\Products;

class CarritoController extends Controller
{
    public function AllProduct(){
        $cart = \Cart::session(auth()->user()->id);
        $product = $cart->getContent();
        return Datatables::of($product)
            ->addColumn('action', function ($product) {
                $buttons = '<a onclick="incrementarItem('.$product->id.')" class="btn btn-sm btn-info text-white"><i class="fas fa-sort-up"></i></a>' .
                    ' <a onclick="decrementarItem(' . $product->id . ')" class="btn btn-sm btn-info text-white"><i class="fas fa-sort-down"></i></a>' .
                    ' <a onclick="borrarItem(' . $product->id . ')" class="btn btn-sm btn-danger text-white"><i class="fas fa-times"></i></a>';
                return $buttons;
            })
            ->addColumn('foto', function ($product) {
                $photo = Products::find($product->id)->getProductImg();
                return $photo;
            })
            ->addColumn('subtotal', function ($product) {
                return $product->price * $product->quantity;
            })
            ->make(true);
    }
    public function agregar($id){
        $product = Products::find($id);
        $cart = \Cart::session(auth()->user()->id);
        if($cart->add(array(
            'id' => $id,
            'name' => $product->nombre,
            'price' => $product->precio,
            'quantity' => 1,
            'attributes' => array()
        )))
        return "ok";
    }
    public function borrar($id){
        $cart = \Cart::session(auth()->user()->id);
        if($cart->remove($id))
        return "ok";
    }
    public function incrementar($id){
        $cart = \Cart::session(auth()->user()->id);
        $cart->update($id, array(
            'quantity' => 1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));
        if($cart)
        return "ok";
    }
    public function decrementar($id){
        $cart = \Cart::session(auth()->user()->id);
        $cart->update($id, array(
            'quantity' => -1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));
        if($cart)
        return "ok";
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    public $timestamps = null;
    public $fillable = ['business_id','nombre', 'codigo', 'marca', 'descripcion', 'tipo', 'precio', 'puntos', 'stock', 'comentario'];
    public function getProductImg()
    {
        $src = glob("dist/img/business/products/" . $this->id . "_" . $this->codigo . ".*[jpg,png,jpeg,gif]");
        if ($src == null) return asset("dist/img/user/profile/default.jpg");
        else return asset($src[0]);
    }
    public function promos(){
        $this->hasMany('App\Promos');
    }
    public function  getBusiness(){
        return Business::where('id',$this->business_id)->first();
    }
    public function getPromo(){
        $product = Promos::where('product_id', $this->id)->first();
        if($product != null) return $product;
    }
}

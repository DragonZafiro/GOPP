<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
use App\Business;
class Promos extends Model
{
    protected $table = 'promos';
    public $timestamps = null;
    public $fillable = ['product_id','business_id','precio', 'compraMinima', 'encabezado', 'descripcion', 'fecha_inicio', 'fecha_fin', 'plantilla'];

    public function getProduct(){
        return Products::where('id',$this->product_id)->first();
    }
    public function getBusiness(){
        return Business::where('id', $this->business_id)->first();
    }
}

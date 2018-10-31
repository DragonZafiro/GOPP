<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteProducts extends Model
{
    protected $table = 'favorite_products';
    public $timestamps = null;
    public $fillable = ['user_id', 'product_id'];

    public function getProduct(){
        return Products::find($this->product_id);
    }
}

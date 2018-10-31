<?php

namespace App;
use App\Business;

use Illuminate\Database\Eloquent\Model;

class FavoriteBusiness extends Model
{
    protected $table = 'favorite_business';
    public $timestamps = null;
    public $fillable = ['user_id', 'business_id'];

    public function getBusiness(){
        return Business::find($this->business_id);
    }
}

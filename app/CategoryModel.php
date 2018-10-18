<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Business;
class CategoryModel extends Model
{
    public $timestamps = false;
    protected $table = 'category';

    public function getBusiness(){
        return Business::where('category_id', $this->id)->get();
    }
}

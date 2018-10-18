<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoryModel;
use App\User;
use App\Promos;
use App\Products;
class Business extends Model
{
    protected $table = 'business';

    public function category(){
        return $this->belongsTo(CategoryModel::class,'category_id');
    }

    public function getBusinessImg(Business $business){
        $user = User::where('id',$business->user_id)->first();
        $src = glob("dist/img/business/profile/" . $business->id . "_" .$business->user_id. "_".$user->nick.".*[jpg,png,jpeg,gif]");
        if ($src == null) return asset("dist/img/user/profile/default.jpg");
        else
        return asset($src[0]);
    }
    public function getProducts(){
        return Products::where('business_id', $this->id)->get();
    }
    public function getBusinessPromos(){
        return Promos::where('business_id', $this->id)->get();
    }
}

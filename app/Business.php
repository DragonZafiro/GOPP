<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoryModel;
use App\User;
use App\Promos;
use App\Products;
use App\Afiliador;

class Business extends Model
{
    protected $table = 'business';
    protected $fillable = [
        'nombre', 'direccion', 'descripcion', 'telefono', 'email', 'web', 'whatsapp', 'facebook', 'twitter', 'instagram', 'codigo_afiliador'
    ];
    protected $hidden = ['password', 'user_id', 'id'];

    public function category(){
        return $this->belongsTo(CategoryModel::class,'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getBusinessImg(){
        $user = User::where('id', $this->user_id)->first();
        $src = glob("dist/img/business/profile/" . $this->id . "_" .$this->user_id. "_".$user->nick.".*[jpg,png,jpeg]");
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

    public function getAfiliador(){
        return Afiliador::where('business_id', $this->id)->get();
    }
}

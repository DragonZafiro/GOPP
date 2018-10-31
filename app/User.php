<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Business;
use Auth;
class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'nick', 'fecha_nac', 'frase', 'direccion_num', 'direccion_calle',
        'direccion_delegacion', 'direccion_cp', 'direccion_estado', 'pais', 'puntos',
    ];

    protected $hidden = [
        'password', 'remember_token', 'usuario', 'admin', 'afiliador', 'repartidor', 'empresa'
    ];
    public function getUserImage(){
        $user_profile = glob("dist/img/user/profile/".$this->id."_".$this->nick.".*[jpg,png,jpeg,gif]");
        if($user_profile == null) return asset("dist/img/user/profile/default.jpg");
        else return asset($user_profile[0]);
    }
    public function getCoverImage(){
        $user_cover = glob("dist/img/user/cover/".$this->id."_".$this->nick.".*[jpg,png,jpeg,gif]");
        if($user_cover == null) return asset("dist/img/user/cover/default.jpg");
        else return asset($user_cover[0]);
    }
    public function getBusinessSelected(){
        return Business::find($this->loggedAsBusiness);
    }
    public function getBusiness(){
        return Business::where('user_id', $this->id)->get();
    }
    public function getAfiliador(){
        return Afiliador::where('user_id', $this->id)->get();
    }
    public function getAfiliadorBusiness(){
        return Afiliador::where('user_id', $this->id)
            ->where('business_id', '<>', NULL)->get();
    }
    public function getAfiliadorRepartidor(){
        return Afiliador::where('user_id', $this->id)
            ->where('repartidor_id', '<>', NULL)->get();
    }
}

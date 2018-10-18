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
        'name', 'email', 'password', 'nick', 'fecha_nac', 'frase', 'direccion_num', 'direccion_calle',
        'direccion_delegacion', 'direccion_cp', 'direccion_estado', 'pais', 'puntos',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getUserImage(){
        $user = Auth::user();
        if($user->loggedAs == 'empresa')
        {
            $business = Business::find($user->loggedAsBusiness);
            $user_profile = glob("dist/img/business/profile/".$business->id."_".$user->id."_".$user->nick.".*[jpg,png,jpeg,gif]");
            if($user_profile == null) return asset("dist/img/user/profile/default.jpg");
            else return asset($user_profile[0]);
        }
        else {
            $user_profile = glob("dist/img/user/profile/".$user->id."_".$user->nick.".*[jpg,png,jpeg,gif]");
            if($user_profile == null) return asset("dist/img/user/profile/default.jpg");
            else return asset($user_profile[0]);
        }
    }
    public function getCoverImage(){
        $user = Auth::user();
        $user_cover = glob("dist/img/user/cover/".$user->id."_".$user->nick.".*[jpg,png,jpeg,gif]");
        if($user_cover == null) return asset("dist/img/user/cover/default.jpg");
        else return asset($user_cover[0]);
    }
    public function getBusinessSelected(){
        return Business::find(Auth::user()->loggedAsBusiness);
    }
}

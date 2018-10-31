<?php

namespace App;

use App\User;
use App\Business;

use Illuminate\Database\Eloquent\Model;

class Afiliador extends Model
{
    protected $table = 'afiliador';
    protected $fillable = [
        'user_id','business_id','repartidor_id', 'codigo_afiliador',
    ];

    public function getUser(){
        return User::find($this->user_id);
    }

    public function getBusiness(){
        return Business::find($this->business_id);
    }

    public function getRepartidor(){
        return User::find($this->repartidor_id);
    }
}

<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Business;

class Boletin extends Model
{
    protected $table = 'boletin';
    public $timestamps = null;
    public $fillable = ['business_id','enlace','titulo', 'contenido', 'plantilla', 'fecha_inicio', 'fecha_fin'];

    public function getBusiness(){
        return Business::find($this->business_id);
    }

    public function getBoletinImg(){
        $src = glob("dist/img/business/boletin/" . $this->id . "_" .$this->getBusiness()->id. ".*[jpg,png,jpeg,gif]");
        return asset($src[0]);
    }
}

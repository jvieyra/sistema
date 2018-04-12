<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $fillable = ['name','descripcion','condicion'];
  
  //uno a muchos
  public function articulos(){
    return $this->hasMany('App\Articulos');
  }

}

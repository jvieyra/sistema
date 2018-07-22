<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
  
  protected $table = 'detalle_ingresos';
  protected $filable = [
      'idingreso',
      'idarticulo',
      'cantidad',
      'precio'
    ];
  
  
}

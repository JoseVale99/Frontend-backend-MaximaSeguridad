<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pedido extends Model
{
   
    use SoftDeletes; //Implementamos
    // protected $dates = ['deleted_at']; //Registramos la nueva columna
    protected $table = 'pedidos';
    protected $primarykey = 'id';
    public $timestamps = false;
    
    protected $fillable =[
        'nombre',
        'total_venta',
        'productos',
        'direccion',
        'telefono',
        'fecha'    
    ];

      // función para la búsqueda de citas
      public function scopeBuscar($query, $tipo, $buscar) {
        if ( ($tipo) && ($buscar) ) {
            return $query->where($tipo,'like',"%$buscar%");
        }
    }



// Relacion uno a muchos (inversa)
public function user(){
    return $this->belongTO('App\Models\User');
}
}

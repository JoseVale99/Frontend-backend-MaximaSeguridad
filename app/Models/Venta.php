<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Pedido;
class Venta extends Model
{
   
    use SoftDeletes; //Implementamos
    // protected $dates = ['deleted_at']; //Registramos la nueva columna
    protected $table = 'ventas';
    protected $primarykey = 'id';
    // public $timestamps = false;
    

    protected $guarded = [];

 // función para la búsqueda de citas
 public function scopeBuscar($query, $tipo, $buscar) {
    if ( ($tipo) && ($buscar) ) {
        return $query->where($tipo,'like',"%$buscar%");
    }
}
        
// Relacion uno a muchos (inversa)
public function user(){
    return $this->belongsTo(User::class,'id_cliente');
}
public function pedidos(){
    return $this->hasOne(Pedido::class,'id_venta');
}

}

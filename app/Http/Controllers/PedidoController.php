<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Session;
use Illuminate\Support\Str;
class PedidoController extends Controller
{


    public function index(Request $request){

       
            $buscar = $request->get('buscar');
            $tipo = $request->get('tipos');
            $variablesurl = $request->all();
            $pedidos = Pedido::buscar($tipo, Str::upper($buscar))->paginate(5)->appends($variablesurl);
            
          
       
        return view('pedidos.index', compact('pedidos'));
    }


    public function destroy($id){

        $pedidos = Pedido::findOrFail($id);
        if ($pedidos){

        $pedidos->delete($pedidos);
        Session::flash('message_delete', '¡Pedido borrada con éxito!');   
    }
        return redirect()->route("pedido.index");
    }
}

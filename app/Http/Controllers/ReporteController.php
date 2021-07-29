<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pedido;
use DB;
use PDF;
class ReporteController extends Controller
{
    

    function index(){          

        $dias = ['Lunes','Martes', 'Miercoles','Jueves',
                    'Viernes','Sabado','Domingo'];
        // foreach ($year as $key => $value) {
        $total_mes = DB::table('pedidos')
        ->select(
            DB::raw('sum(total_venta) as total'),
            DB::raw('MONTHNAME(pedidos.fecha) as mes'))
        
        ->groupBy('mes')
        ->get();

        $total_anio = DB::table('pedidos')
        ->select(
            DB::raw('sum(total_venta) as total'),
            DB::raw('YEAR(pedidos.fecha) as mes'))
        
        ->groupBy('mes')
        ->get();

            $array=DB::table('pedidos')
            ->select(DB::raw('SUM(pedidos.total_venta) as total'),
    DB::raw('DAYNAME(pedidos.fecha) as dias'))
    ->groupBy('dias')
    ->get();
       
        $total = [];        
    foreach ($array as $key => $qs) {
        if ($qs->dias == "Monday"){
            $total["Lunes"] =$qs->total; 
        }  
        elseif ($qs->dias == "Tuesday"){
            $total["Martes"] =$qs->total; 
        }
        elseif ($qs->dias == "Wednesday"){
            $total["Miercoles"] =$qs->total; 
        }
        elseif ($qs->dias == "Thursday"){
            $total["Jueves"] =$qs->total; 
        }
        elseif ($qs->dias == "Friday"){
            $total["Viernes"] =$qs->total; 
        }
        elseif ($qs->dias == "Saturday"){
            $total["Sabado"] =$qs->total; 
        }
        else{
            $total["Domingo"] =$qs->total;
        }
                  
    }
    
 

     return view('report.index', compact('total_mes','total_anio'))->with('dias',json_encode($dias,JSON_NUMERIC_CHECK))->with('total',json_encode($total,JSON_NUMERIC_CHECK));
    }

    public function createPDF()
    {
    


            $reportes =  DB::table('pedidos')
            ->select(
                DB::raw('sum(total_venta) as total'),
                DB::raw("DATE_FORMAT(fecha,'%d - %b - %Y') as fecha")
            )
            ->groupBy('fecha')
            ->get();

            
            // share data to view
            view()->share('report.reporte-pdf', $reportes);
            $pdf = PDF::loadView('report.reporte-pdf', ['reportes' => $reportes]);
        


        // download PDF file with download method
        return $pdf->download('reporteVenta.pdf');
    }
}

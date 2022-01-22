<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Venta;
use DB;
use PDF;
class ReporteController extends Controller
{
    

    function index(){          

        $dias = ['Lunes','Martes', 'Miércoles','Jueves',
                    'Viernes','Sábado','Domingo'];
        // foreach ($year as $key => $value) {
        $total_mes = Venta::select(
            DB::raw('sum(total) as total')
            
        )
        ->whereMonth('created_at', '=', date('m'))
            // ->groupBy('months')
            ->get();

        $total_anio = DB::table('ventas')
        ->select(
            DB::raw('sum(total) as total')
          
            )
            ->whereYear('created_at', '=', date('Y'))
        // ->groupBy('mes')
        ->get();

            $array=DB::table('ventas')
            ->select(DB::raw('SUM(ventas.total) as total'),
            DB::raw("to_char(ventas.created_at, 'Day') as dias")
    // DB::raw('DAYNAME(pedidos.fecha) as dias')
    
    )
  ->groupBy('dias')
    ->get();
    //  dd($array);
       
        $total = [];        
    foreach ($array as $key => $qs) {
        // dd($qs->dias);
        if ( str_replace(" ","",$qs->dias) == "Monday"){
            $total["Lunes"] =$qs->total; 
        }  
        elseif ( str_replace(" ","",$qs->dias) == "Tuesday"){
            $total["Martes"] =$qs->total; 
        }
        elseif (str_replace(" ","",$qs->dias) ==  "Wednesday"){
            $total["Miércoles"] =$qs->total; 
        }
        elseif (str_replace(" ","",$qs->dias) == "Thursday"){
            $total["Jueves"] =$qs->total; 
        }
        elseif (str_replace(" ","",$qs->dias) == "Friday"){
            $total["Viernes"] =$qs->total; 
        }
        elseif (str_replace(" ","",$qs->dias) ==  "Saturday"){
            $total["Sábado"] =$qs->total; 
        }
        else{
            $total["Domingo"] =$qs->total;
        }
                  
    }
    
 

     return view('report.index', compact('total_mes','total_anio'))->with('dias',json_encode($dias,JSON_NUMERIC_CHECK))->with('total',json_encode($total,JSON_NUMERIC_CHECK));
    }

    public function createPDF()
    {
    


            $reportes =  DB::table('ventas')
            ->select(
                DB::raw('sum(total) as total'),
                // DB::raw("DATE_FORMAT(fecha,'%d - %b - %Y') as fecha") //Mysql
                DB::raw("to_char(created_at,'yyyy-mm-dd') as fecha") //pgsql
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

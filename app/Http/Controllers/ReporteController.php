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

        $dias = ['Lunes','Martes', 'Miércoles','Jueves',
                    'Viernes','Sábado','Domingo'];
        // foreach ($year as $key => $value) {
        $total_mes = Pedido::select(
            DB::raw('sum(total_venta) as total')
            
        )
        ->whereMonth('fecha', '=', date('m'))
            // ->groupBy('months')
            ->get();

        $total_anio = DB::table('pedidos')
        ->select(
            DB::raw('sum(total_venta) as total')
          
            )
            ->whereYear('fecha', '=', date('Y'))
        // ->groupBy('mes')
        ->get();

            $array=DB::table('pedidos')
            ->select(DB::raw('SUM(pedidos.total_venta) as total'),
            DB::raw("to_char(pedidos.fecha, 'Day') as dias")
    // DB::raw('DAYNAME(pedidos.fecha) as dias')
    
    )
  ->groupBy('dias')
    ->get();
    // dd($array);
       
        $total = [];        
    foreach ($array as $key => $qs) {
        if ($qs->dias == "Monday"){
            $total["Lunes"] =$qs->total; 
        }  
        elseif ($qs->dias == "Tuesday"){
            $total["Martes"] =$qs->total; 
        }
        elseif ($qs->dias == "Wednesday"){
            $total["Miércoles"] =$qs->total; 
        }
        elseif ($qs->dias == "Thursday"){
            $total["Jueves"] =$qs->total; 
        }
        elseif ($qs->dias == "Friday"){
            $total["Viernes"] =$qs->total; 
        }
        elseif ($qs->dias == "Saturday"){
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
    


            $reportes =  DB::table('pedidos')
            ->select(
                DB::raw('sum(total_venta) as total'),
                // DB::raw("DATE_FORMAT(fecha,'%d - %b - %Y') as fecha") //Mysql
                DB::raw("to_char(fecha,'yyyy-mm-dd') as fecha") //pgsql
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

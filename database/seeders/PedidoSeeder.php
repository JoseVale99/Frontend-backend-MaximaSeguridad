<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;

class PedidoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $pedido = new Pedido();

        $pedido->id = 1;
        $pedido->id_cliente = 3;
        $pedido->nombre = "";
        $pedido->total_venta = 3612;
        $pedido->productos = "4 CABLE SIAMES";
        $pedido->direccion = "Calle Emiliano Zapata #6";
        $pedido->telefono = "9514254678";
        $pedido->fecha = "2021-07-01";

        $pedido->save();
        
        $pedido2 = new Pedido();

        $pedido2->id = 2;
        $pedido2->id_cliente = 4;
        $pedido2->nombre = "";
        $pedido2->total_venta = 8645;
        $pedido2->productos = "10 DVR";
        $pedido2->direccion = "Calle 5 de mayo s/n";
        $pedido2->telefono = "9516457896";
        $pedido2->fecha = "2021-07-02";

        $pedido2->save();
        
        $pedido3 = new Pedido();

        $pedido3->id = 3;
        $pedido3->id_cliente = 5;
        $pedido3->nombre = "";
        $pedido3->total_venta = 13452;
        $pedido3->productos = "CAMARA  DE SEGURIDAD";
        $pedido3->direccion = "Calle Porfirio Diaz #50";
        $pedido3->telefono = "9512346523";
        $pedido3->fecha = "2021-07-03";

        $pedido3->save();
        
        $pedido4 = new Pedido();

        $pedido4->id = 4;
        $pedido4->id_cliente = 6;
        $pedido4->nombre = "";
        $pedido4->total_venta = 2013;
        $pedido4->productos = "MINI CAMARA";
        $pedido4->direccion = "Calle Valerius #986";
        $pedido4->telefono = "9514623569";
        $pedido4->fecha = "2021-07-04";

        $pedido4->save();
        
        $pedido5 = new Pedido();

        $pedido5->id = 5;
        $pedido5->id_cliente = 7;
        $pedido5->nombre = "";
        $pedido5->total_venta = 14563;
        $pedido5->productos = "CAMARA DE SEGURIDAD";
        $pedido5->direccion = "Calle las flores #245";
        $pedido5->telefono = "9514562345";
        $pedido5->fecha = "2021-07-05";

        $pedido5->save();
        
        $pedido6 = new Pedido();

        $pedido6->id = 6;
        $pedido6->id_cliente = 8;
        $pedido6->nombre = "";
        $pedido6->total_venta = 35645;
        $pedido6->productos = "10 CAMARA DE SEGURIDAD";
        $pedido6->direccion = "Calle Victoria #895";
        $pedido6->telefono = "9514567895";
        $pedido6->fecha = "2021-07-06";

        $pedido6->save();
        
        $pedido7 = new Pedido();

        $pedido7->id = 7;
        $pedido7->id_cliente = 9;
        $pedido7->nombre = "";
        $pedido7->total_venta = 25465;
        $pedido7->productos = "5 MINI CAMARA";
        $pedido7->direccion = "Calle Abasolo #3";
        $pedido7->telefono = "9514523564";
        $pedido7->fecha = "2021-07-07";

        $pedido7->save();
        
        $pedido8 = new Pedido();

        $pedido8->id = 8;
        $pedido8->id_cliente = 10;
        $pedido8->nombre = "";
        $pedido8->total_venta = 14263;
        $pedido8->productos = "8 CAMARA ESPIA";
        $pedido8->direccion = "Calle Matadamas #253";
        $pedido8->telefono = "9514523142";
        $pedido8->fecha = "2021-07-08";

        $pedido8->save();
    }
}
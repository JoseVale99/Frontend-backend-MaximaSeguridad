<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $producto = new Producto();

        $producto->id = 12301451;
        $producto->nombre = "MINI CAMARA";
        $producto->descripcion = "CAMARA COLOR NEGRO CON VISION NOCTURNA CON 2MP 1080P, WIFI INALÁMBRIC 110 GRADOS, 1 PIEZA";
        $producto->modelo = "PB401";
        $producto->tipo = "IP";
        $producto->precio_c = 280.00;
        $producto->precio_v = 346.00;
        $producto->stock = 98;
       

        $producto->save();

        $producto2 = new Producto();

        $producto2->id = 12301452;
        $producto2->nombre = "CAMARA DE SEGURIDAD";
        $producto2->descripcion = "CAMARA 2NFL COLOR BLANCO BULLET 1080P 2MEGAPIXELES 93 GRADOS HDCVI VISION NOCTURNA LEDS IR DAHUA COOPER, CON WIFI, PARA INTERIOR/EXTERIOR";
        $producto2->modelo = "HFW1200TA28";
        $producto2->tipo = "BULLET";
        $producto2->precio_c = 490;
        $producto2->precio_v = 600;
        $producto2->stock = 69;
       

        $producto2->save();

        $producto3 = new Producto();

        $producto3->id = 12301453;
        $producto3->nombre = "CAMARA  DE SEGURIDAD";
        $producto3->descripcion = "CAMARA DAHUA DE SEGURIDAD WIFI HD 1080P C/CON ALARMAA IP, VISIÓN NOCTURNA, 360 GRADOS, COLOR BLANCO,PARA INTERIOR/EXTERIOR";
        $producto3->modelo = "Yi Dome X";
        $producto3->tipo = "IP";
        $producto3->precio_c = 840;
        $producto3->precio_v = 952;
        $producto3->stock = 82;
       

        $producto3->save();


        $producto4 = new Producto();

        $producto4->id = 12301454;
        $producto4->nombre = "CAMARA  DE SEGURIDAD";
        $producto4->descripcion = "CAMARA SMARTLAB DE SEGURIDAD WIFI CON VISION NOCTURNA, FULL HD 1080P LENTE GRAN ANGULAR DE 110 GRADOS PARA INTERIORES";
        $producto4->modelo = "SMARTCAM";
        $producto4->tipo = "SEGURIDAD";
        $producto4->precio_c = 480;
        $producto4->precio_v = 590;
        $producto4->stock = 89;
        

        $producto4->save();

        $producto5 = new Producto();

        $producto5->id = 12301455;
        $producto5->nombre = "CAMARA ESPIA";
        $producto5->descripcion = "CAMARA IP ESPIA WIFI ALARMA APP CASA HD V380 APP ESPAÑOL,  HD 720P, CONTROLES PAN / TILT: GIRO: 355 GRADOS, INCLINACIÓN: 90 GRADOS, PARA INTERIORES";
        $producto5->modelo = "ONVIF";
        $producto5->tipo = "IP";
        $producto5->precio_c = 420;
        $producto5->precio_v = 650;
        $producto5->stock = 78;
        

        $producto5->save();

        $producto6 = new Producto();

        $producto6->id = 12301456;
        $producto6->nombre = "CAMARA DE SEGURIDAD";
        $producto6->descripcion = "CAMARA DE SEGURIDAD LIANGYUAN, WIFI EXTERIOR AUTOSEGUIMIENTO 1080P HD CONEXIÓN INALAMBRICA, ROTACIÓN DE 270 GRADOS, PARA INTERIORES/EXTERIORES";
        $producto6->modelo = "DOMO";
        $producto6->tipo = "IP66";
        $producto6->precio_c = 1000;
        $producto6->precio_v = 1200;
        $producto6->stock = 75;
        

        $producto6->save();

        $producto7 = new Producto();

        $producto7->id = 12301457;
        $producto7->nombre = "CAMARA DE SEGURIDAD";
        $producto7->descripcion = "CÁMARA DE SEGURIDAD LIANGYUAN, WIFI EXTERIOR DE CON ALARMA 1080P 38LED, CONTROLES PAN / TILT: GIRO: 355 GRADOS, INCLINACIÓN: 90 GRADOS, PARA INTERIORES/EXTERIORES";
        $producto7->modelo = "Foscam Tow";
        $producto7->tipo = "IP67";
        $producto7->precio_c = 800;
        $producto7->precio_v = 1000;
        $producto7->stock = 86;
        

        $producto7->save();

        $producto8 = new Producto();

        $producto8->id = 12301458;
        $producto8->nombre = "CAMARA";
        $producto8->descripcion = "CAMARA IP MILESING CON VISION NOCTURNA 1080P, AMBIENTE DE USO: INTERIOR Y EXTERIOR, GIRO DE 360 GRADOS, PARA EXTERIORES.";
        $producto8->modelo = "DCS-8515LH";
        $producto8->tipo = "IP67";
        $producto8->precio_c = 1500;
        $producto8->precio_v = 1700;
        $producto8->stock = 96;
       

        $producto8->save();

        $producto9 = new Producto();

        $producto9->id = 12301459;
        $producto9->nombre = "DVR";
        $producto9->descripcion = "DAHUA COOPER XVR1A04 DVR 4 CANALES HDCVI PENTAHIBRIDO 1080P LITE /H264 1CH IP ADICIONAL SATA HASTA 6TB SMART AUDIO (NO INCLUYE DISCO DURO)";
        $producto9->modelo = "XVR1A04";
        $producto9->tipo = "8 CANALES";
        $producto9->precio_c = 700;
        $producto9->precio_v = 950;
        $producto9->stock = 75;
       

        $producto9->save();

        $producto10 = new Producto();

        $producto10->id = 12301460;
        $producto10->nombre = "DVR";
        $producto10->descripcion = "DVR-EPCOM 8 CANALES 1080P LITE / 8 CANALES TURBOHD + 2 CANALES IP / 1 BAHIA DE DISCO DURO / H.264+ / 1 CANAL DE AUDIO / SALIDA DE VÍDEO FULL HD";
        $producto10->modelo = "S8-TURBO-L";
        $producto10->tipo = "8 CANALES";
        $producto10->precio_c = 1080;
        $producto10->precio_v = 2000;
        $producto10->stock = 81;
       

        $producto10->save();

        $producto11 = new Producto();

        $producto11->id = 12301461;
        $producto11->nombre = "DVR";
        $producto11->descripcion = "DAHUA DVR 4 CANALES HDMI ,1 DISCO DURO, MAX. 6TB XVR5104HE (NO INCLUYE DISCO DURO)";
        $producto11->modelo = "XVR5104HE-X1";
        $producto11->tipo = "4 CANALES";
        $producto11->precio_c = 700;
        $producto11->precio_v = 950;
        $producto11->stock = 83;
        

        $producto11->save();

        $producto12 = new Producto();

        $producto12->id = 12301462;
        $producto12->nombre = "DVR";
        $producto12->descripcion = "KIT DE GRABACION DAHUA XVR4104CNX1KIT 4CH 1080P HDD DISCO DURO DE 500GB";
        $producto12->modelo = "DH-XVR1A04";
        $producto12->tipo = "4 CANALES";
        $producto12->precio_c = 850;
        $producto12->precio_v = 1000;
        $producto12->stock = 74;
      

        $producto12->save();

        $producto13 = new Producto();

        $producto13->id = 12301463;
        $producto13->nombre = "DVR";
        $producto13->descripcion = "KIT DE GRABACION DAHUA XVR4104CNX1KIT 4CH 1080P HDD DISCO DURO DE 6TB";
        $producto13->modelo = "LC-125";
        $producto13->tipo = "8 CANALES";
        $producto13->precio_c = 1200;
        $producto13->precio_v = 1500;
        $producto13->stock = 99;
        

        $producto13->save();

        $producto14 = new Producto();

        $producto14->id = 12301464;
        $producto14->nombre = "DVR";
        $producto14->descripcion = "DAHUA COOPER XVR1A08 - DVR 8 CANALES HDCVI PENTAHIBRIDO 1080, SOPORTA 5 TECNOLOGIAS DIFERENTES: HDCVI /AHD/TVI/CVBS/IP. (NO INCLUYE DISCO DURO)";
        $producto14->modelo = "XVR1A08";
        $producto14->tipo = "8 CANALES";
        $producto14->precio_c = 750;
        $producto14->precio_v = 999;
        $producto14->stock = 159;
       

        $producto14->save();

        $producto15 = new Producto();

        $producto15->id = 12301465;
        $producto15->nombre = "DVR";
        $producto15->descripcion = "DVR HIKVISION 4 CANALES DVR 1080P LITE 4 CANALES TURBOHD, TECNOLOGIA TURBOHD 1080P LITE VER. 3.0. (NO INCLUYE DISCO DURO)";
        $producto15->modelo = "DS-7104HGHI-F1(S)";
        $producto15->tipo = "4 CANALES";
        $producto15->precio_c = 770;
        $producto15->precio_v = 990;
        $producto15->stock = 127;
       

        $producto15->save();

        $producto16 = new Producto();

        $producto16->id = 12301466;
        $producto16->nombre = "DVR";
        $producto16->descripcion = "DVR EPCOM 16 CANALES +2IP PENTAHIBRIDO 3 M.P. EV4016TURBO, VERSION 4.0, PERMITE APAGAR CANALES ANALOGICOS TURBOHD Y PODER COLOCAR CAMARAS IP EN TODOS SUS CANALES.  (NO INCLUYE DISCO DURO)";
        $producto16->modelo = "ZOSI";
        $producto16->tipo = "16 CANALES";
        $producto16->precio_c = 1700;
        $producto16->precio_v = 2000;
        $producto16->stock = 366;
        $producto16->save();

        $producto17 = new Producto();
        $producto17->id = 12301467;
        $producto17->nombre = "DVR";
        $producto17->descripcion = "DVR 1080P LITE DE 16 CANALES TURBOHD + 2 CANALES IP, 1 BAHIA DE DISCO DURO, COMPRESION H.264+, 1 CANAL DE AUDIO Y SALIDA DE VIDEO FULL HD (NO INCLUYE DISCO DURO)";
        $producto17->modelo = "S16 TURBO";
        $producto17->tipo = "16 CANALES";
        $producto17->precio_c = 1500;
        $producto17->precio_v = 1700;
        $producto17->stock = 183;
        

        $producto17->save();

        $producto18 = new Producto();
        $producto18->id = 12301468;
        $producto18->nombre = "CABLE SIAMES";
        $producto18->descripcion = "CABLE SIAMES 10 METROS PARA CAMARAS SEGURIDAD CCTV BNC VIDEO, CONECTORES BNC MACHO, CON CONECTORES DE ENERGIA: 1 MACHO Y 1 HEMBRA, PARA INTERIORES/EXTERIORES','CCTV BNC VIDEO";
        $producto18->modelo = "CCTV BNC VIDEO";
        $producto18->tipo = "P/TRANSMISION DE VIDEO";
        $producto18->precio_c = 150;
        $producto18->precio_v = 350;
        $producto18->stock = 180;
        

        $producto18->save();

        $producto19 = new Producto();
        $producto19->id = 12301469;
        $producto19->nombre = "CABLE SIAMES";
        $producto19->descripcion = "CABLE SIAMES 20 METROS PARA CAMARAS SEGURIDAD CCTV BNC VIDEO, CONECTORES BNC MACHO, CON CONECTORES DE ENERGIA: 1 MACHO Y 1 HEMBRA, PARA INTERIORES/EXTERIORES";
        $producto19->modelo = "LC-127";
        $producto19->tipo = "P/TRANSMISION DE VIDEO";
        $producto19->precio_c = 200;
        $producto19->precio_v = 500;
        $producto19->stock = 190;
       

        $producto19->save();

        $producto20 = new Producto();

        $producto20->id = 12301470;
        $producto20->nombre = "CABLE SIAMES";
        $producto20->descripcion = "CABLE SIAMES 30 METROS PARA CAMARAS SEGURIDAD CCTV BNC VIDEO, CONECTORES BNC MACHO, CON CONECTORES DE ENERGIA: 1 MACHO Y 1 HEMBRA, PARA INTERIORES/EXTERIORES.";
        $producto20->modelo = "CCTVFG BNC VIDEO";
        $producto20->tipo = "P/TRANSMISION DE VIDEO";
        $producto20->precio_c = 250;
        $producto20->precio_v = 600;
        $producto20->stock = 193;
       

        $producto20->save();

        $producto21 = new Producto();

        $producto21->id = 12301471;
        $producto21->nombre = "CABLE SIAMES";
        $producto21->descripcion = "CABLE SIAMES 50 METROS PARA CAMARAS SEGURIDAD CCTV BNC VIDEO, CONECTORES BNC MACHO, CON CONECTORES DE ENERGIA: 1 MACHO Y 1 HEMBRA, PARA INTERIORES/EXTERIORES.";
        $producto21->modelo = "CTVZ BNC VIDEO";
        $producto21->tipo = "P/TRANSMISION DE VIDEO";
        $producto21->precio_c = 350;
        $producto21->precio_v = 700;
        $producto21->stock = 174;
        $producto21->save();

        $producto22 = new Producto();
        $producto22->id = 12301472;
        $producto22->nombre = "BALUNS TRANSCEPTORES";
        $producto22->descripcion = "4 PARES BALUNS TRANSCEPTORES HD ENERGIA CCTV UTP VIDEO PUSH, COMPATIBLES CON CÁMARAS DE SEGURIDAD CON RESOLUCIÓN DE 960H, 720P, 1080P Y 4MPX, PARA INTERIORES/EXTERIORES";
        $producto22->modelo = "CCTV UTP";
        $producto22->tipo = "CCTV UTP VIDEO PUSH";
        $producto22->precio_c = 100;
        $producto22->precio_v = 230;
        $producto22->stock = 119;
        

        $producto22->save();

    }
}
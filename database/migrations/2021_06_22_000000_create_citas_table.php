<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */



    public function up()
    {


        // usuarios
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('photo')->default('default.svg');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
           
            $table->rememberToken();
            $table->timestamps();
        });

      

        // productos
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(false); 
            $table->text('descripcion');
            $table->string('modelo')->unique();
            $table ->string('tipo');
            $table->float('precio_c')->nullable(false);
            $table->float('precio_v')->nullable(false);
            $table-> integer('stock');   
            $table->string('imagen')->nullable();

            // $table-> string('');
            // $table -> string('adress');
            // $table-> integer('cart_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
             $table->softDeletes();
        });

        //  
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
        // Recuperar passwords
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        


        // pedidos 

        Schema::create('pedidos', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->String('nombre');
            $table->integer('total_venta');
            $table->text('productos');
            $table->string('direccion');
            $table->String('telefono');

            $table->date('fecha');
            $table->foreign('id_cliente')
            ->references('id')->on('users') 
            ->onDelete('cascade');

            // $table->rememberToken();
            // $table->timestamps();
            $table->softDeletes();
         } );



        // citas
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('id_c')->constrained('users');
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->string('nombre')->nullable(false); 
            $table->String('telefono');
            $table->text('direccion');
            $table->text('referencias');
            $table->string('entidad');
            $table->string('tipo_atencion');
            $table->date('fecha');
            $table->text('descripcion');

            $table->foreign('id_cliente')
            ->references('id')->on('users') 
            ->onDelete('cascade');

            // $table->rememberToken();
            // $table->timestamps();
             $table->softDeletes();


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

       
        Schema::dropIfExists('users');
        
        Schema::dropIfExists('product');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('citas');
        Schema::dropIfExists('pedidos');
    }
}

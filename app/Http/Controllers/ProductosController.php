<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Storage;
// clase session para mandar alertas

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 

    public function __construct(){
        $this->middleware('can:productos.index');
    }
    /* retorna la vista inventario, esta mostrando una
    tabla de productos y paginacion, asi mismo haciendo
    busquedas de productos por tipo.
     */
    
    
    public function index(Request $request)
    {
        $buscar = $request->get('buscarpor');

        $tipo = $request->get('type');
        $variablesurl = $request->all();
        $productos = Producto::buscarpor($tipo,Str::upper($buscar))->paginate(5)->appends($variablesurl);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  retorna la vista Agregar productos
    public function create()
    {
        return view('productos.productos_add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /* Esta función crear un nuevo producto,
    una vez creado nos redirecciona a la misma vita de crear un producto
    con un mensaje. Asi mismo esto haciendolo N veces.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|regex:/^[\pL\s\-]+$/u', // regex solo letras
                'descripcion' => 'required|regex:/[\pL\s\-"+0-9]+.$/u', // regex Solo: incluye algunos carcateres
                'modelo' => 'required|unique:product',
                'tipo' => 'required',
                'precio_c' => 'required|numeric',
                'precio_v' => 'required|numeric',
                'stock' => 'required|numeric',
                'imagen' => 'required|image|max:2048'
            ]
        );
        Session::flash('message_save', '¡Producto guardado con éxito!');

        $producto = new Producto($request->input());
        $producto->nombre = Str::upper($request->input('nombre'));
        $producto->descripcion = Str::upper($request->input('descripcion'));
        $producto->modelo = Str::upper($request->input('modelo'));
        $producto->tipo = Str::upper($request->input('tipo'));
        
        $name_camera= $producto->modelo;
        $url_camera = $request->file('imagen')->storeOnCloudinaryAs('camaras',$name_camera);
        $producto-> imagen =$url_camera->getPath();
      
        

        $producto->saveOrFail();
        return redirect()->route("productos.create");
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $product
     * @return \Illuminate\Http\Response
     */

    // Retorna la vista Mostrar Productos.
    public function show(Producto $producto)
    {

        
        
        if($producto->id == null){
          
            return view('errors.404');
        }

        return view('productos.productos_show', ["producto" => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto $product
     * @return \Illuminate\Http\Response
     */

    /*
    Retorna la vista Editar producto
     */
    public function edit(Producto $producto)
    {

        return view('productos.productos_edit', ["producto" => $producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $product
     * @return \Illuminate\Http\Response
     */

    /*  Esta funcion nos sirve para modificar un producto
    e inclusive para mostrar el producto, una vez modificado el
    producto se muestra un mensaje y redirecciona al usuario a la vista
    de inventario.

     */
    public function update(Request $request, Producto $producto)
    {


        $request->validate(
            [
                'nombre' => 'required|regex:/^[\pL\s\-]+$/u', // regex solo letras
                'descripcion' => 'required|regex:/[\pL\s\-."+0-9]+$/u', // regex Solo: incluye algunos carcateres
                'modelo' => 'unique:product',
                'tipo' => 'required',
                'precio_c' => 'required|numeric',
                'precio_v' => 'required|numeric',
                'stock' => 'required|numeric'
            ]);
       
            Session::flash('message_save', '¡Producto actualizado con éxtio!');
        $producto->fill($request->input());
        $producto->nombre = Str::upper($request->input('nombre'));
        // $producto->modelo = Str::upper($request->input('modelo'));
        $producto->tipo = Str::upper($request->input('tipo'));
        $producto->descripcion = Str::upper($request->input('descripcion'));

        if ($request->check=='on'){
            
        $request->validate(
            [
                'imagen' => 'required|image|max:2048'
            ]);
            $name_camera= $producto->modelo;
            
            $url_camera = $request->file('imagen')->storeOnCloudinaryAs(
                'camaras',$name_camera);
            $producto-> imagen =$url_camera->getPath();
       
            
        }
        $producto->saveOrFail();
       
        return redirect()->route("productos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */

    /* Esta función elimina un producto (pero no de la bdd)
    por cuestiones de seguiridad , una vez eliminado el producto se
    dirige a la vista principal de inventarios.
     */
    public function destroy(Producto $producto)
    {
        Session::flash('message_delete', '¡Producto borrado con éxito!');
        $producto->delete();
        return redirect()->route("productos.index");
    }
}

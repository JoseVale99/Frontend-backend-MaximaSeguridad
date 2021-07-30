<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Cart;
use Illuminate\Http\Request;
use Session;
use App\Models\Pedido;
use App\Models\User;
use Stripe\Stripe;
use Stripe\Charge;
use Carbon\Carbon;
use PDF;
use DB;

class CarritoController extends Controller
{


    // muestra los productos con n
    public function index(Request $request)
    {
        $buscar = $request->get('buscarpor');
        $tipo = $request->get('type');
        $variablesurl = $request->all();
        $productos = Producto::buscarpor($tipo, $buscar)->paginate(6)->appends($variablesurl);
        return view('Cart.Carrito', compact('productos'));
    }
    public function add(Request $request)
    {
        $producto = Producto::find($request->producto_id);
        //    dd($request->producto_id);

        if ($request->input('cantidad') != "") {



            Cart::add(
                $producto->id,
                $producto->nombre,
                $producto->precio_v,
                $request->input('cantidad'),
                // cantidad de producto
                array('imagen' => $producto->imagen)
            );
            Session::flash('message_save', "¡ $producto->nombre se ha agregado al carrito!");

            return back();
        } else {
            Session::flash('alert', "tiene que agregar al menos un producto al carrito");
            return back();
        }
    }

    public function Cart()
    {
        // $params =[
        //     'title' => 'Shopping Cart Checkout'
        // ];


        return view('Cart.checkout'); //->with($params);
    }

    public function removeitem(Request $request, Producto $producto)
    {

        // $producto = Producto::where('id',$request->id)->firstOrFail();
        Cart::remove(
            [
                'id' => $request->id,
            ]
        );
        Session::flash('message_delete', " ¡$producto->nombre se ha borrado del carrito!");
        return back();
    }
    public function clear(Request $request)
    {

        //     $userId = $request->get('_token'); // Aqui va la id o token para identificar a quien pertenece el carrito
        // ($userId)-clear();
        Cart::clear();
        Session::flash('message_delete', " ¡se a borrado el carrito correctamente!");

        return back();
    }
    public function stripe()
    {
        return view('Cart.stripe');
    }

    public function stripePost(Request $request)
    {



        $this->validate($request, [
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'card_no' => ['required','regex:/^(3[47][0-9]{13}|(6541|6556)[0-9]{12}|389[0-9]{11}|3(?:0[0-5]|[68][0-9])[0-9]{11}|65[4-9][0-9]{13}|64[4-9][0-9]{13}|6011[0-9]{12}|(622(?:12[6-9]|1[3-9][0-9]|[2-8][0-9][0-9]|9[01][0-9]|92[0-5])[0-9]{10})|63[7-9][0-9]{13}|(?:2131|1800|35\d{3})\d{11}|9[0-9]{15}|(6304|6706|6709|6771)[0-9]{12,15}|(5018|5020|5038|6304|6759|6761|6763)[0-9]{8,15}|(5[1-5][0-9]{14}|2(22[1-9][0-9]{12}|2[3-9][0-9]{13}|[3-6][0-9]{14}|7[0-1][0-9]{13}|720[0-9]{12}))|(6334|6767)[0-9]{12}|(6334|6767)[0-9]{14}|(6334|6767)[0-9]{15}|(4903|4905|4911|4936|6333|6759)[0-9]{12}|(4903|4905|4911|4936|6333|6759)[0-9]{14}|(4903|4905|4911|4936|6333|6759)[0-9]{15}|564182[0-9]{10}|564182[0-9]{12}|564182[0-9]{13}|633110[0-9]{10}|633110[0-9]{12}|633110[0-9]{13}|(62[0-9]{14,17})|4[0-9]{12}(?:[0-9]{3})?|(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}))$/'],
            'cvv' => 'required|regex:/^[0-9]{3}$/u',
            'telefono' => 'required|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/u',
            'direccion' => 'required|regex:/[\pL\s\-"+0-9]+.$/u',
            'expiry_month' => 'required',
            'expiry_year' => 'required',

        ]);

        $stripe = Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $response = \Stripe\Token::create(array(
                "card" => array(
                    "number"    => $request->input('card_no'),
                    "exp_month" => $request->input('expiry_month'),
                    "exp_year"  => $request->input('expiry_year'),
                    "cvc"       => $request->input('cvv')
                )
            ));
            if (!isset($response['id'])) {
                return redirect()->route('addmoney.paymentstripe');
            }
            $charge = Charge::create([
                'card' => $response['id'],
                'currency' => 'MXN',
                'amount' => 100 * (Cart::getSubTotal() * .9),
                'description' => 'compra de camaras',
            ]);

            if ($charge['status'] == 'succeeded') {
                // alta pedidos
                $producto = new Producto();

                $pedidos = new Pedido($request->all());

                $pedidos->id_cliente = auth()->user()->id;
                $pedidos->nombre = $request->input('nombre');
                $pedidos->total_venta =  (int) (Cart::getSubTotal() * .9);




                $cadena = "";
                foreach (Cart::getContent() as $item) {
                    $producto = Producto::find($item->id);

                    $cadena =  $cadena . "- Cantidad: " . $item->quantity . ",  Nombre: " . $producto->nombre . "\n";


                    $producto->stock = $producto->stock - $item->quantity;

                    $producto->saveOrFail();
                }

                $pedidos->productos = $cadena;
                $pedidos->direccion = $request->input('direccion');
                $pedidos->telefono = $request->input('telefono');
                $pedidos->fecha = Carbon::now();
                $pedidos->saveOrFail();

                Session::flash('compra_sucess', "¡Su compra se realizó con exito!");
                Cart::clear();
                return redirect()->route('cart.invoices');
            } else {
                Session::flash('compra_sucess', "algo salió mal.");
                return redirect()->route('cart.stripe');
            }
        } catch (Exception $e) {
            // return $e->getMessage();
            return back();
            Session::flash('compra_sucess', "algo salió mal.");
        }
    }

    public function invoices(Request $request)
    {

       

        
        if (auth()->user()->id == 2) {
            $invoices =  DB::table('pedidos')->paginate(5);
            return view('Cart.invoices', compact('invoices'));
        } else {          
            $invoices = Pedido::where('id_cliente', '=',auth()->user()->id)->paginate(5);
        
            return view('Cart.invoices', compact('invoices'));
        }
    }

    public function createPDF($id)
    {
        // retreive all records from db
        $pedidos = Pedido::findOrFail($id);

        if (auth()->user()->id == 2) {

            $invoices = DB::table('pedidos')->where('id', '=', $id)
                ->get();

            // share data to view
            view()->share('Cart.invoices-pdf', $invoices);
            $pdf = PDF::loadView('Cart.invoices-pdf', ['invoices' => $invoices]);
        } else {


            $invoices = DB::table('pedidos')->where('id_cliente', '=',auth()->user()->id)
            ->where('id', "=",$id)   
            ->get();

            // share data to view
            view()->share('Cart.invoices-pdf', $invoices);
            $pdf = PDF::loadView('Cart.invoices-pdf', ['invoices' => $invoices]);
        }


        // download PDF file with download method
        return $pdf->download('nota_de_pago.pdf');
    }
}

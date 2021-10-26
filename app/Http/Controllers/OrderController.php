<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;

class OrderController extends Controller
{

    public function index(){

        $orders = Order::query()->where('user_id', auth()->user()->id);

        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders = $orders->get();


        $pendiente = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();
        $recibido = Order::where('status', 2)->where('user_id', auth()->user()->id)->count();
        $enviado = Order::where('status', 3)->where('user_id', auth()->user()->id)->count();
        $entregado = Order::where('status', 4)->where('user_id', auth()->user()->id)->count();
        $anulado = Order::where('status', 5)->where('user_id', auth()->user()->id)->count();


        return view('orders.index', compact('orders', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado'));
    }

    public function show(Order $order)
    {
        $this->authorize('author', $order);

        $items = json_decode($order->content);
        $envio = json_decode($order->envio);

        $efectivo = json_decode($order->efectivo);

       

        return view('orders.show', compact('order', 'items', 'envio', 'efectivo'));
    }

    public function PdfOrder(Order $order)
    {

        $this->authorize('author', $order);

        $items = json_decode($order->content);
        $envio = json_decode($order->envio);

        $fecha = Carbon::now()->format("F j, Y, g:i a");
        
        $datos = compact('fecha', 'order', 'items', 'envio');

        $pdf = PDF::loadView('pdf.factura', $datos);

        return $pdf->stream();
    }


    public function payment(Order $order){

        $this->authorize('author', $order);
        $this->authorize('payment', $order);

        $items = json_decode($order->content);
        $envio = json_decode($order->envio);

       

        return view('orders.payment', compact('order', 'items', 'envio'));
    }

    public function pay(Order $order, Request $request)
    {
        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=APP_USR-8462528962068398-092819-c532ad93fd75b3d6f0f68eeb2882127d-472718708");
        
        $response = json_decode($response); 

        $status = $response->status;

        if ($status == 'pending') {
            $order->efectivo = json_encode($response);
        }

        if ($status == 'approved') {
            $order->status = 2;
         }

        $order->save();

        return redirect()->route('orders.show', $order );
        
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    public function chartUser(Request $request)
    {
        $users = User::all();

        return 
        response(json_encode($users), 200)->header('Content-type', 'text/plain');
    }

    public function chartVentas(Request $request)
    {
        $orders = Order::query()->where('status', '<>', 1);

        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders = $orders->get();


        $pendiente = Order::where('status', 1)->count();
        $recibido = Order::where('status', 2)->count();
        $enviado = Order::where('status', 3)->count();
        $entregado = Order::where('status', 4)->count();
        $anulado = Order::where('status', 5)->count();

        $array = [$pendiente, $recibido, $enviado, $entregado, $anulado];

        return 
        response(json_encode($array), 200)->header('Content-type', 'text/plain');
    }
}

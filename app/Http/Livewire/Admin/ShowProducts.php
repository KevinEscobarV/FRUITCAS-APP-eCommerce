<?php

namespace App\Http\Livewire\Admin;

use App\Models\Fruit;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use Livewire\WithPagination;

class ShowProducts extends Component
{

    use WithPagination;

    public $search;

    // public function chartCat(Request $request)
    // {
    //     $coleccion = Category::all();
    // }

    public function chart(Request $request)
    {

        $order = Order::where('status', '<>', 1)->take(20)->get();

        return 
        response(json_encode($order), 200)->header('Content-type', 'text/plain');
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $activos = DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))->whereNotNull('user_id')->count();

        $vistas = DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))->count();

        $users = User::count();

        $fruits = Fruit::count();

        $productspublic = Product::where('status', 2)->count();

        $productsdraft = Product::where('status', 1)->count();

        $vent = Order::where('status', '<>', 1)->count();

        $orders = Order::where('status', 4)->count();

        $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.admin.show-products', 
        compact('products', 'users', 'orders', 'productspublic', 'productsdraft', 'vistas', 'activos', 'fruits', 'vent'))
        ->layout('layouts.admin');
    }
}

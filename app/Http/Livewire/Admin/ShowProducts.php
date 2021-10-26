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

    public $search, $fruits, $fruit, $total, $unidades, $totalprice = 0, $suma = 0, $fecha, $month = "0";


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

    public function chartProducts(Request $request)
    {
        $products = Product::all();

        return 
        response(json_encode($products), 200)->header('Content-type', 'text/plain');
    }

    public function mount(){
        $this->getProducts();
    }

    public function getProducts(){

        $this->reset('suma');

        if ($this->month == "0") {
            $this->products = Product::all();
            $this->total = Product::count();
            $this->unidades = Product::sum('quantity');
            
        }else{

            $this->products = Product::whereMonth('created_at',"{$this->month}")->get();

            $this->total = Product::whereMonth('created_at',"{$this->month}")->count();
    
            $this->unidades = Product::whereMonth('created_at',"{$this->month}")->sum('quantity');
        }

        foreach ($this->products as $product) {
            $this->suma = $this->suma +  ($product->price * $product->quantity);
        }

        // $this->fecha = Date::create()->locale('es')->format('F/Y');

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->month <> "0") {
            $this->getProducts();
        }

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

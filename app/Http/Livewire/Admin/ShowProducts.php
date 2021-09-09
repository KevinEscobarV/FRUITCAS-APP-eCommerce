<?php

namespace App\Http\Livewire\Admin;

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

        $products = Product::where('status', 2)
                            ->take(10)
                            ->get();

        return 
        response(json_encode($products,), 200)->header('Content-type', 'text/plain');
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

        $productspublic = Product::where('status', 2)->count();

        $productsdraft = Product::where('status', 1)->count();

        $orders = Order::where('status', 4)->count();

        $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.admin.show-products', compact('products', 'users', 'orders', 'productspublic', 'productsdraft', 'vistas', 'activos'))->layout('layouts.admin');
    }
}

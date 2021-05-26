<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Livewire\WithPagination;

class SearchController extends Controller
{

    use WithPagination;

    public function __invoke(Request $request)
    {

        $name = $request->name;

        $products = Product::where('name', 'LIKE' ,'%' . $name . '%')
                                ->where('status', 2)
                                ->paginate(10);

        return view('search', compact('products', 'name'));
    }
}

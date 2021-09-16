<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\City;
use App\Models\Department;
use App\Models\Fruit;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PDFController extends Controller
{
    public function pdfProducts()
    {

        $products = Product::all();

        $fecha = Carbon::now()->format("F j, Y, g:i a");
        
        $datos = compact('products', 'fecha');

        $pdf = PDF::loadView('pdf.productos', $datos);
        return $pdf->stream();

    }

    public function pdfCategories()
    {
        $subcategories = Subcategory::all();
        
        $fecha = Carbon::now()->format("F j, Y, g:i a");
        
        $datos = compact('subcategories', 'fecha');

        $pdf = PDF::loadView('pdf.categorias', $datos);
        return $pdf->stream();
        
    }
    
    public function pdfBrands()
    {
        $brands = Brand::all();
        
        $fecha = Carbon::now()->format("F j, Y, g:i a");
        
        $datos = compact('brands', 'fecha');

        $pdf = PDF::loadView('pdf.terceros', $datos);
        return $pdf->stream();
        
    }

    public function pdflocations()
    {
        $locations = Department::all();

        $cities = City::all();
        
        $fecha = Carbon::now()->format("F j, Y, g:i a");
        
        $datos = compact('locations', 'fecha', 'cities');

        $pdf = PDF::loadView('pdf.ubicaciones', $datos);
        return $pdf->stream();
        
    }

    public function pdfUsers()
    {
        $users = User::all();
        
        $fecha = Carbon::now()->format("F j, Y, g:i a");
        
        $datos = compact('users', 'fecha');

        $pdf = PDF::loadView('pdf.usuarios', $datos);
        return $pdf->stream();
        
    }

    public function pdfRoles()
    {
        $roles = Role::all();

        $permissions = Permission::all();
        
        $fecha = Carbon::now()->format("F j, Y, g:i a");
        
        $datos = compact('roles', 'fecha' ,'permissions');

        $pdf = PDF::loadView('pdf.rolespdf', $datos);
        return $pdf->stream();
        
    }

    public function pdfOrders()
    {
        $orders = Order::all();
        
        $fecha = Carbon::now()->format("F j, Y, g:i a");
        
        $datos = compact('orders', 'fecha');

        $pdf = PDF::loadView('pdf.ordenes', $datos);
        return $pdf->stream();
        
    }
 
    public function pafMateria()
    {
        $fruits = Fruit::all();
        
        $fecha = Carbon::now()->format("F j, Y, g:i a");
        
        $datos = compact('fruits', 'fecha');

        $pdf = PDF::loadView('pdf.materia', $datos);
        return $pdf->stream();
        
    }
}

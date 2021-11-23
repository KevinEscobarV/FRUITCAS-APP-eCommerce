<?php
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\CreateProduct;          
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\ShowProducts;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChartsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\PDFController;
use App\Http\Livewire\Admin\BrandComponent;
use App\Http\Livewire\Admin\CityComponent;
use App\Http\Livewire\Admin\ShowCategory;
use App\Http\Livewire\Admin\DepartmentComponent;
use App\Http\Livewire\Admin\FruitController;
use App\Http\Livewire\Admin\ShowDepartment;

Route::get('/', ShowProducts::class)->name('admin.index');

Route::get('products/create', CreateProduct::class)->name('admin.products.create');

Route::get('products/{product}/edit', EditProduct::class)->name('admin.products.edit');

Route::post('products/{product}/files', [ProductController::class, 'files'])->name('admin.products.files');

Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');

Route::get('categories/{category}', ShowCategory::class)->name('admin.categories.show');

Route::get('brands', BrandComponent::class)->name('admin.brands.index');

Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');

Route::get('orders/{order}',[OrderController::class, 'show'])->name('admin.orders.show');

Route::get('departments', DepartmentComponent::class)->name('admin.departments.index');

Route::get('departments/{department}', ShowDepartment::class)->name('admin.departments.show');

Route::get('cities/{city}', CityComponent::class)->name('admin.cities.show');

Route::get('fruits', FruitController::class)->name('admin.fruits.index');

// GRAFICAS

Route::post('/chart', [ShowProducts::class, 'chart']);

Route::post('/chartProducts', [ShowProducts::class, 'chartProducts']);

Route::post('/chartUser', [ChartsController::class, 'chartUser']);

Route::post('/orders/chartVentas', [ChartsController::class, 'chartVentas']);

Route::post('/fruits/chartFruits', [ChartsController::class, 'chartFruits']);

// REPORTES PDF

Route::get('products/pdf', [PDFController::class, 'pdfProducts'])->name('admin.products.pdf');

Route::get('categorias/pdf', [PDFController::class, 'pdfCategories'])->name('admin.categories.pdf');

Route::get('terceros/pdf', [PDFController::class, 'pdfBrands'])->name('admin.brands.pdf');

Route::get('ubicaciones/pdf', [PDFController::class, 'pdflocations'])->name('admin.ubicaciones.pdf');

Route::get('usuarios/pdf', [PDFController::class, 'pdfUsers'])->name('admin.usuarios.pdf');

Route::get('rolespdf/pdf', [PDFController::class, 'pdfRoles'])->name('admin.rolespdf.pdf');

Route::get('ordenes/pdf', [PDFController::class, 'pdfOrders'])->name('admin.ordenes.pdf');

Route::get('materia/pdf', [PDFController::class, 'pafMateria'])->name('admin.materia.pdf');

Route::get('orders/pdf/{order}', [OrderController::class, 'PdfOrder'])->name('order.factura.pdf');

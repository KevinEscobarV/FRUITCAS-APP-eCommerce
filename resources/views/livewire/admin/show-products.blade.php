<div>
    <x-slot name="header">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
            </svg>
            <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold uppercase">Panel de Administración y Gestión de Productos
            </div>

            @can('products.create')
            <x-button-enlace color="orange" class="ml-auto" target="blank" href="{{ route('admin.products.pdf') }}">
              Generar Reporte de Productos
            </x-button-enlace>
                <x-button-enlace color="teal" class="ml-2" href="{{ route('admin.products.create') }}">
                    Agregar Producto
                </x-button-enlace>
                
            @endcan

        </div>
    </x-slot>
  
      <div class="flex-1 max-h-full p-5 overflow-hidden bg-white rounded-md shadow-md mx-8 mt-6">
      
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                <!-- Users chart card --><a href="{{ route('users.index') }}" class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
                  <div class="flex items-start">
                    <div class="flex flex-col flex-shrink-0">
                      <span class="text-gray-400">Usuarios Registrados</span>
                      <span class="text-lg font-semibold">{{$users}}</span>
                    </div>
                    <div class="relative min-w-0 ml-auto h-14">
                    <span>
                      <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                      </svg>
                    </span>
                    </div>
                  </div>
                  <div>
                    <span class="inline-block px-2 text-sm text-white bg-green-400 rounded">Activos</span>
                    <span>2021</span>
                  </div>
                </a>
    
                <!-- Sessions chart card --><a href="{{ route('admin.orders.index') }}" class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
                  <div class="flex items-start">
                    <div class="flex flex-col flex-shrink-0 space-y-2">
                      <span class="text-gray-400">Total Ventas</span>
                      <span class="text-lg font-semibold">{{$orders}}</span>
                    </div>
                    <div class="relative min-w-0 ml-auto h-14">
                      <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                      </span>
                    </div>
                  </div>
                  <div>
                    <span class="inline-block px-2 text-sm text-white bg-green-400 rounded">Realizadas</span>
                   
                  </div>
                </a>
    
                <!-- Vists chart card --><div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
                  <div class="flex items-start">
                    <div class="flex flex-col flex-shrink-0 space-y-2">
                      <span class="text-gray-400">Vistas</span>
                      <span class="text-lg font-semibold">{{$vistas}}</span>
                    </div>
                    <div class="relative min-w-0 ml-auto h-14">
                      <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                      </span>
                    </div>
                  </div>
                  <div>
                    <span class="inline-block px-2 text-sm text-white bg-green-400 rounded">Vistas</span>
                    <span>Ultimas horas</span>
                  </div>
                </div>
    
                <!-- Articles chart card --><div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
                  <div class="flex items-start">
                    <div class="flex flex-col flex-shrink-0 space-y-2">
                      <span class="text-gray-400">Productos Registrados</span>
                      <span class="text-lg font-semibold">{{$productspublic}}</span>
                    </div>
                    <div class="relative min-w-0 ml-auto h-14">
                      <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                        </svg>
                      </span>
                    </div>
                  </div>
                  <div>
                    <span class="inline-block px-2 text-sm text-white bg-green-400 rounded">Publicados</span>
                    <span class="inline-block px-2 text-sm text-white bg-gray-400 rounded">Productos en borrador | {{$productsdraft}}</span>
                  </div>
                </div>
        </div>

        <div class="grid grid-cols-1 gap-6 mt-6 lg:grid-cols-2 xl:grid-cols-4">
                <!-- Import data card -->
                <div>
                   

                    <div class="p-4 mb-6 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
                        <div class="flex items-start">
                          <div class="flex flex-col flex-shrink-0 space-y-2">
                            <span class="text-gray-400">Usuarios en Linea</span>
                            <span class="text-lg font-semibold">{{$activos}}</span>
                          </div>
                          <div class="relative min-w-0 ml-auto h-14"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="usersChart" width="273" height="56" style="display: block; width: 273px; height: 56px;" class="chartjs-render-monitor"></canvas>
                          </div>
                        </div>
                        <div>
                          <span class="inline-block px-2 text-sm text-white bg-green-400 rounded">Activos</span>
                          <span>2021</span>
                        </div>
                    </div>

                      <div class="p-4 mb-6 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
                        <!-- Card header -->
                        <div class="flex items-center justify-between px-4 py-2 border-b">
                          <h5 class="font-semibold">Datos Importantes</h5>
                
                        </div>
                        <p class="px-4 py-6 text-gray-600">Aqui tendras un control total del manejo de los productos que ofrece la 
                          empresa Fruitcas.</p>
                        <p class="px-4 py-6 text-gray-600">Recuerda subir almenos 4 imagenes por producto, es importante detallar muy bien lo que se quiere vender.</p>
                            
                      </div>

                </div>
                
    
                <!-- Monthly chart card -->
                <div class="border rounded-lg shadow-sm xl:col-span-3">
                  <!-- Card header -->
                  <div class="flex items-center justify-between px-4 py-2 border-b">
                    <h5 class="font-semibold">Ventas Mensuales</h5>
                    <!-- Dots button -->
                    
                  </div>
                  <!-- Card content -->
                  <div class="flex items-center p-4 space-x-4">
                    <span class="text-3xl font-medium">45%</span>
                    <span class="flex items-center px-2 space-x-2 text-sm text-green-800 bg-green-100 rounded">
                      <span>
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                          <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"></path>
                        </svg>
                      </span>
                      <span>39.2%</span>
                    </span>
                  </div>
                  <!-- Chart -->
                  <div class="relative min-w-0 p-4 h-80"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="updatingMonthlyChart" width="1297" height="288" style="display: block; width: 1297px; height: 288px;" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
        </div>

      </div>  

      {{-- <div class="flex-1 max-h-full p-5 overflow-hidden bg-white rounded-md shadow-md mx-8 mt-6">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
          <div class="border rounded-lg shadow-sm xl:col-span-2">
            <canvas id="myChart" width="400" height="400"></canvas>
          </div>
          <div class="border rounded-lg shadow-sm xl:col-span-2">
            <canvas id="chartventas" width="400" height="400"></canvas>
          </div>
        </div>
  
      </div> --}}


      <div class="py-6">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-table-responsive>

                    <div class="px-6 py-4">
                        <x-jet-input type="text" wire:model="search" class="w-full"
                            placeholder="Ingrese el nombre del producto que quiere buscar" />

                    </div>

                    @if ($products->count())
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Categoria
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Estado
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Precio
                                    </th>
                                    @can('products.edit')
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Editar</span>
                                        </th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($products as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    @if ($product->images->count())
                                                        <img class="h-10 w-10 rounded-full object-cover"
                                                            src="{{ Storage::url($product->images->first()->url) }}"
                                                            alt="">
                                                    @else
                                                        <img class="h-10 w-10 rounded-full object-cover"
                                                            src="{{ asset('img/default-product.png') }}" alt="">
                                                    @endif
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $product->name }}
                                                    </div>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {{ $product->subcategory->category->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">{{ $product->subcategory->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">

                                            @switch($product->status)
                                                @case(1)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                                        Borrador
                                                    </span>
                                                @break
                                                @case(2)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Publicado
                                                    </span>
                                                @break
                                                @default

                                            @endswitch


                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            $ {{ number_format($product->price) }} COP
                                        </td>
                                        @can('products.edit')
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('admin.products.edit', $product) }}"
                                                    class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach


                                <!-- More people... -->
                            </tbody>
                        </table>
                    @else
                        <div class="px-6 py-4">
                            No se encuentra ningún resultado.
                        </div>
                    @endif


                    @if ($products->hasPages())

                        <div class="px-6 py-4">
                            {{ $products->links() }}
                        </div>

                    @endif

                </x-table-responsive>

          </div>
        </div>
      </div>

</div>

@push('script')    

<script>
    const setup = () => {
      return {
        loading: true,
        isSidebarOpen: false,
        toggleSidbarMenu() {
          this.isSidebarOpen = !this.isSidebarOpen
        },
        isSettingsPanelOpen: false,
        isSearchBoxOpen: false,
      }
    }

    var nombres=[];
    var valores=[];

    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: 'admin/chart',
      method: 'POST',
    }).done(function(respuesta){

        var arreglo = JSON.parse(respuesta);

        for (let x = 0; x < arreglo.length; x++) {
          nombres.push(arreglo[x].name);
          valores.push(arreglo[x].quantity);
        }
        generarGraficaBig();
    })
  </script>
@endpush
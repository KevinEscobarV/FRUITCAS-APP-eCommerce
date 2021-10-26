<x-slot name="header">
    <div class="flex items-center">
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
            <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6">
            </path>
        </svg>
        <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold">Administración de Materia Prima
        </div>
        <x-button-enlace color="orange" class="ml-auto" target="blank" href="{{ route('admin.materia.pdf') }}">
            Generar Reporte
        </x-button-enlace>
    </div>
</x-slot>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    {{-- Formaliio crear --}}

    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Agregar nueva materia prima
        </x-slot>

        <x-slot name="description">
            En esta sección podrá inventariar la materia prima que entra en la empresa.
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input type="text" wire:model="createForm.name" class="w-full" />
                <x-jet-input-error for="createForm.name" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Descripción
                </x-jet-label>

                <x-jet-input type="text" wire:model="createForm.description" class="w-full" />
                <x-jet-input-error for="createForm.description" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Valor
                </x-jet-label>

                <x-jet-input type="number" wire:model="createForm.price" class="w-full" />
                <x-jet-input-error for="createForm.price" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Cantidad
                </x-jet-label>

                <x-jet-input type="number" wire:model="createForm.quantity" class="w-full" />
                <x-jet-input-error for="createForm.quantity" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>


    <div wire:ignore class="bg-gray-300 shadow rounded-lg px-6 py-6 my-12 text-gray-700">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
            <div class="border rounded-lg shadow-sm xl:col-span-2 p-4 bg-white">
              <canvas id="ChartBarFruits" width="400" height="400"></canvas>
            </div>
            <div class="border rounded-lg shadow-sm xl:col-span-2 p-4 bg-white">
              <canvas id="ChartPieFruits" width="400" height="400"></canvas>
            </div>
          </div>
    </div>

    <div class="bg-blue-100 shadow rounded-lg px-6 py-6 my-12 text-gray-700">
        <div class="flex">
            {{-- <x-jet-input type="month" class="w-full" />  --}}         
                <select wire:model="search"

                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="" selected disabled>Seleccione un Mes</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>

        </div>
        <div class="grid grid-cols-4 gap-4 my-6">
            <div class="bg-green-400 rounded-md p-8">
                <p class="text-lg text-white text-center">Productos Entrada</p>
                <p class="text-2xl font-bold text-white text-center"><i class="fas fa-apple-alt mr-2 mt-3"></i>{{$total}}</p>
            </div>
            <div class="bg-purple-500 rounded-md p-8">
                <p class="text-lg text-white text-center">Unidades en Inventario</p>
                <p class="text-2xl font-bold text-white text-center"><i class="fas fa-truck-loading mr-2 mt-3"></i>{{$unidades}}</p>
            </div>
            <div class="bg-blue-400 rounded-md p-8">
                <p class="text-lg text-white text-center">Valor Total en Inventario</p>
                <p class="text-2xl font-bold text-white text-center mt-3">$ {{ number_format($suma) }} COP</p>
            </div>
            <div class="bg-yellow-400 rounded-md p-8">
                <p class="text-lg text-white text-center">Fecha del Inventario</p>
                <p class="text-2xl font-bold text-white text-center capitalize"><i class="far fa-calendar-alt mr-2 mt-3"></i>
                    @if ($search == 0)
                        Todos los meses
                    @else
                        {{$search}} / {{ Date::now()->format('Y')}}
                    @endif
                </p>
            </div>
        </div>
        <div wire:ignore class="border rounded-lg shadow-sm p-4 bg-white">
            <canvas id="ProductsBar" width="600" height="200"></canvas>
          </div>
    </div>



 
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Descripción
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cantidad
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Valor Unitario
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Valor Total
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    % del Total
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Editar</span>
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Eliminar</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($fruits as $fruit)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">
                                                {{ $fruit->name }}
                                            </div>                                     
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $fruit->description }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $fruit->quantity }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            $ {{ number_format($fruit->price) }} COP
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            $ {{ number_format($fruit->price * $fruit->quantity) }} COP
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-lg bg-orange-100 text-orange-800">
                                            % {{ number_format(($fruit->quantity * 100) / $unidades, 2)}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                            wire:click="edit('{{ $fruit->id }}')">Editar</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                        <a class="pl-2 hover:text-red-600 cursor-pointer text-md"
                                            wire:click="$emit('deleteFruit', '{{ $fruit->id }}')"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="bg-gray-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">
                                            TOTAL
                                        </div>
                                </td>
                                <td></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $unidades }}
                                </td>
                                <td></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        $ {{ number_format($suma) }} COP
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-lg bg-orange-100 text-orange-800">
                                        % 100.00
                                    </span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal editar --}}

    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar Materia
        </x-slot>

        <x-slot name="content">
            <div class="mb-6">
                <x-jet-label>
                    Nombre
                </x-jet-label>
                <x-jet-input wire:model="editForm.name" type="text" class="w-full" />
                <x-jet-input-error for="editForm.name" />
            </div>
            <div class="mb-6">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                <x-jet-input wire:model="editForm.description" type="text" class="w-full" />
                <x-jet-input-error for="editForm.description" />
            </div>
            <div class="mb-6">
                <x-jet-label>
                    Valor
                </x-jet-label>
                <x-jet-input wire:model="editForm.price" type="number" class="w-full" />
                <x-jet-input-error for="editForm.price" />
            </div>
            <div class="mb-6">
                <x-jet-label>
                    Cantidad
                </x-jet-label>
                <x-jet-input wire:model="editForm.quantity" type="number" class="w-full" />
                <x-jet-input-error for="editForm.quantity" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>


    @push('script')
        <script>
            Livewire.on('deleteFruit', fruitId => {

                Swal.fire({
                    title: '¿Estas Seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.fruit-controller', 'delete', fruitId)
                        Swal.fire(
                            '¡Eliminado!',
                            'Se ha eliminado correctamente.',
                            'success'
                        )
                    }
                })
            });
        
            var nomFruits=[];
            var cantFruits=[];

            $.ajax({
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            url: 'fruits/chartFruits',
            method: 'POST',
            }).done(function(resFruits){     
                var arreglo = JSON.parse(resFruits);

                for (let x = 0; x < arreglo.length; x++) {
                nomFruits.push(arreglo[x].name);
                cantFruits.push(arreglo[x].quantity);
                }
                generarGraficaFruits();
            });
            </script> 
    @endpush
</div>

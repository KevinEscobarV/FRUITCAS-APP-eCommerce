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


    <div wire:ignore class="bg-white shadow rounded-lg px-12 py-8 my-12 text-gray-700">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
            <div class="border rounded-lg shadow-sm xl:col-span-2 p-4">
              <canvas id="ChartBarFruits" width="400" height="400"></canvas>
            </div>
            <div class="border rounded-lg shadow-sm xl:col-span-2 p-4">
              <canvas id="ChartPieFruits" width="400" height="400"></canvas>
            </div>
          </div>
    </div>


    <!-- This example requires Tailwind CSS v2.0+ -->
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
                                    Valor
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
                                        <div class="flex items-center">


                                            <div class="text-sm text-gray-500">
                                                {{ $fruit->name }}
                                            </div>

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
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                            wire:click="edit('{{ $fruit->id }}')">Editar</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a class="pl-2 hover:text-red-600 cursor-pointer"
                                            wire:click="$emit('deleteFruit', '{{ $fruit->id }}')">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
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
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: 'fruits/chartFruits',
            method: 'POST',
            }).done(function(resFruits){     
                var arreglo = JSON.parse(resFruits);

                for (let x = 0; x < arreglo.length; x++) {
                nomFruits.push(arreglo[x].name);
                cantFruits.push(arreglo[x].quantity);
                }
                generarGraficaFruits();
            })
            </script> 
    @endpush
</div>

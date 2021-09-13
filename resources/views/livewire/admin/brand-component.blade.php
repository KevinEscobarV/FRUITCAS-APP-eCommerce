<x-slot name="header">
    <div class="flex items-center">
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
            <path
                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
            </path>
        </svg>
        <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold">Administración de Marcas
        </div>
        <x-button-enlace color="orange" class="ml-auto" target="blank" href="{{ route('admin.brands.pdf') }}">
            Generar Reporte de Marcas
          </x-button-enlace>
    </div>
</x-slot>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    {{-- Formaliio crear --}}
    @can('brands.create')
        <x-jet-form-section submit="save" class="mb-6">
            <x-slot name="title">
                Agregar nueva marca
            </x-slot>

            <x-slot name="description">
                En esta sección podrá agregar una nueva marca
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Nombre
                    </x-jet-label>

                    <x-jet-input type="text" wire:model="createForm.name" class="w-full" />
                    <x-jet-input-error for="createForm.name" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-button>
                    Agregar
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    @endcan

    {{-- Lista de marcas --}}
    <x-jet-action-section>
        <x-slot name="title">
            Lista de marcas
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas las marcas agregadas
        </x-slot>

        <x-slot name="content">

            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Nombre</th>

                        @can('brands.edit')
                            <th class="py-2">Acción</th>
                        @elsecan('brands.destroy')
                            <th class="py-2">Acción</th>
                        @endcan

                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($brands as $brand)
                        <tr>
                            <td class="py-2">

                                <a class="uppercase">
                                    {{ $brand->name }}
                                </a>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    @can('brands.edit')
                                        <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                            wire:click="edit('{{ $brand->id }}')">Editar</a>
                                    @endcan
                                    @can('brands.destroy')
                                        <a class="pl-2 hover:text-red-600 cursor-pointer"
                                            wire:click="$emit('deleteBrand', '{{ $brand->id }}')">Eliminar</a>
                                    @endcan

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </x-slot>
    </x-jet-action-section>

    {{-- Modal editar --}}
    @can('brands.edit')

        <x-jet-dialog-modal wire:model="editForm.open">
            <x-slot name="title">
                Editar marca
            </x-slot>

            <x-slot name="content">
                <x-jet-label>
                    Nombre
                </x-jet-label>
                <x-jet-input wire:model="editForm.name" type="text" class="w-full" />
                <x-jet-input-error for="editForm.name" />
            </x-slot>

            <x-slot name="footer">
                <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                    Actualizar
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>

    @endcan
    @can('brands.destroy')
        @push('script')
            <script>
                Livewire.on('deleteBrand', brandId => {

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
                            Livewire.emitTo('admin.brand-component', 'delete', brandId)
                            Swal.fire(
                                '¡Eliminado!',
                                'Se ha eliminado correctamente.',
                                'success'
                            )
                        }
                    })
                });
            </script>
        @endpush
    @endcan
</div>

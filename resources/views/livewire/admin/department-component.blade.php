<x-slot name="header">
    <div class="flex items-center">
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
            <path
                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
            </path>
        </svg>
        <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold">Administración de Departamentos
        </div>
    </div>
</x-slot>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    {{-- Agregar departamento --}}
    @can('departments.create')

        <x-jet-form-section submit="save" class="mb-6">

            <x-slot name="title">
                Agregar un nuevo departamento
            </x-slot>

            <x-slot name="description">
                Complete la información necesaria para poder agregar un nuevo departamento
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Nombre
                    </x-jet-label>

                    <x-jet-input wire:model.defer="createForm.name" type="text" class="w-full mt-1" />

                    <x-jet-input-error for="createForm.name" />
                </div>
            </x-slot>

            <x-slot name="actions">

                <x-jet-action-message class="mr-3" on="saved">
                    Departamento agregado
                </x-jet-action-message>

                <x-jet-button>
                    Agregar
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    @endcan

    {{-- Mostrar Departamentos --}}
    <x-jet-action-section>
        <x-slot name="title">
            Lista de Departamentos
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas los departamentos agregados
        </x-slot>

        <x-slot name="content">

            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Nombre</th>
                        @can('departments.edit')
                            <th class="py-2">Acción</th>
                        @elsecan('departments.destroy')
                            <th class="py-2">Acción</th>
                        @endcan
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($departments as $department)
                        <tr>
                            <td class="py-2">

                                <a href="{{ route('admin.departments.show', $department) }}"
                                    class="uppercase underline hover:text-blue-600">
                                    {{ $department->name }}
                                </a>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    @can('departments.edit')
                                        <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                            wire:click="edit({{ $department }})">Editar</a>
                                    @endcan
                                    @can('departments.destroy', Model::class)
                                        <a class="pl-2 hover:text-red-600 cursor-pointer"
                                            wire:click="$emit('deleteDepartment', {{ $department->id }})">Eliminar</a>
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
    @can('departments.edit')
        <x-jet-dialog-modal wire:model="editForm.open">

            <x-slot name="title">
                Editar departamento
            </x-slot>

            <x-slot name="content">

                <div class="space-y-3">

                    <div>
                        <x-jet-label>
                            Nombre
                        </x-jet-label>

                        <x-jet-input wire:model="editForm.name" type="text" class="w-full mt-1" />

                        <x-jet-input-error for="editForm.name" />
                    </div>


                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                    Actualizar
                </x-jet-danger-button>
            </x-slot>

        </x-jet-dialog-modal>
    @endcan

    @can('departments.destroy')
        @push('script')
            <script>
                Livewire.on('deleteDepartment', departmentId => {

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
                            Livewire.emitTo('admin.department-component', 'delete', departmentId)
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

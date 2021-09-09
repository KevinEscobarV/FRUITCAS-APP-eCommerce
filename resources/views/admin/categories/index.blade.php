<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                <path d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                </path>
            </svg>
            <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold">Administración de Categorias
            </div>

        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        @livewire('admin.create-category')
    </div>

    @can('categories.destroy')
        @push('script')
            <script>
                Livewire.on('deleteCategory', categorySlug => {

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
                            Livewire.emitTo('admin.create-category', 'delete', categorySlug)
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
</x-admin-layout>

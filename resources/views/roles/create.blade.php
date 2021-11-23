<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                <path
                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
            </svg>
            <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold">Crear Rol</div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="px-4 py-5 sm:px-6 items-center flex justify-between">
                    <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Creación de Rol
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Asignación de nombre al rol y permisos al rol.
                    </p>
                    </div>
                    <div>
                    <a href="{{ route('roles.index') }}"
                     class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white
                     hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 transition duration-150 ease-in-out">Volver</a>
                    </div>

                </div>

                {!! Form::open(['route' => 'roles.store']) !!}


@include('roles.partials.form')

                    <div class="px-4 py-5 bg-gray-100 text-right sm:px-6">
                        {!! Form::submit('Crear Rol', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) !!}
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

</x-admin-layout>

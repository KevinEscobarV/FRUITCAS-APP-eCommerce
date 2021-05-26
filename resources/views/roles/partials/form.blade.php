<div class="shadow overflow-hidden">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="col-span-6">

            {!! Form::label('name', 'Nombre', ['class' => 'text-base font-medium text-gray-900']) !!}

            {!! Form::text('name', null, ['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md', 'placeholder' => 'Ingrese el nombre del Rol']) !!}

            @error('name')
                <small class="text-red-500 italic">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>
</div>


<div class="px-4 py-5 bg-white sm:p-6">

    <legend class="text-base font-medium text-gray-900">Listado de Permisos</legend>
    <p class="text-sm text-gray-500">Selecciones los permisos que desea asignar al Rol.</p>

    @foreach ($permissions as $permission)
        <div>
            <div class="mt-4 space-y-4">
                <div class="flex items-center">

                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded']) !!}

                    <label class="ml-3 block text-sm font-medium text-gray-700">
                        {{ $permission->description }}
                    </label>

                </div>
            </div>
        </div>
    @endforeach

</div>

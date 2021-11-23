<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                <path
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold">Asignar un Rol</div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="px-4 py-5 sm:px-6 items-center flex justify-between">
                    <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Información de Usuario
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Asignación de Roles
                    </p>
                    </div>
                    <div>
                    <a href="{{ route('users.index') }}"
                     class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white
                   hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 transition duration-150 ease-in-out">Volver</a>
                    </div>

                </div>




                <div class="border-t border-gray-200">

                    <dl>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <img alt="testimonial"
                                    class="w-40 h-40 mb-2 object-cover object-center rounded-full inline-block border-2 border-gray-200 bg-gray-100"
                                    src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                            </dt>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Nombre
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->name }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Correo Electronico
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->email }}
                            </dd>
                        </div>
                    </dl>
                </div>
                <div class="border-t border-gray-200">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Listado de Roles
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Asignación de Rol a Usuario
                        </p>
                    </div>
                </div>
                <div class="border-t border-gray-200">
                    <dl>

                        {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}
                        @foreach ($roles as $role)

                            <div class="bg-white-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">

                                <div class="flex items-center h-5">
                                    <label>
                                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded']) !!}
                                        {{ $role->name }}

                                    </label>
                                </div>


                            </div>
                        @endforeach
                    </dl>
                </div>





                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">

                    {!! Form::submit('Asignar rol', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) !!}
                </div>

                {!! Form::close() !!}


            </div>
        </div>
    </div>
</x-admin-layout>

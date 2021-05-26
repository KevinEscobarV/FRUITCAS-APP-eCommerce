<div>
    <x-slot name="header">

        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                <path
                    d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                </path>
            </svg>
            <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold">Administración de Roles</div>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="text-right">
                <a href="{{ route('roles.create') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md
                    text-white bg-green-600 hover:bg-green-700 transition duration-150 ease-in-out">
                    Crear Rol
                </a>
            </div>

            <br>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">


                                <div class="flex bg-white px-4 py-3 border-gray-200 sm:px-6">
                                    <input wire:model="search" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        type="text" placeholder="Buscar...">

                                    <div>
                                        <select wire:model="perPage"
                                            class="form-input rounded-md shadow-sm mt-1 block ml-6 text-gray-500"
                                            class="outline-none">
                                            <option value="2">2 por página</option>
                                            <option value="5">5 por página</option>
                                            <option value="10">10 por página</option>
                                            <option value="15">15 por página</option>
                                            <option value="25">25 por página</option>
                                            <option value="50">50 por página</option>
                                        </select>
                                    </div>

                                </div>

                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>

                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nombre
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Editar
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Eliminar
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $role->id }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $role->name }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <a href="{{ route('roles.edit', $role) }}"
                                                        class="inline-flex items-center px-4 py-2 border border-gray-300
                                                        rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white
                                                        hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2
                                                        focus:ring-indigo-500 transition duration-150 ease-in-out">Editar</a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">



                                                    <form action={{ route('roles.destroy', $role) }} method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit"
                                                            class="flex mx-auto text-white bg-red-400 border-0 py-2 px-8
                                                            focus:outline-none hover:bg-red-500 rounded transition duration-150 ease-in-out">
                                                            Eliminar </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

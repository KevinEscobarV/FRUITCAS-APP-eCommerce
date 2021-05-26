<div>
    <x-slot name="header">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                <path
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold">Administración de Usuarios Registrados</div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                <div class="flex bg-white px-4 py-3 border-gray-200 sm:px-6">
                                    <input wire:model="search"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full transition duration-150 ease-in-out"
                                        type="text" placeholder="Buscar...">
                                    <div>
                                        <select wire:model="perPage"
                                            class="form-input rounded-md shadow-sm mt-1 block ml-6 text-gray-500 transition duration-150 ease-in-out"
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
                                @if ($users->count())
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    NOMBRE
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ROL
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    VER
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    EDITAR
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    DESACTIVAR
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                            @foreach ($users as $user)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <img class="h-10 w-10 rounded-full object-cover"
                                                                    src="{{ $user->profile_photo_url }}"
                                                                    alt="{{ $user->name }}">
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $user->name }}
                                                                </div>
                                                                <div class="text-sm text-gray-500">
                                                                    {{ $user->email }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">

                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            {{ $user->roles()->pluck('name')->join(', ') }}
                                                        </span>

                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                        <a href="#"
                                                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Ver</a>
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                        <a href="{{ route('users.edit', $user) }}" class="inline-flex items-center px-4 py-2 border
                                                            border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white
                                                            hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300
                                                              transition duration-150 ease-in-out">
                                                            Editar
                                                        </a>

                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                        <a href="#"
                                                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                            Inactivar
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <!-- More items... -->
                                        </tbody>
                                    </table>

                                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                        {{ $users->links() }}
                                    </div>

                                @else
                                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                        No hay resultados en la busqueda actual
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

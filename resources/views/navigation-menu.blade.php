<nav x-data="{ open: false }" class="bg-gray-50 border-b border-gray-100 top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <x-jet-application-mark class="block h-12 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Inicio') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                        {{ __('Usuarios') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.index')">
                        {{ __('Roles') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('products') }}" :active="request()->routeIs('products')">
                        {{ __('Productos') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                        {{ __('Contactanos') }}
                    </x-jet-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- Settings Dropdown -->

                <div class="ml-3 relative">

                    @auth

                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">

                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>

                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Administrar cuenta') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('Tokens de API') }}
                            </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>

                    @else

                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">

                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">


                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" class="h-8 w-8 rounded-full object-cover text-teal-800">
                                    <path
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </button>

                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Registrate o Inicia Sesión') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('login') }}">
                                {{ __('Iniciar Sesión') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('register') }}">
                                {{ __('Registrarse') }}
                            </x-jet-dropdown-link>

                        </x-slot>
                    </x-jet-dropdown>

                    @endauth

                </div>

            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Inicio') }}
            </x-jet-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                {{ __('Usuarios') }}
            </x-jet-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('products') }}" :active="request()->routeIs('products')">
                {{ __('Productos') }}
            </x-jet-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.index')">
                {{ __('Roles') }}
            </x-jet-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                {{ __('Contactanos') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @auth

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="flex-shrink-0 mr-3">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                    :active="request()->routeIs('profile.show')">
                    {{ __('Perfil') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}"
                    :active="request()->routeIs('api-tokens.index')">
                    {{ __('Tokens de API') }}
                </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </x-jet-responsive-nav-link>
                </form>

            </div>
        </div>
        @else
        
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="mt-3 space-y-1">

                <div class="pt-2 pb-3 space-y-1">
                <x-jet-responsive-nav-link href="{{ route('login') }}">
                    {{ __('Iniciar Sesión') }}
                </x-jet-responsive-nav-link>
                </div>
                <div class="pt-2 pb-3 space-y-1">
                <x-jet-responsive-nav-link href="{{ route('register') }}">
                    {{ __('Registrarse') }}
                </x-jet-responsive-nav-link>
                </div>

        </div>
        </div>
        
        @endauth

    </div>
</nav>

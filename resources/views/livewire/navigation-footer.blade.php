
    <x-slot name="footer">

                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                  <a href="/" class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">INICIO</a>
                 
                </div>
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                  <a href="{{ route('dashboard') }}" class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CATEGORIAS</a>
                  
                </div>
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                  <a href="{{ route('orders.index') }}" class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">TUS PEDIDOS</a>
                  
                </div>
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                  <a href="{{ route('contact') }}" class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CONTACTANOS</a>
               
                </div>
              </div>
            </div>
            <div class="bg-gray-200">
              <div class="container px-5 py-6 mx-auto flex items-center sm:flex-row flex-col">
                <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                  <img src="{{ asset('img/logo-fruitcas-white.png') }}" class="block h-11 w-auto">
                </a>
                <p class="text-sm text-gray-500 sm:ml-6 sm:mt-0 mt-4">© 2021 FRUITCAS |
                  <a rel="noopener noreferrer" class="text-gray-600 ml-1">ASOCIACIÓN DE
                    PRODUCTORES DE CASANARE</a>
                </p>
                <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                  <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                  </a>
                  <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                    </svg>
                  </a>
                  <a class="ml-3 text-gray-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                      <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                  </a>

                </span>

    </x-slot>

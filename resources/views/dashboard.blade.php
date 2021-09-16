<x-app-layout>
    <div class="py-12 bg-contain bg-no-repeat" style="background-image:url('/img/fondo3.png');">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg ring-4">

                <div class="p-6 sm:px-20 bg-gray-200 bg-opacity-80">
                    <div class="flex justify-center">
                        <x-jet-application-logo class="h-24 w-auto" />
                    </div>

                    <div class="text-gray-600 mt-8 text-2xl text-center">
                        Bienvenido a la Aplicación Web de Fruitcas !
                    </div>

                    <div class="mt-6 text-gray-600 text-justify">
                        Nuestro objetivo general es cultivar y comercializar frutas tropicales, de producción regional,
                        en
                        especial la
                        piña Gold MD2, frutas producidas acordes a las condiciones climáticas de nuestra zona,
                        aprovechando
                        los recursos
                        naturales y dentro de los estándares de producción amigable del medio ambiente, con la más alta
                        calidad y buen
                        precio, generando empleo en el municipio de Tauramena y sirviendo como ejemplo para los
                        productores
                        del campo.
                    </div>
                </div>

            </div>
        


            <div class="grid grid-cols-2 gap-4">

                @foreach ($categories as $category)

                    <div class="transform transition hover:scale-90 duration-300 mt-12 overflow-hidden shadow-xl sm:rounded-lg ring-4 bg-cover bg-center"
                        style="background-image:url('{{ Storage::url($category->image) }}');">
                        <a href="{{ route('categories.show', $category) }}">
                            <div class="py-12 sm:px-20 bg-gray-500 bg-opacity-40 cursor-pointer">
                                <div>
                                    <img class="block h-12 w-auto" src="{{ asset('img/logo-fruitcas-white.png') }}"
                                        alt="">
                                </div>
                                <div class="italic font-semibold uppercase text-gray-100 mt-4 text-xl">
                                    <span class="inline-block w-8 text-left mr-2">
                                        {!! $category->icon !!}
                                    </span>
                                    {{ $category->name }}
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach
            </div>

        </div>
    </div>

    <livewire:navigation-footer></livewire:navigation-footer>

</x-app-layout>

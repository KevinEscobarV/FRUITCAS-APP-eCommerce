<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 rounded-lg shadow-md my-8 bg-gray-100 border-blueGray-400 border-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

            <div>
                <div class="flexslider shadow-md ring ring-gray-300 ring-offset-4">
                    <ul class="slides">

                        @foreach ($product->images as $image)

                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img class="rounded-md object-cover object-center" src="{{ Storage::url($image->url) }}" />
                            </li>
                        
                        @endforeach

                    </ul>
                </div>
            </div>

            <div>
                <h2 class="text-sm title-font text-gray-500 tracking-widest uppercase">{{ $product->brand->name }}</h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1 capitalize">{{ $product->name }}</h1>
                
                <div class="flex">
                   
                    <p class="text-gray-700 mr-6"> 
                        <i class="fas fa-star text-sm text-yellow-500"></i>
                        <i class="fas fa-star text-sm text-yellow-500"></i>
                        <i class="fas fa-star text-sm text-yellow-500"></i>
                        <i class="fas fa-star text-sm text-yellow-500"></i>
                        <i class="far fa-star text-sm text-yellow-500"></i>
                    </p>
                    <a class="text-orange-500 underline hover:text-orange-800" href="">39 reseñas</a>
                </div>
                <p class="text-2xl font-semibold text-teal-900 my-4">$ {{ number_format($product->price) }} COP</p>

                <div class=" bg-blueGray-400 rounded-lg shadow-md mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-20 w-32 rounded-full bg-teal-500 ring-2 ring-white">
                            <i class="fas fa-truck text-3xl text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-white">El servicio de envio se encuentra interrumpido para nuestros clientes pese al COVID-19</p>
                            <p class="capitalize">Recibelo el
                                {{ Date::now()->addDay(15)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>
                </div>

                <div class=" my-4">
                    <div class="text-lg title-font text-gray-600 tracking-widest">
                        {!! $product->description !!}
                    </div>
                </div>

                @if ($product->subcategory->size)
                    @livewire('add-cart-item-size', ['product' => $product])
                @elseif($product->subcategory->color)
                    @livewire('add-cart-item-color', ['product' => $product])
                @else
                    @livewire('add-cart-item', ['product' => $product])
                @endif

            </div>

        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
    <livewire:navigation-footer></livewire:navigation-footer>
</x-app-layout>

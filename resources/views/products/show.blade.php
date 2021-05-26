<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 rounded-lg shadow-md my-8" style="background-image:url('/img/fondo1-t.jpg');">
        <div class="grid grid-cols-2 gap-6">

            <div>
                <div class="flexslider shadow-md ring ring-gray-300 ring-offset-4">
                    <ul class="slides">

                        @foreach ($product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url) }}" />
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>

            <div>
                <h1 class="text-xl font-bold text-gray-700">{{ $product->name }}</h1>
                <div class="flex">
                    <p class="text-gray-700">Marca: <a class="underline capitalize hover:text-orange-500"
                            href="">{{ $product->brand->name }}</a></p>
                    <p class="text-gray-700 mx-6">5 <i class="fas fa-star text-sm text-orange-500"></i></p>
                    <a class="text-orange-500 underline hover:text-orange-800" href="">39 reseñas</a>
                </div>
                <p class="text-2xl font-semibold text-teal-900 my-4">COP {{ $product->price }}</p>

                <div class=" bg-white rounded-lg shadow-lg mb-6 ring-2 ring-gray-200">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-20 w-20 rounded-full bg-green-500">
                            <i class="fas fa-truck text-3xl text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-teal-600">Se hacen envíos a todo Colombia</p>
                            <p class="capitalize">Recibelo el
                                {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>
                        </div>
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

</x-app-layout>

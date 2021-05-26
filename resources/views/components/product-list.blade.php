@props(['product'])

<li class="bg-white rounded-xl shadow-lg mb-5">
    <article class="flex">
        <figure>
            <img class="h-48 w-56 rounded-l-xl object-cover object-center"
                src="{{ Storage::url($product->images->first()->url) }}" alt="">
        </figure>
        <div class="flex-1 py-4 px-6 flex flex-col">
            <div class="flex justify-between">
                <div>
                    <h1 class="text-lg font-semibold text-gray-700">{{ $product->name }}</h1>
                    <p class="font-bold text-gray-700">COP {{ $product->price }}</p>
                </div>
                <div class="flex items-center">
                    <ul class="flex text-sm text-yellow-400">
                        <li><i class="fas fa-star mr-1"></i></li>
                        <li><i class="fas fa-star mr-1"></i></li>
                        <li><i class="fas fa-star mr-1"></i></li>
                        <li><i class="fas fa-star mr-1"></i></li>
                        <li><i class="fas fa-star mr-1"></i></li>
                    </ul>
                    <span class="text-gray-700 text-sm">(24)</span>
                </div>
            </div>
            <div class="ml-auto mt-auto mb-2">
                <x-danger-enlace href="{{ route('products.show', $product) }}">
                    Más Información
                </x-danger-enlace>
            </div>
        </div>
    </article>
</li>

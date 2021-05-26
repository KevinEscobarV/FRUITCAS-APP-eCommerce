<div wire:init="loadPosts">

@if (count($products))
    
    <div class="glider-contain">
        <ul class="glider-{{$category->id}}">
            @foreach ($products as $product)
                <li class="bg-white rounded-xl shadow-lg mb-5 mr-2 ml-2 {{ $loop->last ? '' : 'sm:mr-4' }}">
                    <article>
                        <figure>
                            <img class="rounded-t-xl h-50 w-full object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                        </figure>
                        <div class="py-4 px-8">
                            <a href="{{route('products.show', $product)}}">
                                <h1 class="text-lg font-semibold">{{Str::limit( $product->name, 19)}}</h1>
                            </a>
                            <p class="font-bold text-yellow-800 text-opacity-80">COP {{$product->price}}</p>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>
        <button aria-label="Previous" class="glider-prev">«</button>
        <button aria-label="Next" class="glider-next">»</button>
        <br>
        <div role="tablist" class="dots"></div>
    </div>

@else

<div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-xl">
    <div class="rounded-xl animate-spin ease duration-300 w-20 h-20 border-2 border-teal-500"></div>
</div>

@endif
    
</div>
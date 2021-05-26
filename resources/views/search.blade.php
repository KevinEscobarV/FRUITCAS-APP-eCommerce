<x-app-layout>
    <div class="container mx-auto py-8">
        <ul>
            @forelse($products as $product)

                <x-product-list :product="$product" />

            @empty
            
                <li class="bg-white rounded-lg shadow-2xl">
                    <div class="p-4">
                        <p class="text-lg font-semibold text-gray-700">
                            Ningún producto coinide con esos parametros
                        </p>
                    </div>
                </li>

            @endforelse
        </ul>

        <div class="mt-4">

            {{ $products->appends([
            
                      'name' => $name
            
                     ])->links() }}
            
               </div>

    </div>
</x-app-layout>
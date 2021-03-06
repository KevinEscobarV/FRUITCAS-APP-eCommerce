@props(['category'])

<div class="grid grid-cols-4 p-4">
    <div>
        <p class="text-lg font-bold text-center text-gray-500 mb-3">SUBCATEGORIAS</p>
        <ul>
            @foreach ($category->subcategories as $subcategory)
                <li>
                    <a href="{{route('categories.show', $category). '?subcategoria=' . $subcategory->slug}}" class="text-white inline-block font-semibold py-1 px-4 hover:bg-blueGray-400 bg-blueGray-600 rounded-md m-4">
                        {{ $subcategory->name }}
                    </a>
                </li>

            @endforeach
        </ul>
    </div>

    <div class="col-span-3">

        <img class="h-64 w-full object-cover object-center rounded-lg" src="{{ Storage::url($category->image) }}" alt="">


    </div>
</div>
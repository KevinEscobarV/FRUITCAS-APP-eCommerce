<div>

    <x-slot name="header">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                <path
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold">Formulario de Cración de Productos</div>
            <x-button-enlace color="teal" class="ml-auto" href="{{ route('admin.index') }}">
                Volver
            </x-button-enlace>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        <div class="bg-white shadow-xl rounded-lg p-6">
            <div class="grid grid-cols-2 gap-6 mb-4">

                {{-- Categoría --}}
                <div>
                    <x-jet-label value="Categorías" />
                    <select
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model="category_id">
                        <option value="" selected disabled>Seleccione una categoría</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="category_id" />
                </div>

                {{-- Subcategoría --}}
                <div>
                    <x-jet-label value="Subcategorías" />
                    <select
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model="subcategory_id">
                        <option value="" selected disabled>Seleccione una subcategoría</option>

                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="subcategory_id" />
                </div>
            </div>

            {{-- Nombre --}}
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="name"
                    placeholder="Ingrese el nombre del producto" />
                <x-jet-input-error for="name" />
            </div>

            {{-- Slug --}}
            <div class="mb-4">
                <x-jet-label value="Slug" />
                <x-jet-input type="text" disabled wire:model="slug" class="w-full bg-gray-200"
                    placeholder="Slug del producto" />

                <x-jet-input-error for="slug" />
            </div>

            {{-- Descrición --}}
            <div class="mb-4">
                <div wire:ignore>
                    <x-jet-label value="Descripción" />
                    <textarea
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        rows="4" wire:model="description" x-data x-init="ClassicEditor.create($refs.miEditor)
                .then(function(editor){
                    editor.model.document.on('change:data', () => {
                        @this.set('description', editor.getData())
                    })
                })
                .catch( error => {
                    console.error( error );
                } );" x-ref="miEditor">
            </textarea>
                </div>
                <x-jet-input-error for="description" />
            </div>

            <div class="grid grid-cols-2 gap-6 mb-4">
                {{-- Marca --}}
                <div>
                    <x-jet-label value="Marca" />
                    <select
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                        wire:model="brand_id">
                        <option value="" selected disabled>Seleccione una marca</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="brand_id" />
                </div>

                {{-- Precio --}}
                <div>
                    <x-jet-label value="Precio" />
                    <x-jet-input wire:model="price" type="number" class="w-full" step=".01" />
                    <x-jet-input-error for="price" />
                </div>
            </div>

            @if ($subcategory_id)

                @if (!$this->subcategory->color && !$this->subcategory->size)

                    <div>
                        <x-jet-label value="Cantidad" />
                        <x-jet-input wire:model="quantity" type="number" class="w-full" />
                        <x-jet-input-error for="quantity" />
                    </div>

                @endif

            @endif


            <div class="flex mt-4">
                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save" class="w-full justify-center">
                    Crear producto
                </x-jet-button>
            </div>
        </div>
    </div>
</div>

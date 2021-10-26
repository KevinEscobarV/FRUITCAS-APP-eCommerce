<div>
    <div>

        <header class="bg-gray-150 shadow">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                        <path
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                        </path>
                    </svg>
                    <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold">{{ $product->name }}
                    </div>
                    @can('products.destroy')
                    <x-jet-danger-button class="ml-auto" wire:click="$emit('deleteProduct')">
                        Eliminar Producto
                    </x-jet-danger-button>
                    @endcan
                    <x-button-enlace color="teal" class=" ml-2" href="{{ route('admin.index') }}">
                        Volver
                    </x-button-enlace>
                </div>
            </div>
        </header>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

            <div class="mb-4" wire:ignore>
                <form action="{{ route('admin.products.files', $product) }}" method="POST" class="dropzone"
                    id="my-awesome-dropzone"></form>
            </div>

            @if ($product->images->count())
                <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
                    <h1 class=" text-2xl text-center font-semibold mb-2">Imagenes del Producto</h1>
                    <ul class="flex flex-wrap">
                        @foreach ($product->images as $image)
                            <li class="relative" wire:key="image-{{ $image->id }}">
                                <img class=" w-32 h-20 object-cover m-2 rounded-md" src="{{ Storage::url($image->url) }}" alt="">
                                <x-jet-danger-button class="absolute right-2 top-2"
                                    wire:click="deleteImage({{ $image->id }})" wire:loading.attr="disabled"
                                    wire:target="deleteImage({{ $image->id }})">
                                    x
                                </x-jet-danger-button>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endif

            @livewire('admin.status-product', ['product' => $product], key('status-product-' . $product->id))


            <div class="bg-white shadow-xl rounded-lg p-6">
                <div class="grid grid-cols-2 gap-6 mb-4">

                    {{-- Categoría --}}
                    <div>
                        <x-jet-label value="Categorías" />
                        <select class="w-full rounded-md" wire:model="category_id">
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
                        <select class="w-full rounded-md" wire:model="product.subcategory_id">
                            <option value="" selected disabled>Seleccione una subcategoría</option>

                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="product.subcategory_id" />
                    </div>
                </div>

                {{-- Nombre --}}
                <div class="mb-4">
                    <x-jet-label value="Nombre" />
                    <x-jet-input type="text" class="w-full" wire:model="product.name"
                        placeholder="Ingrese el nombre del producto" />
                    <x-jet-input-error for="product.name" />
                </div>

                {{-- Slug --}}
                <div class="mb-4">
                    <x-jet-label value="Slug" />
                    <x-jet-input type="text" disabled wire:model="slug" class="w-full bg-gray-200"
                        placeholder="Ingrese el slug del producto" />

                    <x-jet-input-error for="slug" />
                </div>

                {{-- Descrición --}}
                <div class="mb-4">
                    <div wire:ignore>
                        <x-jet-label value="Descripción" />
                        <textarea class="w-full rounded-md" rows="4" wire:model="product.description" x-data x-init="ClassicEditor.create($refs.miEditor)
                    .then(function(editor){
                        editor.model.document.on('change:data', () => {
                            @this.set('product.description', editor.getData())
                        })
                    })
                    .catch( error => {
                        console.error( error );
                    } );" x-ref="miEditor">
                </textarea>
                    </div>
                    <x-jet-input-error for="product.description" />
                </div>

                <div class="grid grid-cols-2 gap-6 mb-4">
                    {{-- Marca --}}
                    <div>
                        <x-jet-label value="Marca" />
                        <select class="rounded-md w-full" wire:model="product.brand_id">
                            <option value="" selected disabled>Seleccione una marca</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="product.brand_id" />
                    </div>

                    {{-- Precio --}}
                    <div>
                        <x-jet-label value="Precio" />
                        <x-jet-input wire:model="product.price" type="number" class="w-full" step=".01" />
                        <x-jet-input-error for="product.price" />
                    </div>
                </div>


                @if ($this->subcategory)


                    @if (!$this->subcategory->color && !$this->subcategory->size)

                        <div>
                            <x-jet-label value="Cantidad" />
                            <x-jet-input wire:model="product.quantity" type="number" class="w-full" />
                            <x-jet-input-error for="product.quantity" />
                        </div>

                    @endif

                @endif

                <div class="flex justify-end items-center mt-4">

                    <x-jet-action-message class="mr-3" on="saved">
                        Actualizado
                    </x-jet-action-message>

                    <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                        Actualizar producto
                    </x-jet-button>
                </div>
            </div>


            @if ($this->subcategory)

                @if ($this->subcategory->size)

                    @livewire('admin.size-product', ['product' => $product], key('size-product-' . $product->id))

                @elseif($this->subcategory->color)

                    @livewire('admin.color-product', ['product' => $product], key('color-product-' . $product->id))

                @endif

            @endif

        </div>
    </div>
    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre una imagen al recuadro, o da click para abrir el explorador",
                acceptedFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                complete: function(file) {
                    this.removeFile(file)
                },
                queuecomplete: function() {
                    Livewire.emit('refreshProduct');
                }

            };

            // ALERTA COLOR
            Livewire.on('deletePivot', pivot => {
                Swal.fire({
                    title: '¿Estas Seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.color-product', 'delete', pivot);

                        Swal.fire(
                            '¡Eliminado!',
                            'Se ha eliminado correctamente.',
                            'success'
                        )
                    }
                })
            })

            // ALERTA TAMAÑO COLOR
            Livewire.on('deleteColorSize', pivot => {
                Swal.fire({
                    title: '¿Estas Seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.color-size', 'delete', pivot);

                        Swal.fire(
                            '¡Eliminado!',
                            'Se ha eliminado correctamente.',
                            'success'
                        )
                    }
                })
            })

            // ELIMINAR PRODUCTO
            Livewire.on('deleteProduct', () => {
                Swal.fire({
                    title: '¿Estas Seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.edit-product', 'delete');
                        Swal.fire(
                            '¡Eliminado!',
                            'Se ha eliminado correctamente.',
                            'success'
                        )
                    }
                })
            })

            // ALERTA TAMAÑO
            Livewire.on('deleteSize', sizeId => {
                Swal.fire({
                    title: '¿Estas Seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.size-product', 'delete', sizeId);
                        Swal.fire(
                            '¡Eliminado!',
                            'Se ha eliminado correctamente.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>

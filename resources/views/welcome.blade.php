<x-app-layout>
    <div class=" bg-contain bg-no-repeat" style="background-image:url('/img/fondo25-t.png');">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @foreach ($categories as $category)

                <section mb-6>
                    <br>
                    <div class="flex items-center mb-2">
                        <h1 class="text-lg uppercase font-semibold text-gray-600">
                            {{ $category->name }}
                        </h1>
                        <a href="{{ route('categories.show', $category) }}"
                            class="text-teal-800 hover:text-teal-500 hover:underline ml-2 font-semibold ">Ver Mas</a>
                    </div>

                    @livewire('category-products', ['category' => $category])

                </section>

            @endforeach

        </div>
    </div>

    <livewire:navigation-footer></livewire:navigation-footer>


    @push('script')

        <script>
            Livewire.on('glider', function(id) {

                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [{
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 1.5,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2.5,
                                slidesToScroll: 2,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3.5,
                                slidesToScroll: 3,
                            }
                        },
                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 3,
                            }
                        },
                    ]
                });
            });
        </script>
    @endpush

</x-app-layout>

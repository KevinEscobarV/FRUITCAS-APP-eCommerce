<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Kevin David Escobar, David Santiago Cano">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Glider -->
    <link rel="stylesheet" href="{{ secure_asset('css/glider.min.css') }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ secure_asset('FontAwesome/css/all.min.css') }}">
    <!-- FlexSlider -->
    <link rel="stylesheet" href="{{ secure_asset('FlexSlider/flexslider.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Glider -->
    <script src={{ secure_asset('js/glider.min.js') }}></script>
    <!-- FlexSlider -->
    <script src={{ secure_asset('FlexSlider/jquery.flexslider-min.js') }}></script>

</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100">

        @livewire('navigation-menu')

        @livewire('navigation-one')

        <!-- Page Heading -->
        @if (isset($header))
            <div class="bg-gray-150 shadow">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </div>
        @endif

        <x-jet-banner />

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <!-- Page footer -->
    @if (isset($footer))

        <footer class="text-gray-600 body-font">
            <div class="max-w-7xl container px-5 py-12 mx-auto">
                <div class="flex flex-wrap md:text-left text-center order-first">
                    {{ $footer }}
                </div>
            </div>
        </footer>

    @endif

    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <script>
        var botmanWidget = {
            // headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            title: 'ChatBot FruitCas',
            aboutText: 'Fruitcas',
            placeholderText: 'Envia un mensaje al Bot',
            mainColor: '#FFCD00',
            bubbleBackground: '#FFCD00',
            introMessage: "✋ Hola! Estoy aqui para ayudarte"
        };
    </script>
    


    @stack('modals')

    @livewireScripts


    {{-- Script Menu de navegación --}}
    <script>
        function dropdown() {
            return {
                open: false,
                show() {
                    if (this.open) {

                        this.open = false;
                        document.getElementsByTagName('html')[0].style.overflow = 'auto'

                    } else {

                        this.open = true;
                        document.getElementsByTagName('html')[0].style.overflow = 'hidden'
                    }
                },
                close() {
                    this.open = false;
                    document.getElementsByTagName('html')[0].style.overflow = 'auto'
                }
            }
        }
    </script>

    @stack('script')

</body>

</html>

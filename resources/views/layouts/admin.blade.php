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
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('FontAwesome/css/all.min.css') }}">
    {{-- Dropzone --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css">
    {{-- chart --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.css" />


    @livewireStyles


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- CKEDITOR -->
    <script src={{ asset('js/ckeditor.js') }}></script>
    {{-- sweetalert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Dropzone --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    {{-- Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>



</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100">

        @livewire('navigation-menu')

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


    @stack('modals')

    @livewireScripts

    @stack('script')

    <script>
        Livewire.on('errorSize', mensaje => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: mensaje,
            })
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>



</body>

</html>

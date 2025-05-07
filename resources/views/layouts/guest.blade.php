<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="relative font-sans text-gray-900 antialiased">

        {{-- BACKGROUND IMAGE with overlay --}}
        <div class="absolute inset-0 bg-black/30 z-0" 
             style="background-image: url('{{ asset('images/2.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        </div>
    
        {{-- MAIN CONTENT (Frosted Glass Card) --}}
        <div class="relative z-10 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    
          {{--}}  <div>
                <a href="/">
                    <img src="{{ asset('images/carDealerLogo.png') }}" alt="Logo" class="w-20 h-20 object-contain" />
                </a>
            </div> {{--}}
    
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 frosted-glass">
                {{ $slot }}
            </div>
            
            
            
        </div>
    </body>
    
</html>

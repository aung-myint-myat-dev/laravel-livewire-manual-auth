<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen text-gray-200">
    <nav class="flex items-center py-4 px-10 justify-between border-b bg-gray-900">
        <h2 class="text-2xl font-bold">Laravel-Livewire Manual Auth</h2>
        <div class="space-x-3">
            <a wire:navigate href="{{route('login')}}" class="py-2 px-4 hover:text-orange-500 transition-all duration-100 text-md border rounded-sm">Login</a>
            <a wire:navigate href="{{route('register')}}" class="py-2 px-4 hover:text-orange-500 transition-all duration-100 text-md border rounded-sm">Register</a>
        </div>
    </nav>

    {{-- Greeting Card --}}
    <div class="flex justify-center h-screen items-center p-6">
        <div
            class="max-w-lg w-full bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 transition-all hover:shadow-2xl">
            <div class="p-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">
                        LaraLive Manual Auth
                    </h2>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Livewire ကို အသုံးပြု၍ manually authantication တစ်ခုပြုလုပ်ခြင်း။
                    </p>
                </div>

                <div class="mt-8">
                    <a wire:navigate href="{{route('register')}}"
                        class="block text-center w-full bg-gray-900 text-white font-semibold py-3 px-4 rounded-xl hover:bg-gray-800 transition-colors duration-200">
                        Let's Register
                    </a>
                </div>
            </div>

            <div class="bg-gray-50 py-4 text-center border-t border-gray-100">
                <span class="text-xs text-gray-400 uppercase tracking-widest">I like tall stack since I'm tall.🫡</span>
            </div>
        </div>
    </div>
</body>

</html>

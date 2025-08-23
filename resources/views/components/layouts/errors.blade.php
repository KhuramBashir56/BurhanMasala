<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark select-none">

<head>
    <meta name="robots" content="index, follow">
    <x-layouts.meta-information />
    <title>{{ $title . ' - ' . config('app.name') }}</title>
    <meta name="description" content="{{ config('app.description') }}">
    @stack('styles')
    @livewireStyles
</head>

<body>
    <div class="min-h-screen bg-primary-100 dark:bg-gray-900 items-center flex flex-col justify-center p-4 gap-4 text-center bg-center bg-cover" style="background-image: url('{{ asset('images/backgrounds/error.jpg') }}');">
        <Image class="w-48" src="{{ asset('images/logo.png') }}" alt="logo" />
        <div class="font-bold">
            <p class="text-red-600 mb-4 text-4xl">Ops! Error</p>
            <h3 class="text-gray-800 sm:text-6xl text-4xl">{{ $title }}</h3>
        </div>
        <p class="text-base max-w-lg">{{ $description }}</p>
        <x-control-panel.buttons.link wire:navigate href="{{ route('home') }}" :title="__('Go Back to Home Page')" />
    </div>
    @stack('scripts')
    @livewireScripts
</body>

</html>

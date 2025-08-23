<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark select-none">

<head>
    <x-layouts.meta-information />
    <meta name="robots" content="index, follow">
    <title>{{ $title . ' | ' . config('app.name') }}</title>
    <meta name="description" content="{{ $description ?? config('app.description') }}">
    @stack('styles')
</head>

<body class="w-full min-h-screen px-4 py-16  flex flex-col justify-center items-center bg-cover bg-center bg-primary-500 dark:bg-gray-950 text-gray-950 dark:text-gray-100 relative transition-colors duration-500" style="background-image: url({{ $background }});">
    <x-color-mode class="absolute top-4 right-4" />
    @if (session()->has('error'))
        <x-notification type="error" message="{{ session('error') }}" class="mb-4" />
    @endif
    {{ $slot }}
    <x-alert-message />
    @stack('scripts')
</body>

</html>

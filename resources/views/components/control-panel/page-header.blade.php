@props(['title'])
<div {{ $attributes->merge(['class' => 'w-full flex sm:justify-between justify-center gap-4 sm:flex-row flex-col print:hidden']) }}>
    {{ $title ?? $slot }}
</div>

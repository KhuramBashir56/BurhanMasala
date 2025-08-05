<div {{ $attributes->merge(['class' => 'shadow-md shadow-gray-400 dark:shadow-gray-950 w-full overflow-x-auto']) }}>
    <table class="w-full">
        {{ $slot }}
    </table>
</div>

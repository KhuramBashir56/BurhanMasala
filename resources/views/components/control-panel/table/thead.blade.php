<thead>
    <tr {{ $attributes->merge(['class' => 'font-semibold tracking-wide text-left text-sm capitalize border-b border-primary-300 dark:border-gray-300 text-white bg-primary-500 dark:bg-gray-800']) }}>
        {{ $slot }}
    </tr>
</thead>

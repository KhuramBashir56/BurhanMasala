@props(['colspan', 'message'])

<x-control-panel.table.tr>
    <x-control-panel.table.td colspan="{{ $colspan }}">
        <p class="text-center text-2xl font-bold text-gray-500 dark:text-gray-400">
            {{ $message }}
        </p>
    </x-control-panel.table.td>
</x-control-panel.table.tr>

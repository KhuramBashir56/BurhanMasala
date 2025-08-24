<x-control-panel.card class="w-full">
    <form wire:submit.prevent="blockAccount" wire:confirm="Are you sure you want to block the account?">
        <x-control-panel.card.body class="w-full p-4">
            <x-control-panel.form.label label="Reason" for="description">
                <x-control-panel.form.textarea wire:model="description" for="description" maxlength="1000" required placeholder="Write your reason to block the account..." />
            </x-control-panel.form.label>
        </x-control-panel.card.body>
        <x-control-panel.card.footer class="p-4 justify-end">
            @can('block-account')
                <x-control-panel.buttons.button type="submit" color="success" target="blockAccount" title="Block Account" />
            @endcan
        </x-control-panel.card.footer>
    </form>
</x-control-panel.card>

<x-control-panel.card class="w-full">
    <form wire:submit.prevent="reactivateAccount" wire:confirm="Are you sure you want to reactivate the account?">
        <x-control-panel.card.body class="w-full p-4">
            <x-control-panel.form.label label="Description" for="description">
                <x-control-panel.form.textarea wire:model="description" for="description" maxlength="1000" required placeholder="Description..." />
            </x-control-panel.form.label>
        </x-control-panel.card.body>
        <x-control-panel.card.footer class="p-4 justify-end">
            @can('reactivate-account')
                <x-control-panel.buttons.button type="submit" color="success" target="reactivateAccount" title="Reactivate Account" />
            @endcan
        </x-control-panel.card.footer>
    </form>
</x-control-panel.card>

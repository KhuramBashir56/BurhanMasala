<div class="w-full space-y-4">
    <x-control-panel.card>
        <x-control-panel.card.header title="Theme Appearance" description="Customize the theme with light or dark mode." class="px-4 pt-4" />
        <x-control-panel.card.body class="w-full grid-cols-2 gap-4 p-4">
            <h3 class="font-medium text-sm">Toggle Theme</h3>
            <x-color-mode class="ms-auto" />
        </x-control-panel.card.body>
    </x-control-panel.card>
    <x-control-panel.card>
        <x-control-panel.card.header title="Change Password" description="Change your account password using the form below." class="px-4 pt-4" />
        <form wire:submit.prevent="updatePassword">
            <x-control-panel.card.body class="gap-4 p-4">
                <x-control-panel.form.label for="current_password" label="Current Password">
                    <x-control-panel.form.input-password wire:model="current_password" for="current_password" placeholder="Enter Current Password" required minlength="8" maxlength="64" />
                </x-control-panel.form.label>
                <x-control-panel.form.label for="password" label="New Password">
                    <x-control-panel.form.input-password wire:model="password" for="password" placeholder="Enter New Password" required minlength="8" maxlength="64" />
                </x-control-panel.form.label>
                <x-control-panel.form.label for="password_confirmation" label="Confirm Password">
                    <x-control-panel.form.input-password wire:model="password_confirmation" for="password_confirmation" placeholder="Confirm New Password" required minlength="8" maxlength="64" />
                </x-control-panel.form.label>
            </x-control-panel.card.body>
            <x-control-panel.card.footer class="p-4 justify-end">
                <x-control-panel.buttons.button type="button" x-on:click="$dispatch($wire.current_password = '', $wire.password = '', $wire.password_confirmation = '')" color="secondary" :title="__('Cancel')" />
                <x-control-panel.buttons.button type="submit" color="success" target="updatePassword" title="Update" />
            </x-control-panel.card.footer>
        </form>
    </x-control-panel.card>
    <x-control-panel.card>
        <x-control-panel.card.header title="Login Sessions" description="Here you can manage your active login sessions." class="px-4 pt-4" />
        <x-control-panel.card.body class="w-full gap-4">
            <x-control-panel.table class="shadow-none">
                <x-control-panel.table.thead>
                    <x-control-panel.table.th content="IP Address / Browser / Last Activity" />
                    <x-control-panel.table.th content="Action" class="text-center" />
                </x-control-panel.table.thead>
                <x-control-panel.table.tbody>
                    @forelse ($sessions as $session)
                        <x-control-panel.table.tr>
                            <x-control-panel.table.td>
                                <p class="text-lg font-semibold">{!! $session->ip_address . ($session->ip_address == request()->ip() ? ' - <span class="text-green-500"> This Device </span>' : '') !!}</p>
                                <p class="capitalize">{{ $session->platform }} / {{ $session->browser }} / {{ $session->device }}</p>
                                <p class="capitalize">{{ Carbon\Carbon::parse($session->last_activity)->format('M d, Y h:i:s A') }}</p>
                            </x-control-panel.table.td>
                            <x-control-panel.table.actions>
                                <x-control-panel.buttons.button type="button" wire:click="logoutSession({{ $session->id }})" wire:confirm="Are you sure you want to logout from this session?" target="logoutSession({{ $session->id }})" title="Logout" color="danger" />
                            </x-control-panel.table.actions>
                        </x-control-panel.table.tr>
                    @empty
                        <x-control-panel.table.empty colspan="2" message="No Login Sessions Found..." />
                    @endforelse
                </x-control-panel.table.tbody>
            </x-control-panel.table>
        </x-control-panel.card.body>
        <x-control-panel.card.footer class="p-4 justify-end">
            <x-control-panel.buttons.button type="button" wire:click="logoutAllSession" wire:confirm="Are you sure you want to logout from all sessions?" target="logoutAllSession" title="Logout all sessions" color="danger" />
        </x-control-panel.card.footer>
    </x-control-panel.card>
</div>

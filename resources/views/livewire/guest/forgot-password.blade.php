<x-slot:background> {{ asset('images/backgrounds/forgot-password.jpg') }}</x-slot>

<div class="w-full max-w-md">
    <x-control-panel.card>
        <x-control-panel.card.header title="Forgot Password" description="Enter your email below to reset your password." class="p-4 text-center" />
        <form wire:submit.prevent="sendPasswordResetLink">
            <x-control-panel.card.body class="p-4 gap-4">
                <x-control-panel.form.label for="email" label="Email">
                    <x-control-panel.form.input label="Email" :for="__('email')" type="email" wire:model="email" placeholder="Your Email Address" autofocus autocomplete="email" required />
                </x-control-panel.form.label>
                <x-control-panel.buttons.button title="Reset password" target="sendPasswordResetLink" type="submit" class="w-full" />
            </x-control-panel.card.body>
        </form>
        <x-control-panel.card.footer class="p-4 justify-center">
            <p>If you remember your password, you can <x-link title="Log in" wire:navigate href="{{ route('login') }}" />.</p>
        </x-control-panel.card.footer>
    </x-control-panel.card>
</div>

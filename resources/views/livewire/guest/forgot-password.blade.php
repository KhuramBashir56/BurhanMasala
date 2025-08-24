<x-slot:background> {{ asset('images/backgrounds/forgot-password.jpg') }}</x-slot>

<x-control-panel.card class="w-full max-w-md">
    <x-control-panel.card.header title="Forgot Password" description="Enter your email below to reset your password." class="p-4 text-center" />
    <form wire:submit.prevent="sendPasswordResetLink" class="bg-contain bg-no-repeat bg-center" style="background-image: url('{{ asset('images/logo-512x512.png') }}');">
        <x-control-panel.card.body class="p-4 gap-4 bg-white/75 dark:bg-gray-900/90 backdrop-blur-none">
            <x-control-panel.form.label for="email" label="Email">
                <x-control-panel.form.input label="Email" :for="__('email')" type="email" wire:model="email" placeholder="Your Email Address" maxlength="64" autofocus autocomplete="email" required />
            </x-control-panel.form.label>
            <x-control-panel.buttons.button title="Reset password" target="sendPasswordResetLink" type="submit" class="w-full" />
        </x-control-panel.card.body>
    </form>
    <x-control-panel.card.footer class="p-4 justify-center">
        <p>If you remember your password, you can <x-link title="Log in" wire:navigate href="{{ route('login') }}" />.</p>
    </x-control-panel.card.footer>
</x-control-panel.card>

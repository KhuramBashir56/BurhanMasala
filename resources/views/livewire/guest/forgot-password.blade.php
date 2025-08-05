<x-slot:background> {{ asset('images/backgrounds/forgot-password.jpg') }}</x-slot>

<div class="w-full max-w-md">
    <x-control-panel.card>
        <x-control-panel.card.header :title="__('Forgot Password')" :description="__('Enter your email below to reset your password.')" class="p-4 text-center" />
        <x-control-panel.card.body class="p-4">
            <form wire:submit.prevent="sendPasswordResetLink" class="space-y-4">
                <x-control-panel.form.label :for="__('email')" :label="__('Email')">
                    <x-control-panel.form.input :label="__('Email')" :for="__('email')" type="email" wire:model="email" placeholder="Your Email Address" autofocus autocomplete="email" required />
                </x-control-panel.form.label>
                <x-control-panel.buttons.button :title="__('Reset password')" :target="__('sendPasswordResetLink')" type="submit" class="w-full" />
            </form>
        </x-control-panel.card.body>
        <x-control-panel.card.footer class="p-4 justify-center">
            <p>If you remember your password, you can <x-link :title="__('Log in')" wire:navigate href="{{ route('login') }}" />.</p>
        </x-control-panel.card.footer>
    </x-control-panel.card>
</div>

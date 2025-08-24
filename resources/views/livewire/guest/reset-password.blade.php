<x-slot:background> {{ asset('images/backgrounds/reset-password.jpg') }}</x-slot>

<x-control-panel.card class="w-full max-w-md">
    <x-control-panel.card.header :title="__('Reset Password')" :description="__('Please enter your new password below.')" class="p-4 text-center" />
    <form wire:submit.prevent="resetPassword" class="bg-contain bg-no-repeat bg-center" style="background-image: url('{{ asset('images/logo-512x512.png') }}');">
        <x-control-panel.card.body class="p-4 gap-4 bg-white/75 dark:bg-gray-900/90 backdrop-blur-none">
            <x-control-panel.form.label :for="__('email')" :label="__('Email')">
                <x-control-panel.form.input :label="__('Email')" :for="__('email')" type="email" wire:model="email" placeholder="Your Email Address" autocomplete="email" required />
            </x-control-panel.form.label>
            <x-control-panel.form.label :for="__('password')" :label="__('Password')">
                <x-control-panel.form.input-password :label="__('Password')" :for="__('password')" wire:model="password" placeholder="Your Password" autocomplete="new-password" required minlength="8" />
            </x-control-panel.form.label>
            <x-control-panel.form.label :for="__('password_confirmation')" :label="__('Confirm Password')">
                <x-control-panel.form.input-password :label="__('Confirm Password')" :for="__('password_confirmation')" placeholder="Confirm Your Password" wire:model="password_confirmation" autocomplete="new-password" required minlength="8" />
            </x-control-panel.form.label>
            <x-control-panel.buttons.button :title="__('Reset Password')" :target="__('resetPassword')" type="submit" class="w-full" />
        </x-control-panel.card.body>
    </form>
    <x-control-panel.card.footer class="p-4 justify-center text-center">
        <p>If you have facing any problem, you can generate a new <x-link :title="__('Password Reset Token')" wire:navigate href="{{ route('forgot-password') }}" />.</p>
    </x-control-panel.card.footer>
</x-control-panel.card>

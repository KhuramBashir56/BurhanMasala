<x-slot:background> {{ asset('images/backgrounds/register.webp') }}</x-slot>

<x-control-panel.card class="w-full max-w-md">
    <x-control-panel.card.header :title="__('Register an account')" :description="__('Please fill in the form below to create an account')" class="p-4 text-center" />
    <form wire:submit.prevent="register" class="bg-contain bg-no-repeat bg-center" style="background-image: url('{{ asset('images/logo-512x512.png') }}');">
        <x-control-panel.card.body class="p-4 gap-4 bg-white/90 dark:bg-gray-900/90 backdrop-blur-none">
            <x-control-panel.form.label :for="__('name')" :label="__('Name')">
                <x-control-panel.form.input :label="__('Name')" :for="__('name')" wire:model="name" placeholder="Your Full Name" autocomplete="name" maxlength="48" required />
            </x-control-panel.form.label>
            <x-control-panel.form.label :for="__('phone')" :label="__('Phone')">
                <x-control-panel.form.input :label="__('Phone')" :for="__('phone')" type="tel" wire:model="phone" placeholder="Your Phone Number" autocomplete="tel" maxlength="11" pattern="03[0-9]{9}" title="Please enter a valid phone number starting with '03'" required />
            </x-control-panel.form.label>
            <x-control-panel.form.label :for="__('email')" :label="__('Email')">
                <x-control-panel.form.input :label="__('Email')" :for="__('email')" type="email" wire:model="email" placeholder="Your Email Address" autocomplete="email" maxlength="64" required />
            </x-control-panel.form.label>
            <x-control-panel.form.label :for="__('password')" :label="__('Password')">
                <x-control-panel.form.input-password :label="__('Password')" :for="__('password')" wire:model="password" placeholder="Your Password" autocomplete="new-password" required minlength="8" maxlength="64" />
            </x-control-panel.form.label>
            <x-control-panel.form.label :for="__('password_confirmation')" :label="__('Confirm Password')">
                <x-control-panel.form.input-password :label="__('Confirm Password')" :for="__('password_confirmation')" placeholder="Confirm Your Password" wire:model="password_confirmation" autocomplete="new-password" required minlength="8" maxlength="64" />
            </x-control-panel.form.label>
            <x-control-panel.form.checkbox :for="__('terms')" wire:model="terms">
                <span class="text-sm">
                    I agree to the <x-link :title="__('Terms and Conditions')" wire:navigate href="{{ route('terms-and-conditions') }}" /> and <x-link :title="__('Privacy Policy')" wire:navigate href="{{ route('privacy-policy') }}" />
                </span>
            </x-control-panel.form.checkbox>
            <x-control-panel.buttons.button :title="__('Register')" :target="__('register')" type="submit" class="w-full" />
        </x-control-panel.card.body>
    </form>
    <x-control-panel.card.footer class="p-4 justify-center">
        <p>If you have an account, you can <x-link :title="__('Log in')" wire:navigate href="{{ route('login') }}" />.</p>
    </x-control-panel.card.footer>
</x-control-panel.card>

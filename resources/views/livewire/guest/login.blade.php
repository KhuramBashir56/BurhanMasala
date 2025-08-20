<x-slot:background> {{ asset('images/backgrounds/login.webp') }}</x-slot>

<div class="w-full max-w-md space-y-4">
    @if (session()->has('error'))
        <x-notification type="error" message="{{ session('error') }}" />
    @endif
    <x-control-panel.card>
        <x-control-panel.card.header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" class="p-4 text-center" />
        <form wire:submit.prevent="login">
            <x-control-panel.card.body class="p-4 gap-4">
                <x-control-panel.form.label :for="__('email')" :label="__('Email')">
                    <x-control-panel.form.input :label="__('Email')" :for="__('email')" type="email" wire:model="email" placeholder="Your Email Address" autofocus maxlength="64" autocomplete="email" required />
                </x-control-panel.form.label>
                <x-control-panel.form.label :for="__('password')" :label="__('Password')">
                    <x-control-panel.form.input-password :label="__('Password')" :for="__('password')" wire:model="password" placeholder="Your Password" autocomplete="current-password" required minlength="8" maxlength="64" />
                </x-control-panel.form.label>
                <div class="flex items-center justify-between">
                    <x-control-panel.form.checkbox :label="__('Remember me')" :for="__('remember')" wire:model="remember" />
                    <x-link :title="__('Forgot password?')" wire:navigate href="{{ route('forgot-password') }}" />
                </div>
                <x-control-panel.buttons.button :title="__('Log in')" :target="__('login')" type="submit" class="w-full" />
            </x-control-panel.card.body>
        </form>
        <x-control-panel.card.footer class="p-4 justify-center">
            <p>If you don't have an account, you can <x-link :title="__('Register')" wire:navigate href="{{ route('register') }}" />.</p>
        </x-control-panel.card.footer>
    </x-control-panel.card>
</div>

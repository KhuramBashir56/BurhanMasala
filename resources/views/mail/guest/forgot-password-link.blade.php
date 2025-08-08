<x-mail.body :title="__('Password Reset Request Link')">
    <x-mail.line :content="__('You have receiving this email because we received a password reset request for your account. If you did not make this request, please ignore this email.')" />
    <x-mail.line>
        {{ __('Please do not sher this email and link with anyone. Click the ') }}
        <strong>{{ __('Reset Password') }}</strong>
        {{ __(' button below. This link will expire in next 5 minutes.') }}
    </x-mail.line>
    <x-mail.actions>
        <x-mail.button :url="$url" :title="__('Reset Password')" />
    </x-mail.actions>
    <x-mail.line>
        {{ __('If you are having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: ') }}
        <x-mail.link :url="$url" :title="$url" />
    </x-mail.line>
</x-mail.body>

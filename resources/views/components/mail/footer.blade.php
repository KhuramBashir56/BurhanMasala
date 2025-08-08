<table width="100%">
    <tr>
        <td style="text-align: center; padding: 20px 0 10px 0;">
            <x-mail.link :url="route('home')" :title="__('Home')" style="padding: 0 10px 10px 0;" />
            <x-mail.link :url="route('home')" :title="__('All Categories')" style="padding: 0 10px 10px 10px;" />
            <x-mail.link :url="route('home')" :title="__('Products')" style="padding: 0 10px; 10px 10px" />
            <x-mail.link :url="route('contact')" :title="__('Contact Us')" style="padding: 0 10px  10px 10px;" />
            <x-mail.link :url="route('home')" :title="__('About Us')" style="padding: 0 10px 10px 10px;" />
            <x-mail.link :url="route('privacy-policy')" :title="__('Privacy Policy')" style="padding: 0 10px  10px 10px;" />
            <x-mail.link :url="route('terms-and-conditions')" :title="__('Terms and Conditions')" style="padding: 0 10px; 10px 10px" />
            <x-mail.link :url="route('login')" :title="__('Login')" style="padding: 0 10px; 10px 10px" />
            <x-mail.link :url="route('register')" :title="__('Register')" style="padding: 0 10px; 10px 0" />
        </td>
    </tr>
    <tr>
        <td style="text-align: center; color: #686868; padding-bottom: 20px;">
            © 2023 - {{ date('y') }} {{ __(' All rights reserved ') . config('app.name') . '. ' . config('app.version') }}
        </td>
    </tr>
</table>

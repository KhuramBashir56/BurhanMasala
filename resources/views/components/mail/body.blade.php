@props(['title'])
<x-layouts.mail>
    <table width="100%" style="max-width: 600px; margin: 0 auto;">
        <tr>
            <td>
                <x-mail.header />
            </td>
        </tr>
        <tr>
            <td class="mail-body" style="padding: 20px 20px;">
                <table style="width: 100%;">
                    <x-mail.heading :content="$title" :heading="__('h2')" style="margin-bottom: 20px;" />
                    <x-mail.grating :content="__('Dear User')" />
                    {{ $slot }}
                    <tr>
                        <td style="text-align:justify; font-size: 16px; margin: 10px 0;">
                            <p style="text-indent: 30px; margin-bottom: 5px;">
                                {{ __('We strongly recommend that you use a strong password. Please stay safe and do not share your confidential information such as login password and OTP with anyone. We do not ask for any confidential information from the user through SMS, call, email or any other means.') }}
                            </p>
                            <p style="text-indent: 30px;">
                                {{ __('For more information, please read our ') }}
                                <x-mail.link :url="route('privacy-policy')" :title="__('Privacy Policy')" />
                                {{ __(' and ') }}
                                <x-mail.link :url="route('terms-and-conditions')" :title="__('Terms and Conditions')" />
                                {{ __('. If you have any other questions or need assistance, please ') }}
                                <x-mail.link :url="route('contact')" :title="__('contact us')" />
                                {{ __('.') }}
                            </p>
                            <p style="text-indent: 30px; margin-top: 20px; text-align: center;">
                                {{ __('Thank you for using our application!.') }}
                            </p>
                            <p style="text-indent: 30px; text-align: center;">
                                {{ __('Best regards,') }}
                            </p>
                            <p style="text-indent: 30px; font-weight: bold; text-align: center;">
                                {{ config('app.name') }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <x-mail.footer />
            </td>
        </tr>
    </table>
</x-layouts.mail>

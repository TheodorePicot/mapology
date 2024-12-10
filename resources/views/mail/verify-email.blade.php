<x-layouts.mail-layout :title="__('Verify Email Address') . ' - Mapology'" :show-unsubscribe-footer="false">
    <tr>
        <td style="padding: 20px; text-align: left; font-size: 16px; line-height: 1.5; color: #333333;">
            <h2 style="margin: 0; font-size: 20px; color: #333333;">Hi,</h2>
            <p style="margin: 15px 0; color: #555555;">
                Please click the button below to verify your email address.
            </p>
            <p style="text-align: center;">
                <a href="{{ $url }}" style="display: inline-block; padding: 12px 20px; background-color: #335248; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 14px; font-weight: bold;">
                    Verify Email Address
                </a>
            </p>
            <p style="margin: 15px 0; color: #555555;">
                If you're having trouble clicking the button, copy and paste the URL below
                into your web browser:
            </p>
            <p style="color: #555555;">
                <a href="{{ $url }}" style="text-decoration: none;">{{ $url }}</a>
            </p>
            <p style="margin: 15px 0; color: #555555;">
                If you did not create an account, no further action is required.
            </p>
            <p style="margin: 15px 0; color: #555555;">
                Thanks, <br>
                Mapology team
            </p>
        </td>
    </tr>
</x-layouts.mail-layout>

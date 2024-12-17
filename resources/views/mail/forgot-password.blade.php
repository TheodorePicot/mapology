<x-layouts.mail-layout :title="__('Reset your password') . ' - Mapology'" :show-unsubscribe-footer="false">
    <tr>
        <td style="padding: 20px; text-align: left; font-size: 16px; line-height: 1.5; color: #333333; background-color: #ffffff; border-radius: 10px;">
            <h2 style="margin: 0; font-size: 20px; color: #333333;">{{ __('Hi') }},</h2>
            <p style="margin: 15px 0; color: #555555;">
               {{ __('mail.forgot_first_line') }}
            </p>
            <p style="text-align: center;">
                <a href="{{ $url }}" style="display: inline-block; padding: 10px 16px; background-color: #335248; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 14px; font-weight: 600;">
                    {{ __('Reset password') }}
                </a>
            </p>
            <p style="margin: 15px 0; color: #555555;">
                {{ __('mail.forgot_second_line') }}
                <br>
                <a href="{{ $url }}" style="font-weight: 500; color: #6a9c89; text-decoration: none; font-size: 12px">{{ $url }}</a>
            </p>
            <p style="margin: 15px 0; color: #555555;">
                {{ __('mail.forgot_third_line', ['minutes' => round(abs($expiresAt->diffInMinutes(now())))]) }}
            </p>
            <p style="margin: 15px 0; color: #555555; font-size: 14px;">
                {{ __('mail.forgot_fourth_line') }}
            </p>
            <p style="margin: 15px 0; color: #555555;">
                {{ __('Thanks') }},<br>
                {{ __('Mapology team') }}
            </p>
        </td>
    </tr>
</x-layouts.mail-layout>

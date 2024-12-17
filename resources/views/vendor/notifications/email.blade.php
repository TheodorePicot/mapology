<x-layouts.mail-layout :title="__('Verify Email Address') . ' - Mapology'" :show-unsubscribe-footer="false">
    <tr>
        <td style="padding: 20px; text-align: left; font-size: 16px; line-height: 1.5; color: #333333; background-color: #ffffff; border-radius: 10px;">
            <h2 style="margin: 0; font-size: 20px; color: #333333;">{{ __('Hi') }},</h2>
            <p style="margin: 15px 0; color: #555555;">
                {{ __('mail.verify_first_line') }}
            </p>
            <p style="text-align: center;">
                <a href="{{ $actionUrl }}" style="display: inline-block; padding: 12px 20px; background-color: #335248; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 14px; font-weight: bold;">
                    {{ __('Verify Email Address') }}
                </a>
            </p>
            <p style="margin: 15px 0; color: #555555;">
                {{ __('mail.verify_second_line') }}
            </p>
            <p style="color: #555555;">
                <a href="{{ $actionUrl }}" style="text-decoration: none;">{{ $displayableActionUrl }}</a>
            </p>
            <p style="margin: 15px 0; color: #555555;">
                {{ __('mail.verify_third_line') }}
            </p>
            <p style="margin: 15px 0; color: #555555;">
                {{ __('Thanks') }}, <br>
                {{ __('Mapology team') }}
            </p>
        </td>
    </tr>
</x-layouts.mail-layout>

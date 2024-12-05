<x-layouts.mail-layout :title="__('Reset your password') . ' - Mapology'" :show-unsubscribe-footer="false">
    <tr>
        <td style="padding: 20px; text-align: left; font-size: 16px; line-height: 1.5; color: #333333;">
            <h2 style="margin: 0; font-size: 20px; color: #333333;">Hi,</h2>
            <p style="margin: 15px 0; color: #555555;">
                You are receiving this email because we received a password reset request for your account.
            </p>
            <p style="text-align: center;">
                <a href="{{ $url }}" style="display: inline-block; padding: 12px 20px; background-color: #335248; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 14px; font-weight: bold;">
                    Reset password
                </a>
            </p>
            <p style="margin: 15px 0; color: #555555;">
                If the button doesn't work, copy and paste this link into your browser:
                <br>
                <a href="{{ $url }}" style="font-weight: bold; color: #6a9c89; text-decoration: none;">{{ $url }}</a>
            </p>
            <p style="margin: 15px 0; color: #555555;">
                This password reset link will expire in {{ $expiresInMinutes }} minutes.
                <br>
                If you did not request a password reset, no further action is required.
            </p>
            <p style="margin: 15px 0; color: #555555;">
                Thanks, <br>
                Mapology team
            </p>
        </td>
    </tr>
</x-layouts.mail-layout>

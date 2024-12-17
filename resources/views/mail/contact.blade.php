<x-layouts.mail-layout :title="__('New message from Mapology') . ' - Mapology'" :show-unsubscribe-footer="false">
    <tr>
        <td style="padding: 20px; text-align: left; font-size: 16px; line-height: 1.5; color: #333333; background-color: #ffffff; border-radius: 10px;">
            <h2 style="margin: 0; font-size: 20px; color: #333333;">{{ __('Hi') }},</h2>
            <p style="margin: 15px 0; color: #555555;">
                {{ __('mail.contact_first_line') }}
            </p>
            <p style="margin: 15px 0; color: #555555; ">
                <span style="font-weight: 500">{{ __('Full name') }}: </span>{{ $firstName }} {{ $lastName }}
            </p>
            <p style="margin: 15px 0; color: #555555;">
               <span style="font-weight: 500">{{ __('Email address') }}: </span>{{ $email }}
            </p>
            <div style="background-color: #f4f4f4; padding: 5px 5px; border-radius: 10px">
                <p style="margin: 15px; color: #555555;">
                    {{ $userMessage }}
                </p>
            </div>
        </td>
    </tr>
</x-layouts.mail-layout>

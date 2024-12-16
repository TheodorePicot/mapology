<x-layouts.mail-layout :title="__('New message from Mapology') . ' - Mapology'" :show-unsubscribe-footer="false">
    <tr>
        <td style="padding: 20px; text-align: left; font-size: 16px; line-height: 1.5; color: #333333; background-color: #ffffff; border-radius: 10px;">
            <h2 style="margin: 0; font-size: 20px; color: #333333;">Hi,</h2>
            <p style="margin: 15px 0; color: #555555;">
                You are receiving this email because someone has contacted you through Mapology.
            </p>
            <p style="margin: 15px 0; color: #555555;">
                Name: {{ $firstName }} {{ $lastName }}
            </p>
            <p style="margin: 15px 0; color: #555555;">
                Email: {{ $email }}
            </p>
            <p style="margin: 15px 0; color: #555555;">
                {{ $userMessage }}
            </p>
            <p style="margin: 15px 0; color: #555555;">
                Thanks, <br>
                Mapology team
            </p>
        </td>
    </tr>
</x-layouts.mail-layout>

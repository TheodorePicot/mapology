<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name').' Email' }}</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f9f9f9; font-family: Arial, sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f9f9f9; margin: 0; padding: 0;">
    <tr>
        <td align="center">
            <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; margin: 20px auto; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                <!-- Header -->
                <tr>
                    <td align="center" style="padding: 10px;">
                        Mapology
                    </td>
                </tr>

                <!-- Body -->
                {{ $slot }}


                <!-- Footer -->
                <tr>
                    <td style="padding: 20px; font-size: 12px; text-align: center; color: #777777;">
                        @if ($showUnsubscribeFooter)
                            <p style="margin: 0;">
                                This email was sent to
                                <a href="mailto:contact@merakiui.com" style="color: #007bff; text-decoration: none;">{{ $email }}</a>.
                                If you'd rather not receive this kind of email, you can
                                <a href="#" style="color: #007bff; text-decoration: none;">unsubscribe</a> or
                                <a href="#" style="color: #007bff; text-decoration: none;">manage your email preferences</a>.
                            </p>
                        @endif
                        <p style="margin: 15px 0 0;">
                            &copy; <span style="color: #333333;">2024</span> Meraki UI. All Rights Reserved.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

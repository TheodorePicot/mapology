<!DOCTYPE html>
<html lang="fr" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <title>{{ $title }}</title>
</head>
<div style="margin: 0; padding: 0; width: 100%; word-break: break-word; -webkit-font-smoothing: antialiased; background-color: #dcebe4;">
    <div aria-roledescription="email">
        <table style="width: 100%; font-family: ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif;" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td align="center" class="bg-gray-100">
                    <table class="w-full" style="width: 100%; max-width: 600px;" cellpadding="0" cellspacing="0" role="presentation">
                        <tr>
                            <td style="padding: 20px; text-align: center; font-size: 20px">
                                Mapology
                            </td>
                        </tr>
                        {{ $slot }}
                        <tr>
                            <td style="padding: 20px; text-align: center; color: #374151; font-size: 12px;">
                                @if ($showUnsubscribeFooter)
                                    <p style="margin-bottom: 5px;">
                                        This email was sent to
                                        <a href="mailto:contact@mapology.eu" style="color: #007bff; text-decoration: none;">{{ $email }}</a>.
                                        If you'd rather not receive this kind of email, you can
                                        <a href="#" style="color: #007bff; text-decoration: none;">unsubscribe</a> or
                                        <a href="#" style="color: #007bff; text-decoration: none;">manage your email preferences</a>.
                                    </p>
                                @endif
                                <p>
                                    &copy; <span style="color: #333333;">2024</span> Mapology. All Rights Reserved.
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
</html>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>Reset Your Password</title>
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <style>
        /* Client-specific resets & general styles */
        body,
        table,
        td,
        p,
        a {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            line-height: 1.5;
        }

        body {
            background-color: #f4f7fb;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            text-size-adjust: 100%;
        }

        /* Main container */
        .email-container {
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        /* Responsive inner spacing */
        @media only screen and (max-width: 600px) {
            .inner-padding {
                padding-left: 24px !important;
                padding-right: 24px !important;
            }

            .button {
                width: 100% !important;
                display: block !important;
                text-align: center !important;
            }

            .stack-cell {
                display: block !important;
                width: 100% !important;
                text-align: center !important;
            }
        }

        /* Button styling */
        .btn-primary {
            background-color: #1a73e8;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            padding: 12px 28px;
            color: #ffffff !important;
            font-size: 16px;
            text-align: center;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #1557b0;
        }

        /* Outlook button fix */
        .btn-primary td,
        .btn-primary div {
            background-color: #1a73e8;
            border-radius: 8px;
        }

        /* Text styles */
        .text-muted {
            color: #5f6c80;
            font-size: 14px;
        }

        .text-small {
            font-size: 13px;
            line-height: 1.4;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .divider {
            border-top: 1px solid #e6edf4;
            margin: 24px 0;
        }

        .footer-links {
            color: #6c757d;
            text-decoration: none;
        }

        h1 {
            font-size: 28px;
            font-weight: 700;
            color: #1e2a3e;
            margin-top: 0;
            margin-bottom: 12px;
        }

        h2 {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
            margin: 0 0 12px;
        }
    </style>
</head>

<body style="margin: 0; padding: 24px 12px; background-color: #f4f7fb;">
    <center style="width: 100%; table-layout: fixed;">
        <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation"
            style="max-width: 600px; width: 100%; margin: 0 auto;">
            <tr>
                <td align="center" style="padding: 0;">
                    <!-- Main email container -->
                    <div class="email-container"
                        style="background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 8px 20px rgba(0,0,0,0.05);">

                        <!-- Header / Logo Area -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation"
                            style="background: linear-gradient(135deg, #ffffff 0%, #f9fcff 100%); border-bottom: 1px solid #eef2f8;">
                            <tr>
                                <td align="center" style="padding: 32px 32px 24px 32px;" class="inner-padding">
                                    <!-- Logo placeholder - replace with your actual logo asset or text -->
                                    <div style="display: inline-block;">
                                        <span
                                            style="font-size: 28px; font-weight: 700; color: #1a73e8; letter-spacing: -0.5px;">🔐
                                            Secure</span>
                                        <span style="font-size: 28px; font-weight: 500; color: #2c3e50;">Portal</span>
                                    </div>
                                    <!-- optional tagline: <p style="color:#7f8c8d; margin:4px 0 0; font-size:14px;">Account security center</p> -->
                                </td>
                            </tr>
                        </table>

                        <!-- Main Content -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td align="center" style="padding: 32px 32px 24px 32px;" class="inner-padding">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                        role="presentation">
                                        <!-- Greeting -->
                                        <tr>
                                            <td align="left" style="padding-bottom: 20px;">
                                                <h1
                                                    style="margin: 0 0 8px 0; font-size: 28px; font-weight: 700; color:#1e2a3e;">
                                                    Reset password</h1>
                                                <p style="font-size: 16px; color: #3a4a66; margin: 0;">
                                                    Hello <strong>{{ $userName ?? ($email ?? 'there') }}</strong>,
                                                </p>
                                            </td>
                                        </tr>

                                        <!-- Main message -->
                                        <tr>
                                            <td align="left" style="padding-bottom: 20px;">
                                                <p style="font-size: 16px; color: #2d3e5f; margin: 0 0 12px 0;">
                                                    We received a request to reset the password for your account. Click
                                                    the button below to choose a new password.
                                                </p>
                                                <p style="font-size: 16px; color: #2d3e5f; margin: 0;">
                                                    If you didn’t request this, you can safely ignore this email – your
                                                    password will not be changed.
                                                </p>
                                            </td>
                                        </tr>

                                        <!-- Button Row (with Outlook safe fallback) -->
                                        <tr>
                                            <td align="center" style="padding: 16px 0 24px 0;">
                                                <!--[if mso]>
                                                <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ $resetUrl }}" style="height:48px;v-text-anchor:middle;width:240px;" arcsize="12%" stroke="f" fillcolor="#1a73e8">
                                                    <w:anchorlock/>
                                                    <center style="color:#ffffff;font-family:sans-serif;font-size:16px;font-weight:600;">Reset password</center>
                                                </v:roundrect>
                                                <![endif]-->
                                                <!--[if !mso]><!-- -->
                                                <a href="{{ $resetUrl }}" class="btn-primary"
                                                    style="background-color: #1a73e8; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block; padding: 12px 28px; color: #ffffff; font-size: 16px; text-align: center; border: 1px solid #1a73e8; transition: background 0.2s;">
                                                    Reset password
                                                </a>
                                                <!--<![endif]-->
                                            </td>
                                        </tr>

                                        <!-- Expiration & security note -->
                                        <tr>
                                            <td align="left" style="padding-bottom: 20px;">
                                                <div
                                                    style="background-color: #f8fafd; border-left: 4px solid #1a73e8; padding: 14px 18px; border-radius: 8px;">
                                                    <p
                                                        style="margin: 0 0 6px 0; font-size: 14px; color: #2c3e50; font-weight: 500;">
                                                        ⏱️ Link expiration
                                                    </p>
                                                    <p style="margin: 0; font-size: 14px; color: #4a5b7a;">
                                                        This password reset link will expire in
                                                        <strong>{{ $expireMinutes ?? 60 }}</strong> minutes for your
                                                        security.
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Fallback plain link (for email clients that block buttons) -->
                                        <tr>
                                            <td align="left" style="padding-bottom: 16px;">
                                                <p class="text-muted"
                                                    style="color: #5f6c80; font-size: 13px; margin: 0;">
                                                    If the button above doesn’t work, copy and paste this link into your
                                                    browser:<br>
                                                    <a href="{{ $resetUrl }}"
                                                        style="color: #1a73e8; word-break: break-all; text-decoration: underline;">{{ $resetUrl }}</a>
                                                </p>
                                            </td>
                                        </tr>

                                        <!-- Divider -->
                                        <tr>
                                            <td align="left">
                                                <div class="divider"
                                                    style="border-top: 1px solid #e6edf4; margin: 8px 0 20px;"></div>
                                            </td>
                                        </tr>

                                        <!-- Support & help text -->
                                        <tr>
                                            <td align="left" style="padding-bottom: 12px;">
                                                <p class="text-small"
                                                    style="font-size: 13px; color: #5f6c80; margin: 0;">
                                                    Need help? Contact our <a href="{{ config('app.url') }}/support"
                                                        style="color: #1a73e8; text-decoration: none;">support team</a>
                                                    or visit our Help Center.
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <!-- Footer -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation"
                            style="background-color: #fafcff; border-top: 1px solid #eef2f8;">
                            <tr>
                                <td align="center" style="padding: 24px 32px 32px 32px;" class="inner-padding">
                                    <p style="margin: 0 0 12px 0; font-size: 13px; color: #7b8ba3;">
                                        &copy; {{ date('Y') }} {{ config('app.name', 'Your Company') }}. All rights
                                        reserved.
                                    </p>
                                    <p style="margin: 0; font-size: 12px; color: #8a9bb0;">
                                        You received this email because a password reset was requested for your account.
                                        If you did not request this, please ignore it.
                                    </p>
                                    <p style="margin: 16px 0 0 0; font-size: 12px;">
                                        <a href="{{ config('app.url') }}"
                                            style="color: #7b8ba3; text-decoration: none;">{{ config('app.url') }}</a>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- end .email-container -->
                </td>
            </tr>
        </table>
    </center>
</body>

</html>

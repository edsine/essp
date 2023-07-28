<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito:700" />
    <!-- Web Font / @font-face : BEGIN -->
    <!--[if mso]>
        <style>
            * {
                font-family: 'Roboto', sans-serif !important;
            }
        </style>
    <![endif]-->

    <!--[if !mso]>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
    <![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset : BEGIN -->


    <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'Roboto', sans-serif !important;
            font-size: 16px;
            margin-bottom: 10px;
            line-height: 24px;
            color: #8094ae;
            font-weight: 400;
        }

        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }

        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        table table table {
            table-layout: auto;
        }

        a {
            text-decoration: none;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }
    </style>

</head>

<body width="100%"
    style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f6fa;">
    <center style="width: 100%; background-color: #f5f6fa;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
            <tr>
                <td style="padding: 40px 0;">
                    <table style="width:100%;max-width:620px;margin:0 auto;">
                        <tbody>
                            <tr>
                                <td style="text-align: center; padding-bottom:25px">
                                    <a href="#"><img
                                            style="width: 125px !important;height: 125px !important;max-height: 125px !important;"
                                            src="{{ $message->embed('./assets/images/NSITF-logo.png') }}"
                                            alt="logo"></a>
                                    <p
                                        style="font-size: 1.5rem; font-family: Nunito, sans-serif; font-weight: 700; line-height: 1.2; color: #364a63; padding-top: 12px;">
                                        Nigeria Social Insurance Trust Fund<br />Employer Self
                                        Service Portal</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                        <tbody>
                            <tr>
                                <td style="padding: 30px 30px 20px">
                                    <p style="margin-bottom: 10px;">Hi {{ $employer->company_name }},</p>
                                    <p style="margin-bottom: 10px;">Welcome to the NSITF Employee Self-Service Portal!
                                    </p>
                                    <p style="margin-bottom: 10px;">We are pleased to have you on board. Your account is
                                        now verified and ready for use. You
                                        can proceed now to <a style="color: #0fac81; text-decoration:none;"
                                            target="_blank" href="https://essp.nsitf.gov.ng">log in here</a> with
                                        credentials below.</p>
                                    <p style="margin-bottom: 10px;">
                                        Username: {{ $employer->company_email }} <b>[OR]</b> {{ $employer->ecs_number }}<br>
                                        Password: {{ $password }}
                                    </p>
                                    <p style="margin-bottom: 10px;">Once you are logged in, you will be able to access
                                        the following features:
                                    <ul style="padding-left: 20px;">
                                        <li>View and update your employee records</li>
                                        <li>Make Contributions</li>
                                        <li>File for Claims and Compensations</li>
                                        <li>Contact Support</li>
                                    </ul>
                                    </p>
                                    <br />
                                    <p style="margin-bottom: 15px;">We hope you find the portal to be a convenient and
                                        easy-to-use resource. If you have any questions, please do not hesitate to
                                        contact us at <a style="color: #0fac81; text-decoration:none;"
                                            href="mailto:info@nsitf.gov.ng">info@nsitf.gov.ng</a>, or visit our website
                                        at <a style="color: #0fac81; text-decoration:none;" target="_blank"
                                            href="https://nsitf.gov.ng">www.nsitf.gov.ng</a> anytime. </p>
                                    <p></p><br />

                                    <p>
                                        Sincerely,<br />
                                        {{ env('APP_NAME') }} Team
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width:100%;max-width:620px;margin:0 auto;">
                        <tbody>
                            <tr>
                                <td style="text-align: center; padding:25px 20px 0;">
                                    <p style="font-size: 13px;">Copyright © 2023 P2E Technologies. All rights
                                        reserved.
                                        <br> {{-- Template Made By <a style="color: #0fac81; text-decoration:none;" href="https://themeforest.net/user/softnio/portfolio">Softnio</a>. --}}
                                    </p>
                                    {{-- <ul style="margin: 10px -4px 0;padding: 0;">
                                        <li style="display: inline-block; list-style: none; padding: 4px;"><a style="display: inline-block; height: 30px; width:30px;border-radius: 50%; background-color: #ffffff" href="#"><img style="width: 30px" src="images/brand-b.png" alt="brand"></a></li>
                                        <li style="display: inline-block; list-style: none; padding: 4px;"><a style="display: inline-block; height: 30px; width:30px;border-radius: 50%; background-color: #ffffff" href="#"><img style="width: 30px" src="images/brand-e.png" alt="brand"></a></li>
                                        <li style="display: inline-block; list-style: none; padding: 4px;"><a style="display: inline-block; height: 30px; width:30px;border-radius: 50%; background-color: #ffffff" href="#"><img style="width: 30px" src="images/brand-d.png" alt="brand"></a></li>
                                        <li style="display: inline-block; list-style: none; padding: 4px;"><a style="display: inline-block; height: 30px; width:30px;border-radius: 50%; background-color: #ffffff" href="#"><img style="width: 30px" src="images/brand-c.png" alt="brand"></a></li>
                                    </ul> --}}
                                    {{--                                     <p style="padding-top: 15px; font-size: 12px;">This email was sent to you as a registered user of <a style="color: #0fac81; text-decoration:none;" href="https://softnio.com">softnio.com</a>. To update your emails preferences <a style="color: #0fac81; text-decoration:none;" href="#">click here</a>.</p>
 --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>

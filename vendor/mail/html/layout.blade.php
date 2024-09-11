<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        li {
            font-size: 0.9rem
        }
        li a {
            font-size: 0.9rem
        }
        li p {
            margin-bottom: 0px
        }
        ul > li {
            margin-bottom: 16px;
        }
        ul ul > li {
            margin-bottom: 0;
        }
        ul > li:last-child {
            margin-bottom: 0;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 700
        }

        h1 {
            font-size: 1.75rem;
            line-height: 1.1
        }

        h2 {
            font-size: 1.5rem;
            line-height: 1.1
        }

        h3 {
            font-size: 1.25rem;
            line-height: 1.25
        }

        h4 {
            font-size: 1.125rem
        }

        p {
            font-size: 0.9rem
        }

        .lead {
            font-size: 1.375rem;
            line-height: 1.3
        }

        small {
            font-size: .75rem
        }

        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                {{ $header ?? '' }}

                <!-- Email Body -->
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0" style="border: hidden !important;">
                        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                               role="presentation">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell">
                                    {{ Illuminate\Mail\Markdown::parse($slot) }}

                                    {{ $subcopy ?? '' }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                {{ $footer ?? '' }}
            </table>
        </td>
    </tr>
</table>
</body>
</html>

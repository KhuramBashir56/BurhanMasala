<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body,
        body *:not(html):not(style):not(br):not(tr):not(code) {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            padding: 0;
            margin: 0;
        }

        .mail-body {
            background-color: #fff !important;
            border: 3px solid #f97316 !important;
            border-radius: 16px !important;
        }

        .footer-link:hover {
            color: #f97316 !important;
            text-decoration: underline 2px !important;
        }

        .action-button:hover {
            background-color: #d15903 !important;
        }
    </style>
</head>

<body style="background-color: #f3f4f6; width: 100%;">
    {{ $slot }}
</body>

</html>

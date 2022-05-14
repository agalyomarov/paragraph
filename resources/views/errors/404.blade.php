<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        * {
            margin: 0;
            padding: 0;
            border: 0 solid transparent;
        }

        html {
            -webkit-text-size-adjust: 100%;
        }

        body {
            min-height: 100vh;
            line-height: 1;
            text-rendering: optimizeSpeed;
        }

        img,
        svg,
        video,
        canvas,
        audio,
        iframe,
        embed,
        object {
            display: block;
            max-width: 100%;
        }

        input,
        button,
        textarea,
        select {
            font: inherit;
            line-height: inherit;
            color: inherit;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        button,
        [role="button"] {
            cursor: pointer;
            background-color: transparent;
            -webkit-tap-highlight-color: transparent;
        }

        a {
            cursor: pointer;
            color: inherit;
            text-decoration: inherit;
            -webkit-tap-highlight-color: transparent;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit;
        }

        ol,
        ul {
            list-style: none;
        }

        [type="date"],
        [type="datetime"],
        [type="datetime-local"],
        [type="email"],
        [type="month"],
        [type="number"],
        [type="password"],
        [type="search"],
        [type="tel"],
        [type="text"],
        [type="time"],
        [type="url"],
        [type="week"],
        textarea,
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 100%;
        }

        ::-moz-placeholder {
            opacity: 1;
        }

        textarea {
            vertical-align: top;
            overflow: auto;
        }

        [type="checkbox"],
        [type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        @media (prefers-reduced-motion: reduce) {
            html:focus-within {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        .wrapper {
            width: 100vw;
            height: 100vh;
            background-color: #fff;
        }

        .wrapper .content {
            width: 240px;
            height: 100vh !important;
            background-color: #fff;
            margin: 0 auto;
            padding-top: 5%;
        }

        .wrapper .content span.alert {
            font-family: CustomSansSerif, 'Lucida Grande', Arial, sans-serif;
            font-weight: 700;
            font-size: 120px;
            color: #79828B;
            text-align: center;
            display: block;
        }

        .wrapper .content span.message {
            display: block;
            font-family: CustomSansSerif, 'Lucida Grande', Arial, sans-serif;
            font-weight: 400;
            font-size: 16px;
            color: #79828B;
            text-align: center;
            margin-top: 20px;
        }

        .wrapper .content a.link {
            font-family: CustomSansSerif, 'Lucida Grande', Arial, sans-serif;
            font-weight: 600;
            font-style: normal;
            font-size: 17px;
            color: #000;
            text-decoration: none;
            border: 2px solid #333;
            border-radius: 16px;
            text-transform: uppercase;
            padding: 4px 12px;
            margin: 0 0 15px;
            background-color: #fff;
            cursor: pointer;
            display: block;
            text-align: center;
            margin-top: 50px;
        }

    </style>

</head>

<body>
    <div class="wrapper">
        <div class="content">
            <span class="alert">404</span>
            <span class="message">Страница не существует</span>
            <a href="/" class="link">СОЗДАВАТЬ НОВОЕ</a>
        </div>
    </div>
</body>

</html>

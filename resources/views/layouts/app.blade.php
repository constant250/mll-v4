<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Melbourne Legal Lawyers') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">

    <!-- Styles -->
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="top" :class="{ 'mac': isMac, 'windows-os': isWindows }">
        <main role="main">
            @yield('content')
        </main>
    </div>

    <script>
        // Detect OS
        const isMac = navigator.platform.indexOf("Mac") > -1;
        const isWindows = navigator.platform.indexOf("Win") > -1;
        
        if (isMac) {
            document.body.classList.add('mac');
        } else if (isWindows) {
            document.body.classList.add('windows-os');
        }
    </script>
</body>
</html>


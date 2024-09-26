<!DOCTYPE html>
<html lang="en" dir="ltr"
      x-data="{ darkMode: false }" x-bind:class="{'dark' : darkMode === true}"
      x-init="
        if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            localStorage.setItem('darkMode', JSON.stringify(true));
        }
        darkMode = JSON.parse(localStorage.getItem('darkMode'));
        $watch('darkMode', value => {
            localStorage.setItem('darkMode', JSON.stringify(value));
            window.dispatchEvent(new CustomEvent('theme-changed')); // Dispatch event when darkMode changes
        });
      ">
<script defer data-domain="vamsys.io" src="https://plausible.vamsys.dev/js/script.js"></script>
<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <title>{{ $title ?? 'vAMSYS' }}</title>

    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="svg" href="/favicon/favicon-light.svg" media="(prefers-color-scheme: light)">
    <link rel="icon" type="svg" href="/favicon/favicon-dark.svg" media="(prefers-color-scheme: dark)">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#ca2127">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    @livewireStyles
    @filamentStyles
    @turnstileScripts()
    @vite(['resources/assets/scss/app.scss', 'resources/assets/scss/icons.scss'])
</head>

<body class="relative flex flex-col">

{{ $slot }}

<footer class="absolute bottom-0 inset-x-0">
    <p class="font-medium text-center p-6">
        <script>document.write(new Date().getFullYear())</script> © <a href="https://vamsys.co.uk">vAMSYS</a>
    </p>
    <span id="zuluClock"></span>
</footer>

@include('components.layouts.partials.scripts')

</body>

</html>

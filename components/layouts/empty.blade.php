<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      data-layout-width="boxed"
      data-layout-position="fixed"
      data-topbar-color="light"
      data-menu-color="light"
      data-sidenav-view="default"
      data-sidenav-open="true"
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
      "
>

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
    @vite(['resources/assets/scss/app.scss', 'resources/assets/scss/icons.scss'])
</head>

<body>
<script>0</script>
<div class="flex wrapper">
{{--    @include('components.layouts.partials.sidebar')--}}
    <div class="page-content">

        @include('components.layouts.partials.topbar')

        <main class="p-4">
            {{ $slot }}
        </main>

        @include('components.layouts.partials.footer')

    </div>
</div>
{{--<livewire:global.socket-actions />--}}

@include('components.layouts.partials.scripts')
</body>

</html>

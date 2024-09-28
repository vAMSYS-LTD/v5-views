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
    <link rel="stylesheet" href="/css/awcodes/tiptap-editor/tiptap.css">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    @livewireStyles
    @filamentStyles
    @vite(['resources/assets/scss/app.scss', 'resources/assets/scss/icons.scss'])
    @stack('styles')
</head>

<body>
@if(Request::routeIs('phoenix*') && $airline && $airline->design)
    @php
        $color = $airline->design->colors;
    @endphp
    @if(is_array($color))
        <style>
            html[data-menu-color=light] {
                @if($color['menu_bg_light'])
--tw-menu-bg: {{ $color['menu_bg_light'] }};
                @endif
                @if($color['menu_item_light'])
--tw-menu-item-color: {{ $color['menu_item_light'] }};
                @endif
                @if($color['menu_active_light'])
--tw-menu-item-active-color: {{ $color['menu_active_light'] }};
                @endif
                @if($color['menu_hover_light'])
--tw-menu-item-hover-color: {{ $color['menu_hover_light'] }};
            @endif
}

            html:is(.dark[data-menu-color=dark], .dark[data-menu-color=light]) {
                @if($color['menu_bg_dark'])
--tw-menu-bg: {{ $color['menu_bg_dark'] }};
                @endif
                @if($color['menu_item_dark'])
--tw-menu-item-color: {{ $color['menu_item_dark'] }};
                @endif
                @if($color['menu_active_dark'])
--tw-menu-item-active-color: {{ $color['menu_active_dark'] }};
                @endif
                @if($color['menu_hover_dark'])
--tw-menu-item-hover-color: {{ $color['menu_hover_dark'] }};
            @endif
}

            html[data-topbar-color=light] {
                @if($color['topbar_bg_light'])
--tw-topbar-bg: {{ $color['topbar_bg_light'] }};
                @endif
                @if($color['menu_item_light'])
--tw-topbar-item-color: {{ $color['menu_item_light'] }};
                @endif
                @if($color['menu_active_light'])
--tw-topbar-item-active-color: {{ $color['menu_active_light'] }};
                @endif
                @if($color['menu_hover_light'])
--tw-topbar-item-hover-color: {{ $color['menu_hover_light'] }};
            @endif
}
            html:is(.dark[data-topbar-color=light], [data-topbar-color=dark]) {
                @if($color['topbar_bg_dark'])
--tw-topbar-bg: {{ $color['topbar_bg_dark'] }};
                @endif
                @if($color['menu_item_dark'])
--tw-topbar-item-color: {{ $color['menu_item_dark'] }};
                @endif
                @if($color['menu_active_dark'])
--tw-topbar-item-active-color: {{ $color['menu_active_dark'] }};
                @endif
                @if($color['menu_hover_dark'])
--tw-topbar-item-hover-color: {{ $color['menu_hover_dark'] }};
            @endif
}

            @if($color['menu_item_light'])
                .light-theme{
                color: {{ $color['menu_item_light'] }};
            }
            @endif

                @if($color['menu_item_dark'])
                .light-theme:is(.dark *){
                color: {{ $color['menu_item_dark'] }};
            }
            @endif

                @if($color['body_bg_light'] || $color['body_color_light'])
                :root {
                @if($color['body_bg_light'])
--tw-body-bg: {{ $color['body_bg_light'] }};
                @endif
                @if($color['body_color_light'])
--tw-body-color: {{ $color['body_color_light'] }};
            @endif
}
            @endif

                @if($color['body_bg_dark'] || $color['body_color_dark'])
                :root:is(.dark) {
                @if($color['body_bg_dark'])
--tw-body-bg: {{ $color['body_bg_dark'] }};
                @endif
                @if($color['body_color_dark'])
--tw-body-color: {{ $color['body_color_dark'] }};
            @endif
}
            @endif

                @if($color['card_bg_light'])
                    .card {
                background-color: {{ $color['card_bg_light'] }};
            }
            .striped-table table thead {
                --tw-bg-opacity: 1;
                background-color: {{ $color['card_bg_light'] }};
            }
            .fi-ta-content table thead tr {
                background-color: {{ $color['card_bg_light'] }} !important;
            }
            .fi-pagination {
                background-color: {{ $color['card_bg_light'] }} !important;
            }
            @endif

                @if($color['card_bg_dark'])
                    .card:is(.dark *) {
                background-color: {{ $color['card_bg_dark'] }};
            }
            .striped-table table thead:is(.dark *) {
                background-color: {{ $color['card_bg_dark'] }};
            }
            .fi-ta-content table thead tr:is(.dark *) {
                background-color: {{ $color['card_bg_dark'] }} !important;
            }
            .fi-pagination {
                background-color: {{ $color['card_bg_dark'] }} !important;
            }
            @endif

                @if($color['card_title_light'])
                .card-title {
                color: {{ $color['card_title_light'] }};
            }
            @endif
                @if($color['card_title_dark'])
                .card-title:is(.dark *) {
                color: {{ $color['card_title_dark'] }};
            }
            @endif

                @if($color['table_odd_light'])
                    .fi-ta-content table tbody tr {
                background-color: {{ $color['table_odd_light'] }};
            }
            .striped-table table tbody tr {
                background-color: {{ $color['table_odd_light'] }};
            }
            @endif

                 @if($color['table_even_light'])
                    .fi-ta-content table tbody tr:nth-child(2n) {
                background-color: {{ $color['table_even_light'] }};
            }
            .striped-table table tbody tr:nth-child(2n) {
                background-color: {{ $color['table_even_light'] }};
            }
            @endif

                @if($color['table_odd_dark'])
                    .fi-ta-content table tbody tr:is(.dark *) {
                background-color: {{ $color['table_odd_dark'] }};
            }
            .striped-table table tbody tr:is(.dark *) {
                background-color: {{ $color['table_odd_dark'] }};
            }
            @endif

                 @if($color['table_even_dark'])
                    .fi-ta-content table tbody tr:nth-child(2n):is(.dark *) {
                background-color: {{ $color['table_even_dark'] }};
            }
            .striped-table table tbody tr:nth-child(2n):is(.dark *) {
                background-color: {{ $color['table_even_dark'] }};
            }
            @endif

        </style>
    @endif
    @if($airline->design->stylesheet)
        <!-- START Custom Stylesheet for {{ $airline->name }} -->
        <style id="custom-va-style"></style>
        <script>
            var xhtp = new XMLHttpRequest();
            xhtp.open("GET", '{{ Storage::disk('do_spaces')->url($airline->design->stylesheet) }}');
            xhtp.setRequestHeader("Content-Type","text/plain");
            xhtp.onload = function(){
                let styleTag = document.getElementById('custom-va-style');
                if (styleTag) {
                    styleTag.textContent += this.responseText;
                }
            };
            xhtp.send();
        </script>
        <!-- END Custom Stylesheet for {{ $airline->name }} -->
    @endif
@endif
<div class="flex wrapper">
    <livewire:components.navigation.sidebar />

    <div class="page-content">

        @include('components.layouts.partials.topbar')

        <main class="w-full {{ isset($removeMainPadding)?'flex flex-grow p-0':'p-4' }}">
            {{ $slot }}
        </main>

        @include('components.layouts.partials.footer')

    </div>
</div>

<livewire:global.socket-actions />

@if(Request::routeIs('phoenix*'))
<livewire:global.pilot.set-hub-standalone-action />
@endif

@include('components.layouts.partials.scripts')
</body>

</html>

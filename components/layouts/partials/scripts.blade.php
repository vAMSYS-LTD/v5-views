{{--<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"--}}
{{--      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="--}}
{{--      crossorigin="" />--}}
{{--<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"--}}
{{--        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="--}}
{{--        crossorigin=""></script>--}}
{{--<script src="https://unpkg.com/protomaps-leaflet@latest/dist/protomaps-leaflet.min.js"></script>--}}
{{--<script src=" https://cdn.jsdelivr.net/npm/leaflet-hotline@0.4.0/dist/leaflet.hotline.min.js "></script>--}}
{{--<script src="/assets/js/mapTheme.js" defer></script>--}}
{{--<link href="https://api.mapbox.com/mapbox-gl-js/v3.5.1/mapbox-gl.css" rel="stylesheet">--}}
{{--<script src="https://api.mapbox.com/mapbox-gl-js/v3.5.1/mapbox-gl.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl-leaflet/0.0.16/leaflet-mapbox-gl.js"--}}
{{--        integrity="sha512-BQqMTQdfBhdgBOCbIYV1vJORFvFdFn2MFF4vUtdREqrDRINNX0An1zsxclHp+CE3IjDCbirOaav9VMwUjXx+qg=="--}}
{{--        crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--<script src='https://unpkg.com/leaflet.repeatedmarkers@latest/Leaflet.RepeatedMarkers.js'></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/leaflet.geodesic"></script>--}}

{{--<script type="text/javascript"  src="https://cdn.jsdelivr.net/npm/mapbox-pmtiles@1/dist/mapbox-pmtiles.umd.min.js"></script>--}}

@filamentScripts
@livewire('notifications')
@livewireScriptConfig
<!-- App Js -->
@vite(['resources/assets/js/app.js', 'resources/assets/js/maps.js', 'resources/assets/js/swiper.js'])
<script src="/assets/js/simplebar.js"></script>
<script src="/assets/js/frostui.js"></script>
<script src="/assets/js/config.js"></script>
<script src="/assets/js/attex.js"></script>
@stack('scripts')
<script>
    document.addEventListener('livewire:navigated', () => {
        const element = document.documentElement; // Refers to the <html> element

        if (element.classList.contains('sidenav-enable')) {
            element.classList.remove('sidenav-enable');
        }
    })
</script>

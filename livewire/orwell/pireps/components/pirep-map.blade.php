<div wire:ignore class="w-full relative">
    <div id="mapSpinner" class="absolute rounded inset-0 grid place-content-center bg-black bg-opacity-50 z-50">
        <div class="flex items-center justify-center h-screen">
            <div class="relative">
                <div class="h-24 w-24 rounded-full border-t-8 border-b-8 border-gray-200"></div>
                <div class="absolute top-0 left-0 h-24 w-24 rounded-full border-t-8 border-b-8 border-blue-500 animate-spin">
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore class="rounded h-[400px] w-full z-0 mb-4" id="map"></div>
</div>

@push('scripts')
    <script>
        function initializeMap() {
            const mapElement = document.getElementById('map');
            if (mapElement) {
                window.mapController = new window.MapController('map', {
                    viewPirepMap: true
                });
                document.getElementById('mapSpinner').classList.remove('hidden');
            }
        }

        function fetchAndAddMapData() {
            Livewire.find('{{ $this->getId() }}').call('fetchMapData').then(({ polyline, airports, pilotRouteLine, companyRouteLine }) => {
                window.mapController.renderPolyline(polyline);
                window.mapController.renderAirports(airports);
                window.mapController.renderRoutePolylines(pilotRouteLine, companyRouteLine);
                // setTimeout(() => {
                //     window.mapController.map.resize();
                //     window.mapController.forceRepaint();  // Force repaint
                    document.getElementById('mapSpinner').classList.add('hidden');

                // }, 500); // Delay to ensure map container is updated
            }).then(() => {
                // window.dispatchEvent(new Event('resize'));
            }).catch(error => {
                console.error('Error fetching map data:', error);
                document.getElementById('mapSpinner').classList.add('hidden');
            });
        }

        document.addEventListener('livewire:navigated', () => {
            initializeMap();
            fetchAndAddMapData();
        }, { once: true });
    </script>
@endpush

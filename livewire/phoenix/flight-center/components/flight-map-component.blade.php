<div class="relative mb-4">
    <div wire:ignore id="mapSpinner" class="absolute rounded inset-0 grid place-content-center bg-black bg-opacity-50 z-50">
        <div class="flex items-center justify-center h-screen">
            <div class="relative">
                <div class="h-24 w-24 rounded-full border-t-8 border-b-8 border-gray-200"></div>
                <div class="absolute top-0 left-0 h-24 w-24 rounded-full border-t-8 border-b-8 border-blue-500 animate-spin">
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore id="map" class="flex relative flex-grow z-0 h-96 card"></div>
</div>

@push('scripts')
    @script
    <script>
        document.addEventListener('livewire:navigated', () => {
            const mapElement = document.getElementById('map');
            if (mapElement) {
                window.mapController = new window.MapController('map', {
                    viewBookingMap: true
                });
            }
            window.mapController.getBookingMapData($wire);
            // window.mapController.registerButtonActionsForBookFlightMap();
            window.dispatchEvent(new Event('resize'));
            // document.getElementById('sidebar-close').addEventListener('click', () => {
            //     window.mapController.closeSidebar()
            // });
        }, { once: true });
    </script>
    @endscript
@endpush

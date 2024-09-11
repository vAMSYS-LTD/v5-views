<div>
    <div class="grid grid-cols-5 mb-4 space-x-4">
        <div class="col-span-3">
            <livewire:vds.resources.stands.stand-index-stand-group-table :airport-id="$airport->id" />
        </div>
        <div wire:ignore class="col-span-2 relative flex flex-grow h-full">
            <div id="mapSpinner" class="absolute rounded inset-0 grid place-content-center bg-black bg-opacity-50 z-50 h-full">
                <div class="flex items-center justify-center h-screen">
                    <div class="relative">
                        <div class="h-24 w-24 rounded-full border-t-8 border-b-8 border-gray-200"></div>
                        <div class="absolute top-0 left-0 h-24 w-24 rounded-full border-t-8 border-b-8 border-blue-500 animate-spin">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-grow relative">
                <div id="map" class="flex rounded shadow relative flex-grow z-0"></div>
            </div>
        </div>
    </div>
    <div>
        <livewire:vds.resources.stands.stand-index-stand-table :airport-id="$airport->id" />
    </div>
</div>

@push('scripts')
    @script
    <script>
        document.addEventListener('livewire:navigated', () => {
            const mapElement = document.getElementById('map');
            if (mapElement) {
                window.mapController = new window.MapController('map', {
                    standMap: true
                });
            }

            window.mapController.getStandMapData($wire);
            // window.mapController.registerButtonActionsForBookFlightMap();
            window.dispatchEvent(new Event('resize'));
            // document.getElementById('sidebar-close').addEventListener('click', () => {
            //     window.mapController.closeSidebar()
            // });
        }, { once: true });
    </script>
    @endscript
@endpush

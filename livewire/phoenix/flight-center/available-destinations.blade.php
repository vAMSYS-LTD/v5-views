<div class="flex relative flex-col flex-grow -p-4 z-0">
    <form wire:submit="create">
        <div class="card rounded-none p-4">
            {{ $this->form }}
        </div>
    </form>
    <x-filament-actions::modals />

    <div wire:ignore id="mapSpinner" class="absolute rounded inset-0 grid place-content-center bg-black bg-opacity-50 z-50">
        <div class="flex items-center justify-center h-screen">
            <div class="relative">
                <div class="h-24 w-24 rounded-full border-t-8 border-b-8 border-gray-200"></div>
                <div class="absolute top-0 left-0 h-24 w-24 rounded-full border-t-8 border-b-8 border-blue-500 animate-spin">
                </div>
            </div>
        </div>
    </div>
    <!-- End of loader -->

    <div id="mapContainer" wire:ignore class="flex flex-grow relative">
        <div id="map" class="flex relative flex-grow z-0"></div>
        <div id="sidebar" class="absolute top-5 left-5 card shadow-md z-1 hidden w-[32rem]">
            <div id="sidebarTopBackground" class="min-h-[110px] bg-gradient-to-r from-[#4361ee] to-[#160f6b] p-6">
                <div class="mb-6 flex items-center justify-between">
                    <button
                        id="sidebar-close"
                        type="button"
                        class="flex h-5 w-5 items-center justify-between rounded-md bg-black text-white hover:opacity-80 ltr:ml-auto rtl:mr-auto"
                    >
                        <svg
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="40"
                            fill="none"
                            class="m-auto h-4 w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512"
                        >
                            <path
                                d="M324.5 411.1c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6L214.6 256 347.1 123.5c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L192 233.4 59.5 100.9c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L169.4 256 36.9 388.5c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L192 278.6 324.5 411.1z"
                            />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="-mt-12 grid grid-cols-2 gap-2 px-8">
                <div id="data-departureAirport"
                     class="flex flex-col rounded-md bg-white justify-between px-4 py-2.5 shadow dark:bg-[#060818]">
                    <!-- Departure airport info -->
                </div>
                <div id="data-arrivalAirport"
                     class="flex flex-col rounded-md bg-white justify-between px-4 py-2.5 shadow dark:bg-[#060818]">
                    <!-- Arrival airport info -->
                </div>
            </div>


            <div id="sidebar-loadingIndicator" class="pt-3 p-5" style="display: none;">
                <div class="flex items-center justify-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Loading Data...
                </div>
            </div>

            <div id="sidebar-content" class="pt-3 p-5">
                <div id="sidebar-route-data" class="grid grid-cols-2 gap-x-4 mb-4">
                    <div class="flex text-right flex-col">
                        <p>Aircraft Types</p>
                        <p class="text-sm">
                            <span id="data-aircraftTypes" class="font-semibold"></span>
                        </p>
                    </div>
                    <div class="flex flex-col">
                        <p>Operators</p>
                        <p class="text-sm">
                            <span id="data-operators" class="font-semibold"></span>
                        </p>
                    </div>
                    <div class="flex text-right flex-col">
                        <p>ETE</p>
                        <p class="text-sm">
                            <span id="data-ETE" class="font-semibold"></span>
                        </p>
                    </div>
                    <div class="flex flex-col">
                        <p>Distance</p>
                        <p class="text-sm">
                            <span id="data-distance" class="font-semibold"></span>
                        </p>
                    </div>
                </div>
                <div id="data-buttons" class="grid grid-cols-2 gap-2 mb-4">
                    <!-- Reset Map Button -->
                    <button
                        id="reset-map-button"
                        type="button"
                        class="btn btn-primary col-span-2">
                        Reset Map
                    </button>

                    <!-- Origin Airport Info Button -->
                    <button
                        id="origin-airport-button"
                        type="button"
                        class="btn btn-secondary">
                        <!-- Origin Airport Info -->
                    </button>
                    <!-- Jumpseat to Origin Button -->
                    <button
                        id="jumpseat-origin-button"
                        type="button"
                        class="btn btn-info">
                        Jumpseat
                    </button>

                    <!-- Destination Airport Info Button -->
                    <button
                        id="destination-airport-button"
                        type="button"
                        class="btn btn-secondary" style="display: none;">
                        <!-- Destination Airport Info -->
                    </button>
                    <!-- Jumpseat to Destination Button -->
                    <button
                        id="jumpseat-destination-button"
                        type="button"
                        class="btn btn-info" style="display: none;">
                        Jumpseat
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    @vite(['resources/assets/js/maps/BaseMapController.js', 'resources/assets/js/maps/DestinationMapController.js'])
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            initializeDestinationMapController();
        });

        // Livewire 3 Lifecycle Hooks
        document.addEventListener('livewire:load', () => {
            initializeDestinationMapController();
        });

        document.addEventListener('livewire:navigated', () => {
            initializeDestinationMapController();
        });

        document.addEventListener('livewire:navigate', () => {
            if (window.newMapController) {
                window.newMapController.destroyMap();
                window.newMapController = null;
                console.log('newMapController destroyed');
            }
        });

        function initializeDestinationMapController() {
            try {
                // Ensure @this refers to the current Livewire component instance
                window.destinationMapWire = @this;
                console.log('Initializing newMapController with');

                if (!window.newMapController) {
                    const mapElement = document.getElementById('map');
                    if (mapElement) {
                        if (typeof window.DestinationMapController !== 'undefined') {
                            window.newMapController = new window.DestinationMapController('map', window.destinationMapWire, window.destinationMapWire.__instance.el);
                            console.log('newMapController initialized');
                            if (typeof window.newMapController.addInitialMarkers === 'function') {
                                window.newMapController.addInitialMarkers();
                            } else {
                                console.error('addInitialMarkers is not a function on newMapController');
                            }
                        } else {
                            console.error('DestinationMapController is not loaded.');
                        }
                    }
                } else {
                    // Update existing controller with new Livewire instance
                    window.newMapController.$wire = window.destinationMapWire;
                    window.newMapController.componentEl = window.destinationMapWire.__instance.el;
                    console.log('newMapController updated');
                    if (typeof window.newMapController.addInitialMarkers === 'function') {
                        window.newMapController.addInitialMarkers();
                    } else {
                        console.error('addInitialMarkers is not a function on newMapController');
                    }
                }
            } catch (error) {
                console.error('Error initializing newMapController:', error);
            }
        }
    </script>
@endpush

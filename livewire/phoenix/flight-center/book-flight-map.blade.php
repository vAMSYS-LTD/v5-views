<div class="flex relative flex-col flex-grow -p-4 z-0">
    @if($this->destinationAirports->count() > 0 || (is_array($this->selectedTag) || $this->selectedTag != null))
        <form wire:submit="create">
            <div class="card rounded-none p-4">
                {{ $this->form }}
            </div>
        </form>
        <x-filament-actions::modals />
    @endif
        <!-- Add the loader here -->
        <div wire:ignore id="mapSpinner" class="absolute inset-0 grid place-content-center bg-black bg-opacity-50 z-50">
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
                <div id="data-buttons" class="flex justify-around space-x-2 px-2 text-center">
                    <button
                        id="random-destination-button"
                        type="button"
                        class="btn btn-success w-full">
                        Random Destination
                    </button>

                    <button
                        id="jumpseat-button"
                        type="button"
                        class="btn btn-info w-full">
                        Jumpseat
                    </button>

                    <button
                        id="booking-button"
                        type="button"
                        class="btn btn-success w-full">
                        Book Flight
                    </button>

                    <button
                        id="booking-self-button"
                        type="button"
                        class="btn btn-success w-full">
                        Book Flight
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    @vite(['resources/assets/js/maps/BaseMapController.js','resources/assets/js/maps/BookFlightMapController.js'])
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            window.bookFlightMapWire = @this;
            if (!window.mapController) {
                const mapElement = document.getElementById('map');
                if (mapElement) {
                    window.mapController = new window.BookFlightMapController('map', window.bookFlightMapWire, window.bookFlightMapWire.__instance.el);
                }
            }
        });

        document.addEventListener('livewire:navigated', () => {
            window.bookFlightMapWire = @this;
            if (!window.BookFlightMapController) {
                const mapElement = document.getElementById('map');
                if (mapElement) {
                    window.mapController = new window.BookFlightMapController('map', window.bookFlightMapWire, window.bookFlightMapWire.__instance.el);
                }
            } else {
                window.mapController.$wire = window.bookFlightMapWire;
                window.mapController.componentEl = window.bookFlightMapWire.__instance.el;
                // Update markers if needed
                window.mapController.addMarkersToMap();
            }
        });

        // document.addEventListener('livewire:navigate', () => {
        //     if (window.mapController) {
        //         window.mapController.destroyMap();
        //         window.mapController = null;
        //     }
        // });
    </script>
@endpush

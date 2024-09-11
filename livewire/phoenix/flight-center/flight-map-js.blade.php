<div class="{{ $class }} {{ isset($componentWidth)?$componentWidth:'' }}">
    <div id="mapSpinner" class="absolute rounded inset-0 grid place-content-center bg-black bg-opacity-50 z-50">
        <div class="flex items-center justify-center h-screen">
            <div class="relative">
                <div class="h-24 w-24 rounded-full border-t-8 border-b-8 border-gray-200"></div>
                <div class="absolute top-0 left-0 h-24 w-24 rounded-full border-t-8 border-b-8 border-blue-500 animate-spin">
                </div>
            </div>
        </div>
    </div>

    <div id="map" class="{{ $class }}" style="{{ $minHeight?'min-height: '.$minHeight.'px':'' }}{{ $dashboard?'':'height: 100%' }}"></div>

    <div id="sidebar" class="absolute top-5 left-5 card shadow-md z-40 hidden w-[32rem]">
        <div id="sidebarTopBackground" class="min-h-[150px] bg-gradient-to-r from-[#4361ee] to-[#160f6b] p-6">
            <div class="mb-6 flex items-center justify-between">
                <div id="sidebarPilotName"
                     class="flex items-center rounded-lg bg-black/75 px-3 py-1 font-semibold text-white text-sm">
                </div>
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
            <div class="flex flex-col rounded-md justify-between bg-white px-4 py-2.5 shadow dark:bg-[#060818]">
                <span id="sidebarDepartureName"
                      class="mb-2 flex items-center justify-between dark:text-white"></span>
                <div id="sidebarDepartureIdentifiers"
                     class="btn w-full border-0 bg-[#ebedf2] py-1 text-base text-center text-[#515365] shadow-none dark:bg-black dark:text-[#bfc9d4]">
                </div>
            </div>
            <div class="flex flex-col rounded-md justify-between bg-white px-4 py-2.5 shadow dark:bg-[#060818]">
                <span id="sidebarArrivalName"
                      class="mb-2 flex items-center justify-between dark:text-white"></span>
                <div id="sidebarArrivalIdentifiers"
                     class="btn w-full border-0 bg-[#ebedf2] py-1 text-base text-center text-[#515365] shadow-none dark:bg-black dark:text-[#bfc9d4]">
                </div>
            </div>
        </div>
        <div class="pt-3 p-5">
            <div class="mb-5 w-full">
                <span id="sidebarPhase"
                      class="rounded-lg bg-[#1b2e4b] px-4 py-1.5 text-sm text-white text-center block">
                </span>
            </div>
            <div class="grid grid-cols-2 gap-x-4">
                <div class="flex items-center justify-between text-center">
                    <p class="text-base w-full">
                        <span id="sidebarCallsign" class="font-semibold"></span>
                    </p>
                </div>
                <div class="flex items-center justify-between text-center">
                    <p class="text-base w-full">
                        <span id="sidebarFlightNumber"
                              class="font-semibold"></span>
                    </p>
                </div>

                <div class="flex items-center justify-between">
                    <p class="font-semibold text-[#515365]">Time Remaining</p>
                    <p class="text-base">
                        <span id="sidebarTimeRemaining"
                              class="font-semibold"></span>
                    </p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="font-semibold text-[#515365]">Distance Remaining</p>
                    <p class="text-base">
                        <span id="sidebarDistanceRemaining" class="font-semibold"></span>
                    </p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="font-semibold text-[#515365]">Heading</p>
                    <p class="text-base">
                        <span id="sidebarHeading"
                              class="font-semibold"></span>
                    </p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="font-semibold text-[#515365]">Ground Speed</p>
                    <p class="text-base">
                        <span id="sidebarGroundSpeed" class="font-semibold"></span>
                    </p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="font-semibold text-[#515365]">Aircraft</p>
                    <p class="text-base">
                        <span id="sidebarAircraft" class="font-semibold"></span>
                    </p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="font-semibold text-[#515365]">Registration</p>
                    <p class="text-base">
                        <span id="sidebarRegistration"
                              class="font-semibold"></span>
                    </p>
                </div>
            </div>
            <div id="sidebarImageAttribution" class="flex justify-end mt-1 text-xs text-right">
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        function initializeMap() {
            const mapElement = document.getElementById('map');
            if (mapElement) {
                window.mapController = new window.MapController('map', {
                    flightmap: true,
                    dashboard: {{ $dashboard }}
                });
            }
        }

        function stopIntervals() {
            window.mapController.stopFlightDataInterval();
            window.mapController.stopSelectedFlightDataInterval();

        }

        function fetchAndAddMapData() {
            window.mapController.getFlightMapData();
            window.dispatchEvent(new Event('resize'));
            document.getElementById('sidebar-close').addEventListener('click', () => {
                window.mapController.closeSidebar()
            });

            // }).catch(error => {
            //     console.error('Error fetching map data:', error);
            //     document.getElementById('mapSpinner').classList.add('hidden');
            // });
        }

        document.addEventListener('livewire:navigated', () => {
            initializeMap();
            fetchAndAddMapData();
        }, { once: true });

        document.addEventListener('livewire:navigating', () => {
            stopIntervals();
        }, { once: true })
    </script>
@endpush

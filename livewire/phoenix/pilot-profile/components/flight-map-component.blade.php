<div class="w-full relative mt-4">
    <div id="mapSpinner" class="absolute inset-0 grid place-content-center bg-black bg-opacity-50 hidden z-50">
        <div class="loader"></div>
    </div>
    <div wire:ignore class="rounded-lg h-[400px] w-full z-0 mb-4" id="map">

    </div>

</div>
@script
<script>
    (function() {
        var theme = null;
        var color = null;
        var map = null;
        var bounds;
        var accessToken = 'pk.eyJ1IjoibHVrYXNqazEiLCJhIjoiY2xxaXo4NzR6MGlmdDJrcnlucGJpcHBhZiJ9.pQAza1i9K-sUBm0YUnGnuA';
        var markerGroup;
        var flightPath;
        var flightPath2;
        var flightPath3;

        var invertDegress = false;
        var posrepData;
        var routeData;

        var pilotPairs;
        var airportData;

        var pilotRouteData;
        var airports;

        var destinationAirports;
        var markersByAirport = [];

        var selectedAirportKey;
        var selectedAirport = {};
        var selectedDestinationKey;
        var selectedDestinationAirport = {};
        var airportPairData = {};

        var lightMap = L.mapboxGL({
            attribution: '',
            accessToken: accessToken,
            style: '/assets/maps/light.json'
        });

        var darkMap = L.mapboxGL({
            attribution: '',
            accessToken: accessToken,
            style: '/assets/maps/dark.json'
        });

        window.addEventListener('theme-changed', () => {
            theme = Alpine.store('app').theme === 'dark' ? 'dark' : 'light';
            color = theme === 'dark' ? '#fff' : '#000';

            if (theme === 'dark') {
                map.addLayer(darkMap);
                map.removeLayer(lightMap);
            } else {
                map.addLayer(lightMap);
                map.removeLayer(darkMap);
            }

            flightPath.setStyle({
                color: color
            });
            flightPath2.setStyle({
                color: color
            });
            // flightPath3.setStyle({
            //     color: color
            // });
        });

        ['livewire:navigated'].forEach(function(e) {
            showLoading();
            theme = Alpine.store('app').theme === 'dark' ? 'dark' : 'light';
            color = theme === 'dark' ? '#fff' : '#000';
            createMap();
        });

        function createMap() {
            map = L.map('map', {
                minZoom: 3,
                maxZoom: 15,
                zoomSnap: 0,
                layers: [theme === 'dark' ? darkMap : lightMap],
                maxBoundsViscosity: 1
            }).setView([51.505, -0.09], 3);
            map.attributionControl.setPrefix('');
            markerGroup = L.gridLayer.repeatedMarkers().addTo(map);
            bounds = new L.LatLngBounds();
            flightPath = L.geodesic([], {
                weight: 2,
                dash: 0.1,
                opacity: 0.3,
                color: color,
                wrap: false
            });
            flightPath2 = L.geodesic([], {
                weight: 3,
                dash: 0.1,
                opacity: 0.5,
                color: color,
                wrap: false
            });
            // flightPath3 = L.geodesic([], {
            //     weight: 3,
            //     dash: 0.1,
            //     opacity: 0.5,
            //     color: color,
            //     wrap: false
            // });
            // map.addLayer(flightPath);
            // map.addLayer(flightPath2);
            // map.addLayer(flightPath3);
            // getAirportData().then(addAirportMarkers).then(hideLoading);
            // hideLoading();
            getAllData().then(workWithData);

            //console.log(airportData)
        }

        async function getAllData() {
            try {
                [routeData] = await Promise.all([getRouteData()]);
                return {
                    routeData
                };
            } catch (error) {
                console.error('Error:', error);
            }
        }

        async function getRouteData() {
            try {
                routeData = await $wire.$call('getData');
                pilotPairs = await $wire.$get('routeData');
                airportData = await $wire.$get('airportData');
                return routeData;
            } catch (error) {
                console.error('Error:', error);
            }
        }

        function workWithData() {
            return new Promise((resolve, reject) => {

                createAirportMarkers();

                for (var index in pilotPairs) {
                    var pair = pilotPairs[index];

                    // var markerContent = '<p>'+pair.departure.name+'</p>';

                    flightPath = L.geodesic([], {
                        weight: 1,
                        dash: 0.1,
                        opacity: 0.2,
                        color: color,
                        wrap: false
                    });
                    // flightPath.bindTooltip(markerContent)
                    flightPath.addLatLng(new L.LatLng(pair.departure.latitude, pair.departure.longitude))
                    flightPath.addLatLng(new L.LatLng(pair.arrival.latitude, pair.arrival.longitude))

                    map.addLayer(flightPath)
                }



                // var points = [];
                //
                // for (var index in posrepData) {
                //     var posrep = posrepData[index];
                //     if(invertDegress){
                //         bounds.extend([posrep.latitude, L.Util.wrapNum(posrep.longitude, [0,360], true)]);
                //         points.push([posrep.latitude,L.Util.wrapNum(posrep.longitude, [0,360], true), posrep.altitude]);
                //     } else {
                //         bounds.extend([posrep.latitude, posrep.longitude]);
                //         points.push([posrep.latitude,posrep.longitude, posrep.altitude]);
                //     }
                //
                //     var markerContent = '<p>GS: '+ posrep.groundspeed +'kts; Heading:'+ posrep.magnetic_heading +'<br />Altitude:'+ posrep.altitude + ' ft.<br /><small>Time: '+ posrep.time +'. Lat: '+ posrep.latitude +' Lon: '+ posrep.longitude +'</small></p>'
                //     var marker;
                //     if(invertDegress) {
                //         L.circleMarker([posrep.latitude, L.Util.wrapNum(posrep.longitude, [0,360], true)], {radius: 5, stroke:false, fillColor: '#000000', fillOpacity: '0'})
                //             .bindPopup(markerContent).openPopup()
                //             .bindTooltip(markerContent).openTooltip()
                //             .addTo(map);
                //     } else {
                //         L.circleMarker([posrep.latitude, posrep.longitude], {radius: 5, stroke:false, fillColor: '#000000', fillOpacity: '0'})
                //             .bindPopup(markerContent).openPopup()
                //             .bindTooltip(markerContent).openTooltip()
                //             .addTo(map);
                //     }
                // }
                //
                // var hotlineLayer = L.hotline(points, {
                //     palette: {
                //         0.000: '#ffffff',
                //         0.005: '#ffe062',
                //         0.011: '#ffea00',
                //         0.016: '#f0ff00',
                //         0.022: '#ccff00',
                //         0.033: '#42ff00',
                //         0.044: '#1eff00',
                //         0.066: '#00ff0c',
                //         0.082: '#00ff72',
                //         0.137: '#00ffd2',
                //         0.191: '#00eaff',
                //         0.246: '#00a8ff',
                //         0.355: '#0078ff',
                //         0.464: '#001eff',
                //         0.519: '#4e00ff',
                //         0.574: '#6000ff',
                //         0.628: '#D800FF',
                //         1.000: '#ff0000',
                //     },
                //     weight: 3,
                //     outlineColor: '#000000',
                //     outlineWidth: 0,
                //     min: 0,
                //     max: 60000,
                //     interactive: false,
                // }).addTo(map);
                //
                // for (var index in routeData) {
                //     var routeItem = routeData[index];
                //
                //     flightPath.addLatLng(new L.LatLng(routeItem.latitude, routeItem.longitude))
                // }
                //
                // for (var index in pilotRouteData) {
                //     var pilotRouteItem = pilotRouteData[index];
                //
                //     flightPath2.addLatLng(new L.LatLng(pilotRouteItem.latitude, pilotRouteItem.longitude))
                // }

                hideLoading();
                resolve(true);
            });

        }

        function createAirportMarkers() {
            for (var airportItemId in airportData) {
                var airportItem = airportData[airportItemId];

                if (airportItem.longitude >= 90 && airportItem.latitude < -90) {
                    invertDegress = true;
                }

                let airport;
                if (invertDegress) {
                    airport = new L.LatLng(airportItem.latitude, L.Util.wrapNum(airportItem.longitude, [0, 360], true));
                } else {
                    airport = new L.LatLng(airportItem.latitude, airportItem.longitude);
                }
                bounds.extend(airport);
                let marker;
                let markerContent = '<p class="text-center"><strong>' + airportItem.name + '</strong><br/>' + airportItem.identifiers + '</p>';
                let iconItem = '/assets/images/map/map_marker_destination.png';
                let airportMarkerIcon = L.icon({
                    iconUrl: iconItem,
                    iconSize: [16, 24], // size of the icon
                    iconAnchor: [8, 24], // point of the icon which will correspond to marker's location
                    popupAnchor: [0, 0] // point from which the popup should open relative to the iconAnchor
                });

                marker = L.marker(airport, {
                    icon: airportMarkerIcon
                }).bindPopup(markerContent, {
                    offset: [0, -29],
                    direction: 'top',
                    closeButton: false
                }).on('mouseover', function(e) {
                    this.openPopup();
                }).on('mouseout', function(e) {
                    this.closePopup();
                });
                markerGroup.addMarker(marker);
            }

        }

        function showLoading() {
            document.getElementById('mapSpinner').classList.remove('hidden');
        }

        function hideLoading() {
            Promise.resolve()
                .then(() => {
                    window.dispatchEvent(new Event('resize'));
                    return Promise.resolve();
                })
                .then(() => {
                    if (bounds.isValid()) {
                        map.fitBounds(bounds, { padding: [100, 100] });
                    }
                    return Promise.resolve();
                })
                .then(() => {
                    document.getElementById('mapSpinner').classList.add('hidden');
                });
        }
    })();
</script>
@endscript

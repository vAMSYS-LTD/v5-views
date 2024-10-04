<div class="flex flex-col space-y-2">
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">PIREP #{{ $this->pirep->id }} Details</h4>
            <div>
                Booking #{{ $this->pirep->booking_id }}
            </div>
        </div>

        <div class="px-6 py-2 space-y-2">
            <div class="grid sm:grid-cols-3 gap-3">
                <div class="col-span-1">
                    <p class="text-gray-400">Pilot</p>
                    <div class="gap-3 mt-1">
                        @if($pilot->id == $pirep->pilot_id || Request::routeIs('orwell.*'))
                            <h5 class="font-medium">{{ $this->pirep->pilot->username }} {{ $this->pirep->pilot->user->full_name }}</h5>
                        @else
                            <h5 class="font-medium">{{ $this->pirep->pilot->username }} {{ $this->pirep->pilot->user->public_name }}</h5>
                        @endif

                    </div>
                </div>

                <div class="col-span-1 sm:text-center">
                    <p class="text-gray-400">Rank</p>
                    <div class=" gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->pirep->pilot->preferredRank->name }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-right">
                    <p class="text-gray-400">Registration</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->pirep->pilot->created_at->format('jS \o\f F, y') }}</h5>
                    </div>
                </div>
            </div>

            <hr class="divider"/>

            <div class="grid sm:grid-cols-3 gap-3">
                <div class="col-span-1">
                    <p class="text-gray-400">Departure</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->pirep->route->departureAirportAll->name }}</h5>
                        <h5 class="font-medium">{{ $this->pirep->route->departureAirportAll->identifiers }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-center">
                    <p class="text-gray-400">Arrival</p>
                    <div class=" gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->pirep->route->arrivalAirportAll->name }}</h5>
                        <h5 class="font-medium">{{ $this->pirep->route->arrivalAirportAll->identifiers }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-right">
                    <p class="text-gray-400">Callsign & Flight Number</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->pirep->booking->callsign }}</h5>
                        <h5 class="font-medium">{{ $this->pirep->booking->flight_number }}</h5>
                    </div>
                </div>
            </div>

            <hr class="divider"/>

            <div class="grid sm:grid-cols-4 gap-3">
                <div class="col-span-1">
                    <p class="text-gray-400">Aircraft</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->pirep->booking->aircraft->registration }} | {{ $this->pirep->booking->aircraft->name }}</h5>
                        <h5 class="font-medium">{{ $this->pirep->booking->aircraft->type->name }} | {{ $this->pirep->booking->aircraft->type->code }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-center">
                    <p class="text-gray-400">Booking</p>
                    <div class=" gap-3 mt-1">
                        <h5 class="font-medium">{{ ucfirst($this->pirep->booking->type) }}</h5>
                        <h5 class="font-medium">{{ $this->pirep->booking->network }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-center">
                    <p class="text-gray-400">Level and Cost Index</p>
                    <div class=" gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->pirep->booking->altitude/100 }}</h5>
                        <h5 class="font-medium">{{ $this->pirep->booking->cost_index }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-right">
                    <p class="text-gray-400">Passengers & Freight</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->pirep->booking->passengers }}</h5>
                        <h5 class="font-medium">{{ number_format(convertWeightValue($this->pirep->booking->cargo, $pilot)->value) }} {{ convertWeightValue($this->pirep->booking->cargo, $pilot)->measure }}</h5>
                    </div>
                </div>
            </div>

            <hr class="divider"/>

            <div class="grid sm:grid-cols-4 gap-3">
                <div class="col-span-1">
                    <p class="text-gray-400">Points</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ number_format($this->pirep->points) }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-center">
                    <p class="text-gray-400">Bonus Points</p>
                    <div class=" gap-3 mt-1">
                        <h5 class="font-medium">{{ number_format($this->pirep->bonus_sum) }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-center">
                    <p class="text-gray-400">Point Sum</p>
                    <div class=" gap-3 mt-1">
                        <h5 class="font-medium">{{ number_format($this->pirep->points + $this->pirep->bonus_sum) }}</h5>
                    </div>
                </div>

                <div class="col-span-1 sm:text-right">
                    <p class="text-gray-400">Landing Rate</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->pirep->landing_rate }} FPM</h5>
                    </div>
                </div>
            </div>
            <hr class="divider"/>
            <div class="grid sm:grid-cols-4 gap-3">
                <div class="col-span-2">
                    <p class="text-gray-400">Livery Used</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ collect($this->pirep->pirep_data?->aircrafts)->last()?->name }}</h5>
                    </div>
                </div>
                <div class="col-span-2 sm:text-right">
                    <p class="text-gray-400">Simulator Used</p>
                    <div class="gap-3 mt-1">
                        <h5 class="font-medium">{{ $this->pirep->simulator_version }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($pirep->pirep_data)
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Flight Details</h4>
                <div>
                    All times are Zulu
                </div>
            </div>

            <div class="px-6 py-2 space-y-2">
                <div class="grid sm:grid-cols-5 gap-3">
                    <div>
                        <div class="col-span-1 mb-2">
                            <p class="text-gray-400">Route Departure</p>
                            <div class="gap-3">
                                @if($this->pirep->booking->route->departure_time || $this->pirep->booking->departure_time)
                                    <h5 class="font-medium">{{ $this->pirep->booking->route->departure_time?$this->pirep->booking->route->departure_time->format('H:i'):$this->pirep->booking->departure_time->format('H:i') }}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="col-span-1 mb-2">
                            <p class="text-gray-400">Route Arrival</p>
                            <div class="gap-3">
                                @if($this->pirep->booking->route->arrival_time || $this->pirep->booking->arrival_time)
                                    <h5 class="font-medium">{{ $this->pirep->booking->route->arrival_time?$this->pirep->booking->route->arrival_time->format('H:i'):$this->pirep->booking->arrival_time->format('H:i') }}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="col-span-1">
                            <p class="text-gray-400">Scheduled Time</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ $this->pirep->route->flight_length->format('H:i') }}</h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="col-span-1 sm:text-center mb-2">
                            <p class="text-gray-400">Booked Departure</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ $this->pirep->booking->departure_time?->format('H:i') }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1 sm:text-center mb-2">
                            <p class="text-gray-400">Booked Arrival</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ $this->pirep->booking->arrival_time?->format('H:i') }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1 sm:text-center">
                            <p class="text-gray-400">Credited Flight Time</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ sprintf('%02d:%02d', ($this->pirep->credited_time / 3600), ($this->pirep->credited_time / 60 % 60)) }}</h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="col-span-1 sm:text-center mb-2">
                            <p class="text-gray-400">Blocks Off</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ $this->pirep->off_blocks_time->format('H:i') }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1 sm:text-center mb-2">
                            <p class="text-gray-400">Blocks On</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ $this->pirep->on_blocks_time->format('H:i') }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1 sm:text-center">
                            <p class="text-gray-400">Block Time</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ sprintf('%02d:%02d', ($this->pirep->block_length / 3600), ($this->pirep->block_length / 60 % 60)) }}</h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="col-span-1 sm:text-center mb-2">
                            <p class="text-gray-400">Take-off</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ $this->pirep->departure_time->format('H:i') }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1 sm:text-center mb-2">
                            <p class="text-gray-400">Landing</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ $this->pirep->landing_time->format('H:i') }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1 sm:text-center">
                            <p class="text-gray-400">Airborne Time</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ sprintf('%02d:%02d', ($this->pirep->flight_length / 3600), ($this->pirep->flight_length / 60 % 60)) }}</h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="col-span-1 sm:text-right mb-2">
                            <p class="text-gray-400">Tracking Start</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ $this->pirep->pirep_start_time->format('jS M y H:i') }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1 sm:text-right mb-2">
                            <p class="text-gray-400">Tracking End</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ $this->pirep->pirep_end_time->format('jS M y H:i') }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1 sm:text-right">
                            <p class="text-gray-400">Submitted</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ $this->pirep->created_at->format('jS M y H:i') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="divider"/>
                <div class="grid sm:grid-cols-4 gap-3">
                    <div>
                        <div class="col-span-1 mb-2">
                            <p class="text-gray-400">Taxi Out</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ sprintf('%02d:%02d:%02d', ($this->pirep->taxi_out_time / 3600 ), ($this->pirep->taxi_out_time / 60 % 60), $this->pirep->taxi_out_time % 60) }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <p class="text-gray-400">Company Average</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ sprintf('%02d:%02d:%02d', ($this->taxiOutAvg / 3600 ), ($this->taxiOutAvg / 60 % 60), $this->taxiOutAvg % 60) }}</h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="col-span-1 mb-2 sm:text-center">
                            <p class="text-gray-400">Taxi In</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ sprintf('%02d:%02d:%02d', ($this->pirep->taxi_in_time / 3600 ), ($this->pirep->taxi_in_time / 60 % 60), $this->pirep->taxi_in_time % 60) }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1 sm:text-center">
                            <p class="text-gray-400">Company Average</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ sprintf('%02d:%02d:%02d', ($this->taxiInAvg / 3600 ), ($this->taxiInAvg / 60 % 60), $this->taxiInAvg % 60) }}</h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="col-span-1 mb-2 sm:text-center">
                            <p class="text-gray-400">Distance</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ number_format($this->pirep->booking->route->flight_distance) }} NM</h5>
                            </div>
                        </div>
                        <div class="col-span-1 sm:text-center">
                            <p class="text-gray-400">Fuel Used</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ number_format(convertWeightValue($this->pirep->fuel_used, $pilot)->value) }} {{ convertWeightValue($this->pirep->fuel_used, $pilot)->measure }}</h5>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col-span-1 mb-2 sm:text-right">
                            @if($airline->include_taxi_time)
                                <p class="text-gray-400">Paused Block Time</p>
                                <div class="gap-3">
                                    <h5 class="font-medium">{{ sprintf('%02d:%02d:%02d', ($this->pirep->paused_blocks_time / 3600), ($this->pirep->paused_blocks_time / 60 % 60), $this->pirep->paused_blocks_time % 60) }}</h5>
                                </div>
                            @else
                                <p class="text-gray-400">Paused Flight Time</p>
                                <div class="gap-3">
                                    <h5 class="font-medium">{{ sprintf('%02d:%02d:%02d', ($this->pirep->paused_air_time / 3600), ($this->pirep->paused_air_time / 60 % 60), $this->pirep->paused_air_time % 60) }}</h5>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                @if(!$this->airline->disable_stands)
                    <hr class="divider"/>
                    <div class="grid sm:grid-cols-4 gap-3">
                        <div class="col-span-1 mb-2">
                            <p class="text-gray-400">Booked Departure Stand</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ $this->pirep->booking->departureStand->name }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1 mb-2 sm:text-center">
                            <p class="text-gray-400">Departure Stand</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ isset($this->pirep->pirep_data->departure_gate)?collect($this->pirep->pirep_data->departure_gate)->last()->name:'' }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1 mb-2 sm:text-center">
                            <p class="text-gray-400">Booked Arrival Stand</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ $this->pirep->booking->arrivalStand->name }}</h5>
                            </div>
                        </div>
                        <div class="col-span-1 mb-2 sm:text-right">
                            <p class="text-gray-400">Arrival Stand</p>
                            <div class="gap-3">
                                <h5 class="font-medium">{{ isset($this->pirep->pirep_data->arrival_gate)?collect($this->pirep->pirep_data->arrival_gate)->last()->name:'' }}</h5>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>

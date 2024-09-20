<div class="card">
    <div class="card-header flex justify-between items-center">
        <h4 class="card-title">Compare</h4>
        <div>
            With {{ number_format($this->comparison->pireps->allTime->count) }} other {{ \Illuminate\Support\Str::plural('flight', $this->comparison->pireps->allTime->count) }} between {{ $this->pirep->route->departureAirportAll->identifier }} and {{ $this->pirep->route->arrivalAirportAll->identifier }}
        </div>
    </div>

    <div class="px-6 py-2 space-y-2">
        <div class="grid sm:grid-cols-3 gap-3">
            <div class="col-span-1">
                <p class="text-gray-400">Landing Rate</p>
                <div class="gap-3 mt-1">
                    <h5 class="font-medium">{{ number_format($this->comparison->pireps->allTime->landingRate) }} FPM</h5>
                </div>
            </div>

            <div class="col-span-1 sm:text-center">
                <p class="text-gray-400">Fuel Used</p>
                <div class=" gap-3 mt-1">
                    <h5 class="font-medium">{{ number_format(convertWeightValue(divnum($this->comparison->pireps->allTime->fuelUsed, $this->comparison->pireps->allTime->count), $this->pilot)->value) }} {{ convertWeightValue(divnum($this->comparison->pireps->allTime->fuelUsed, $this->comparison->pireps->allTime->count), $this->pilot)->measure }}</h5>
                </div>
            </div>

            <div class="col-span-1 sm:text-right">
                <p class="text-gray-400">Flight Time</p>
                <div class="gap-3 mt-1">
                    <h5 class="font-medium">{{
                                        $this->comparison->pireps->allTime->count != 0
                                            ? sprintf(
                                                '%02d:%02d:%02d',
                                                ($this->comparison->flightTime->allTime->raw / $this->comparison->pireps->allTime->count / 3600),
                                                ($this->comparison->flightTime->allTime->raw / $this->comparison->pireps->allTime->count / 60 % 60),
                                                $this->comparison->flightTime->allTime->raw / $this->comparison->pireps->allTime->count % 60
                                            )
                                            : '00:00:00'
                                    }}</h5>
                </div>
            </div>
        </div>

        <div class="grid sm:grid-cols-3 gap-3">
            <div class="col-span-1">
                <p class="text-gray-400">Points</p>
                <div class="gap-3 mt-1">
                    <h5 class="font-medium">{{ number_format(divnum($this->comparison->points->allTime->sum, $this->comparison->pireps->allTime->count)) }}</h5>
                </div>
            </div>

            <div class="col-span-1 sm:text-center">
                <p class="text-gray-400">Passengers</p>
                <div class=" gap-3 mt-1">
                    <h5 class="font-medium">{{ number_format(divnum($this->comparison->transport->allTime->passengers, $this->comparison->pireps->allTime->count)) }}</h5>
                </div>
            </div>

            <div class="col-span-1 sm:text-right">
                <p class="text-gray-400">Freight</p>
                <div class="gap-3 mt-1">
                    <h5 class="font-medium">{{ number_format(convertWeightValue(divnum($this->comparison->transport->allTime->cargo, $this->comparison->pireps->allTime->count), $this->pilot)->value) }} {{ convertWeightValue(divnum($this->comparison->transport->allTime->cargo, $this->comparison->pireps->allTime->count), $this->pilot)->measure }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

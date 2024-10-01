<form id="sbapiform">
    <input type="hidden" name="airline" value="{{ $flightNumberPrefix }}">
    <input type="hidden" name="fltnum" value="{{ $data['flight_number'] }}">
    <input type="hidden" name="orig" value="{{ $this->route->departureAirport->identifier }}">
    <input type="hidden" name="dest" value="{{ $this->route->arrivalAirport->identifier }}">
    <input type="hidden" name="altn" value="{{ $data['alternate'] }}">
    <input type="hidden" name="date"
           value="{{ strtoupper(\Carbon\Carbon::parse($data['departureTime'])->format('dMy')) }}">
    <input type="hidden" name="deph" value="{{ \Carbon\Carbon::parse($data['departureTime'])->format('G') }}">
    <input type="hidden" name="depm" value="{{ \Carbon\Carbon::parse($data['departureTime'])->format('i') }}">

    @if($aircraft?->favorites->where('pilot_id', $pilot->id)->first()?->sb_id)
        <input type="hidden" name="type"
               value="{{ $aircraft?->favorites->where('pilot_id', $pilot->id)->first()?->sb_id }}">
    @else
        @php
            $bagWeight = $aircraft?->bagwgt ?? $aircraft?->type->bagwgt ?? 55;
            $totalPax = $data['passengers'];
            $holdPax = $data['luggage'];
            $bagWeight = round(divnum($bagWeight, divnum($totalPax, $holdPax)));
        @endphp
        <input type="hidden" name="type"
               value="{{ $aircraft?->sb_airframe_id ?? $aircraft?->type->sb_airframe_id ?? $aircraft?->type->code }}">
        <input type="hidden" name="climb"
               value="{{ $aircraft?->climb_profile ?? $aircraft?->type->climb_profile }}">
        <input type="hidden" name="descent"
               value="{{ $aircraft?->descent_profile ?? $aircraft?->type->descent_profile }}">
        <input type="hidden" name="cruise" value="{{ $aircraft?->cruise_profile ?? $aircraft?->type->cruise_profile }}">
        @if(($aircraft?->civalue != null || $aircraft?->type->civalue != null) && $this->route->cost_index == 'AUTO')
            <input type="hidden" name="civalue" value="{{ $aircraft?->civalue ?? $aircraft?->type->civalue }}">
        @else
            <input type="hidden" name="civalue" value="{{ $this->route->cost_index }}">
        @endif

        <input type="hidden" name="fuelfactor"
               value="{{ $aircraft?->fuel_factor ?? $aircraft?->type->fuel_factor }}">
        <input type="hidden" name="callsign" value="{{ $callsignPrefix.$data['callsign'] }}">
        <input type="hidden" name="reg" value="{{ $aircraft?->registration }}">
        <input type="hidden" name="fin" value="{{ $aircraft?->fin_number }}">
        <input type="hidden" name="selcal" value="{{ $aircraft?->selcal }}">
        <input type="hidden" name="acdata" value='{{ json_encode([
                "cat" => $aircraft?->cat ?? $aircraft?->type->cat,
                "equip" => $aircraft?->equipment ?? $aircraft?->type->equipment,
                "transponder" => $aircraft?->transponder ?? $aircraft?->type->transponder,
                "pbn" => $aircraft?->pbn ?? $aircraft?->type->pbn,
                "extrarmk" => $aircraft?->remarks ?? $aircraft?->type->remarks,
                "maxpax" => $aircraft?->max_passengers,
                "oew" => $aircraft?->oew ?? $aircraft?->type->oew,
                "mzfw" => $aircraft?->mzfw ?? $aircraft?->type->mzfw,
                "mtow" => $aircraft?->mtow ?? $aircraft?->type->mtow,
                "mlw" => $aircraft?->mlw ?? $aircraft?->type->mlw,
                "maxfuel" => $aircraft?->max_fuel ?? $aircraft?->type->max_fuel,
                "hexcode" => $aircraft?->hexcode,
                "per" => $aircraft?->performance ?? $aircraft?->type->performance,
                "paxwgt" => $aircraft?->paxwgt ?? $aircraft?->type->paxwgt ?? 175,
                "bagwgt" => $bagWeight
                ]) }}' />
    @endif

    @if($airline->planformat_user_override == true && $ofpFormat = \App\Models\General\SimBriefOFP::where('id', '=', $pilot->simbrief_ofp_id)->first())
        <input type="hidden" name="planformat"
               value="{{ $ofpFormat->value }}">
    @else
        <input type="hidden" name="planformat"
               value="{{ $aircraft->planformat
                        ?? $aircraft->type->planformat
                        ?? $airline->planformat
                        ?? 'LIDO' }}">
    @endif

    <input type="hidden" name="units" value="{{ $this->pilot->use_imperial_units?'LBS':'KGS' }}">
    <input type="hidden" name="maps" value="detail">
    <input type="hidden" name="taxiout" value="{{ round($this->route->departureAirport->avg_taxi_out/60) }}">
    <input type="hidden" name="taxiin" value="{{ round($this->route->arrivalAirport->avg_taxi_in/60) }}">
    <input type="hidden" name="flightrules" value="{{ $this->route->flightrules }}">
    <input type="hidden" name="flighttype" value="{{ $this->route->flighttype }}">
    <input type="hidden" name="navlog" value="1">
    <input type="hidden" name="etops" value="1">
    <input type="hidden" name="stepclimbs" value="1">
    <input type="hidden" name="tlr" value="1">
    <input type="hidden" name="notams" value="1">
    <input type="hidden" name="firnot" value="1">

    <input type="hidden" name="steh" value="{{ \Carbon\Carbon::parse($this->route->flight_length)->format('G') }}">
    <input type="hidden" name="stem" value="{{ \Carbon\Carbon::parse($this->route->flight_length)->format('i') }}">
    <input type="hidden" name="fl" value="{{ 'FL'.$data['altitude'] }}">
    @php
        if($this->route->type == 'repositioning' || $this->route->type == 'training'){
            $pax = 0;
            $cargo = 0;
        } else {
            $pax = $data['passengers'];
            $cargo = $this->maxCargoUnits > 0 ?
            (isset($data['container_weight_remaining']) &&  isset($data['cargo'])? divnum($data['cargo'] - $data['container_weight_remaining'], 1000) : 0) :
            (isset($data['cargo']) ? divnum($data['cargo'], 1000) : 0);
        }
    @endphp
    <input type="hidden" name="pax" value="{{ $pax }}">
    <input type="hidden" name="cargo" value="{{ $cargo }}">
    <input type="hidden" name="contpct"
           value="{{ $this->route->contpct ?? $aircraft?->contpct ?? $aircraft?->type->contpct }}">
    <input type="hidden" name="resvrule"
           value="{{ $this->route->resvrule ?? $aircraft?->resvrule ?? $aircraft?->type->resvrule }}">
    <input type="hidden" name="taxifuel"
           value="{{ $this->route->taxifuel }}">
    <input type="hidden" name="minfob"
           value="{{ $this->route->minfob ?? $aircraft?->minfob ?? $aircraft?->type->minfob }}">
    <input type="hidden" name="minfod"
           value="{{ $this->route->minfod ?? $aircraft?->minfod ?? $aircraft?->type->minfod }}">
    <input type="hidden" name="melfuel"
           value="{{ $this->route->melfuel ?? $aircraft?->melfuel ?? $aircraft?->type->melfuel }}">
    <input type="hidden" name="atcfuel"
           value="{{ $this->route->atcfuel }}">
    <input type="hidden" name="wxxfuel"
           value="{{ $this->route->wxxfuel }}">
    <input type="hidden" name="addedfuel" value="{{ $data['extraFuel'] }}">
    <input type="hidden" name="tankering"
           value="{{ $this->route->tankering }}">
    <input type="hidden" name="minfob_units"
           value="{{ $this->route->minfob_units ?? $aircraft?->minfob_units ?? $aircraft?->type->minfob_units }}">
    <input type="hidden" name="minfod_units"
           value="{{ $this->route->minfod_units ?? $aircraft?->minfod_units ?? $aircraft?->type->minfod_units }}">
    <input type="hidden" name="melfuel_units"
           value="{{ $this->route->melfuel_units ?? $aircraft?->melfuel_units ?? $aircraft?->type->melfuel_units }}">
    <input type="hidden" name="atcfuel_units"
           value="{{ $this->route->atcfuel_units }}">
    <input type="hidden" name="wxxfuel_units"
           value="{{ $this->route->wxxfuel_units }}">
    <input type="hidden" name="addedfuel_units" value="min">
    <input type="hidden" name="tankering_units"
           value="{{ $this->route->tankering_units }}">
    <input type="hidden" name="addedfuel_label"
           value="{{ $this->route->addedfuel_label }}">

    <input type="hidden" name="cpt" value="{{ $this->pilot->user->full_name }}">
    <input type="hidden" name="pid" value="{{ substr($this->pilot->username, 3) }}">
    <input type="hidden" name="dxname" value="vAMSYS Robot">
    <input type="hidden" name="manualrmk" value="{{ $route->remarks }}">

    <input type="hidden" name="route" value="{{ $data['route'] }}">
    <input type="hidden" name="find_sidstar" value="R">

    {{--    <input type="hidden" name="altn_count" value="4">--}}
    {{--            <input type="hidden" name="toaltn" value="AUTO">--}}
    {{--            <input type="hidden" name="eualtn" value="AUTO">--}}

    <input type="hidden" name="etopsrule" value="{{ $aircraft?->etops ?? $aircraft?->type->etops }}">
</form>

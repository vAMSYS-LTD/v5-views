<div>
    @if($hasProtected)
        <div class="large-alert alert-info">
            <span class="ltr:pr-2 rtl:pl-2">
                <strong class="ltr:mr-1 rtl:ml-1">Protected Callsigns</strong>
                Your Virtual Airline has one or more protected callsigns. This is a legacy commitment made by vAMSYS where we prevent other Virtual Airlines from using them.<br/>
                You can remove the protection from callsign at any time - this will enable other Virtual Airlines to use it.<br/>
                All new Parameter Requests will not be protected in the same fashion.
            </span>
        </div>
    @endif
    <div>
        {{ $this->table }}
    </div>

    @if($hasProtected)
        <livewire:orwell.settings.components.vds-settings.parameter-review :$airline :$airlineStaff />
    @endif
</div>

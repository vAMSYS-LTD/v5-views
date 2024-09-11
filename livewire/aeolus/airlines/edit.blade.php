<div>
    @include('livewire.aeolus.secret-alert')

    <livewire:orwell.dashboard.components.statistic-boxes/>

    <div class="mt-2">
        {{ $this->airlineInfolist }}
    </div>
    <div class="mt-2">
        {{ $this->actionsInfolist }}
    </div>

    <div class="mt-2">
        <livewire:aeolus.airlines.components.jobs-table :$selectedAirline />
    </div>

    <div class="mt-2">
        <livewire:aeolus.airlines.components.parameters-table :$selectedAirline />
    </div>

    <div class="mt-2">
        <livewire:aeolus.airlines.components.staff-table :$selectedAirline />
    </div>

    <x-filament-actions::modals />
</div>

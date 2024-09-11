<div>
    <div>{{ $this->form }}</div>

    <div class="mt-4">
        {{--        @foreach($this->data['exporter'] as $exporter)--}}
        {{--            {{ $this->{$exporter} }}--}}
        {{--        @endforeach--}}
        {{ $this->data['importer']?$this->{$this->data['importer']}:null }}
    </div>

    <div class="mt-4">
        <livewire:orwell.data.import.table />
    </div>
    <x-filament-actions::modals />
</div>

<div>
    <div>{{ $this->form }}</div>

    <div class="mt-4">
{{--        @foreach($this->data['exporter'] as $exporter)--}}
{{--            {{ $this->{$exporter} }}--}}
{{--        @endforeach--}}
        {{ $this->data['exporter']?$this->{$this->data['exporter']}:null }}
    </div>

    <div class="mt-4">
        <livewire:orwell.data.export.table />
    </div>
    <x-filament-actions::modals />
</div>

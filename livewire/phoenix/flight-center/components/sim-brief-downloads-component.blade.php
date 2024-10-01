<div>
    @if($this->showForm)
        <div class="col-span-2">
            {{ $this->form }}
            <div class="mt-2">
                {{ $this->downloadAction }}
            </div>

            <x-filament-actions::modals />
        </div>
    @endif
</div>

@script
<script>
    $wire.on('open-url', (event) => {
        event.forEach(function(link) {
            window.open(link, '_blank');
        });
    });
</script>
@endscript

<div class="col-span-2">

{{--    <form wire:submit="create">--}}
        {{ $this->form }}

        <div class="mt-2">
            {{ $this->downloadAction }}
        </div>
{{--    </form>--}}

    <x-filament-actions::modals />
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

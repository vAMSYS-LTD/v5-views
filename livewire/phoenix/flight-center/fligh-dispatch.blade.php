<div class="w-full">
    {{ $this->table }}

    @if($booking)
        <livewire:phoenix.flight-center.flight-dispatch-box :$booking />
    @else
        <livewire:phoenix.flight-center.flight-dispatch-box />
    @endif
    <div id="scrollToLocation">

    </div>
</div>
@script
<script>
    $wire.on('scroll-to-bottom', (event) => {
        setTimeout(() => {
            document.getElementById('scrollToLocation').scrollIntoView({ behavior: 'smooth' });
        }, 300);
    });
</script>
@endscript

@push('scripts')
    <script src="/assets/simbrief/simbrief.js"></script>
@endpush

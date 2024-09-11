<div>
    <x-filament-actions::modals />
</div>
@push('scripts')
    @script
    @if($pilot->location_id == null)
        <script>
            $wire.mountAction('selectHub')
        </script>
    @endif
    @endscript
@endpush

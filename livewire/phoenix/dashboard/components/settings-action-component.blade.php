<div>
    {{ $this->settingsAction }}
    <x-filament-actions::modals/>
</div>
@push('scripts')
    @script
    @if(isset($_GET['edit']))
        <script>
            $wire.mountAction('settingsAction')
        </script>
    @endif
    @endscript
@endpush

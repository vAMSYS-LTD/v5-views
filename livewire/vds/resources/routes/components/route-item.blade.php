<div>
    <form wire:submit="create">
        <div class="panel {{ $state }}">
            @if($route->status == 'pending')
                <span class="absolute -top-2 -left-1 badge bg-primary dark:bg-primary-dark w-40 text-center rounded-md shadow-lg">
                    NEW
                </span>
            @endif
            @if($route->status == 'live')
                <span class="absolute -top-2 -left-1 badge bg-success dark:bg-success-dark w-40 text-center rounded-md shadow-lg">
                    LIVE
                </span>
            @endif

                <div class="mt-2">
                    {{ $this->editRouteForm }}
                </div>
        </div>

        {{--        <div wire:dirty>Unsaved changes...</div>--}}
        <button wire:dirty type="submit" class="rounded-none btn btn-success w-full">
            Submit Changes
        </button>
    </form>
    <div class="mb-4 rounded-b-lg">
        {{ $this->copyRouteAction }}
    </div>

    <x-filament-actions::modals />
</div>



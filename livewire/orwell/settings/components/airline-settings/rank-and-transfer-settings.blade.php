<div>
    <form wire:submit="create" class="mb-4">
        {{ $this->form }}

        <button type="submit" class="btn btn-success rounded-none rounded-b-xl shadow w-full">
            Save
        </button>
    </form>

    <x-filament-actions::modals />
</div>

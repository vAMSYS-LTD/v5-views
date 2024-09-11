<div>
    <form wire:submit="create">
        {{ $this->form }}

        <button type="submit" class="mt-4 btn btn-success w-full">
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>

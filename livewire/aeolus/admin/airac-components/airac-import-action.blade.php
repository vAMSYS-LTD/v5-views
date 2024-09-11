<div>
    <form wire:submit="create">
        {{ $this->form }}

        <button class="btn btn-danger w-full my-4" type="submit">
            Submit New AIRAC. No Confirmation!
        </button>
    </form>

    <x-filament-actions::modals />
</div>

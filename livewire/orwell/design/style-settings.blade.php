<div>
    <form wire:submit="create" class="mb-4">
        {{ $this->form }}

        <button type="submit" class="mt-4 w-full rounded-md shadow btn btn-success">
            Save
        </button>
    </form>

    <x-filament-actions::modals/>
</div>
<div class="mb-4">
    <form wire:submit="create">
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Form Pilot Sharing Agreement</h4>
            </div>

            <div class="px-6 py-2 space-y-2">
                {{ $this->form }}
            </div>

        </div>
        <button type="submit" class="rounded-none rounded-b-lg btn btn-success w-full">
            Submit
        </button>
    </form>
    <div class="mt-4">
        {{ $this->table }}
    </div>

</div>

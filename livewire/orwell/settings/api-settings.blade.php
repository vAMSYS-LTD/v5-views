<div>
    {{ $this->table }}

    @if($plainTextToken)
        <div class="mt-4 card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Your Token</h4>
            </div>

            <div class="px-6 py-2 space-y-2">
                <pre>{{ $plainTextToken }}</pre>

                <div>
                    Please make sure to copy your API key and save it in a secure location, as you will not have access to it again. This is crucial to ensure the safety and proper functioning of your account.
                </div>
            </div>

        </div>
    @endif

    <form wire:submit="create">
        <div class="mt-4 card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Create New Token</h4>
            </div>

            <div class="px-6 py-2 space-y-2">
                {{ $this->form }}
            </div>
        </div>
        <button type="submit" class="rounded-none rounded-b-lg btn btn-success w-full">
            Create
        </button>
    </form>
    <x-filament-actions::modals />
</div>

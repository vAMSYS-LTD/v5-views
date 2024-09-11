<form class="card" wire:submit="create">
    <div
        class="p-4 border border-[#ebedf2] dark:border-[#191e3a] rounded-md">
        <h6 class="text-lg pt-4 font-bold mb-5">Multiple Account Merge</h6>

        {{ $this->form }}
    </div>
    <div class="w-full">
        <button type="submit" class="btn w-full btn-primary rounded-none rounded-b-md">Save</button>
    </div>
</form>

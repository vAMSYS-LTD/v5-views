<div>
    <x-alerts.danger class="mb-4" title="Do not Copy Paste" content="Do not copy paste variables. Either paste them without formatting or enter manually. Content field is a rich text editor and will take formatting. Always use preview to see if the resulting email is correct - there should be no variables visible in preview."/>

    <div class="mb-4">
        {{ $this->variablesInfolist }}
    </div>
    <form wire:submit="create" class="mb-4">
        {{ $this->form }}

        <button type="submit" class="mt-4 w-full rounded-md shadow btn btn-success">
            Save
        </button>
    </form>

    <x-filament-actions::modals/>
</div>

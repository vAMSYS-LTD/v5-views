<x-filament::section :compact="true">
    <x-slot name="heading">
        {{ $title }}
        <x-slot name="headerEnd">
            <span class="my-auto text-xs" @if($popover) @mouseenter="$popovers('{{ $popover }}')" data-trigger="mouseenter" @endif>
                {{ $subtitle }}
            </span>
        </x-slot>
    </x-slot>
    <div class="flex w-full justify-around gap-2">
        @foreach ($values as $value)
            <h3
                @if(!empty($value['popover']))
                    @mouseenter="$popovers('{{ $value['popover'] }}')"
                data-trigger="mouseenter"
                @endif
                class="text-lg {{ $value['class'] }}"
            >
                {{ $value['value'] }}
            </h3>
        @endforeach
    </div>
    {{-- Content --}}
</x-filament::section>

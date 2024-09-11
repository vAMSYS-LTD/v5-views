<div class="card">
    <div class="card-header flex justify-between items-center !border-b-0 !pb-0">
        <div>{{ $title }}</div>
        <span class="my-auto text-xs" @if($popover) @mouseenter="$popovers('{{ $popover }}')" data-trigger="mouseenter" @endif>
            {{ $subtitle }}
        </span>
    </div>
    <div class="px-4">
        <div class="flex justify-between">
            <div class="grow overflow-hidden">
                <div class="flex w-full justify-around gap-2">
                    @foreach ($values as $value)
                        <h3
                            @if(!empty($value['popover']))
                                @mouseenter="$popovers('{{ $value['popover'] }}')"
                                data-trigger="mouseenter"
                            @endif
                            class="text-lg my-2 {{ $value['class'] }}"
                        >
                            {{ $value['value'] }}
                        </h3>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    @foreach($availableContainers as $container)
        <div class="grid grid-cols-5">
            <div>
                <div><span class="font-bold">Type: </span>{{ $container->type }}</div>
                <div class="grid grid-cols-2">
                    <div><span class="font-bold">Weight: </span>{{ $container->weight }}</div>
                    <div><span class="font-bold">Units: </span>{{ $container->size }}</div>
                </div>
                <div>
                    {{ $container->notes }}
                </div>
            </div>

        </div>

    @endforeach
    @foreach($selectedContainers as $selectedContainer)
        {{ $selectedContainer }}
    @endforeach
</div>

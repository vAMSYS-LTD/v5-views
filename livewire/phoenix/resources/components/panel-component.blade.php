<div class="col-span-{{ $data['width']}}">
    <div class="card">
        <div class="card-header">
            <h5 class="text-lg font-semibold">{{ $data['heading'] }}</h5>
        </div>
        <div class="grid grid-cols-12 px-6 py-2">
            @foreach($data['component'] as $component)
                @switch($component['type'])
                    @case('text')
                        <livewire:phoenix.resources.components.text-component :data="$component['data']" />
                        @break
                    @case('image')
                        <livewire:phoenix.resources.components.image-component :data="$component['data']" />
                        @break
                    @case('button')
                        <livewire:phoenix.resources.components.button-component :data="$component['data']" />
                        @break
                    @case('alert')
                        <livewire:phoenix.resources.components.alert-component :data="$component['data']" />
                        @break
                    @case('youtube')
                        <livewire:phoenix.resources.components.youtube-component :data="$component['data']" />
                        @break
                    @default
                        {{ $component['type'] }}
                @endswitch
            @endforeach
        </div>
    </div>
</div>


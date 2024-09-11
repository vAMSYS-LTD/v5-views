<div class="grid grid-cols-12 gap-4">
    @if(is_array($badge->content))
    @foreach($badge->content as $panel)
            <div class="col-span-{{ $panel['data']['width']}}">
                <div class="{{ $panel['type'] == 'panel'?'card':'' }}">
                    @if($panel['type'] == 'panel')
                        <div class="card-header">
                            <h5 class="text-lg font-semibold">{{ $panel['data']['heading'] }}</h5>
                        </div>
                    @endif
                    <div class="grid grid-cols-12 px-6 py-2 space-y-2">
                        @foreach($panel['data']['component'] as $component)
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
    @endforeach
    @endif
    <div class="col-span-12">
        {{ $this->table }}
    </div>


</div>


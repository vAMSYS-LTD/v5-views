<div class="grid grid-cols-12 gap-4">
    @foreach($page->content as $panel)
        @php
            $ranks = $panel['data']['ranks'] ?? null;
            $showPanel = false;
            if(empty($ranks) || in_array($this->pilot->rank_id, $ranks)) {
                $showPanel = true;
            }
        @endphp
        @if($showPanel)
            <div class="col-span-{{ $panel['data']['width']}}">
                <div class="w-full{{ $panel['type'] == 'panel'?' card':'' }}">
                    @if($panel['type'] == 'panel')
                        <div class="card-header">
                            <h5 class="text-lg font-semibold">{{ $panel['data']['heading'] }}</h5>
                        </div>
                    @endif
                    <div
                        class="tiptap-editor grid grid-cols-12 py-2 {{ $panel['type'] == 'panel'?'px-6 gap-4':'gap-y-4' }}">
                        @foreach($panel['data']['component'] as $component)
                            @php
                                $ranks = $component['data']['ranks'] ?? null;
                                $showComponent = false;
                                if(empty($ranks) || in_array($this->pilot->rank_id, $ranks)) {
                                    $showComponent = true;
                                }
                            @endphp
                            @if($showComponent)
                            @switch($component['type'])
                                @case('panel')
                                    <livewire:phoenix.resources.components.panel-component :data="$component['data']" />
                                    @break
                                @case('text')
                                    <livewire:phoenix.resources.components.text-component :data="$component['data']" />
                                    @break
                                @case('image')
                                    <livewire:phoenix.resources.components.image-component :data="$component['data']" />
                                    @break
                                @case('button')
                                    <livewire:phoenix.resources.components.button-component :data="$component['data']" />
                                    @break
                                @case('internal-button')
                                    <livewire:phoenix.resources.components.internal-button :data="$component['data']" />
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
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    @endforeach
    @if(false)
        <div class="grid grid-cols-1"></div>
        <div class="grid grid-cols-2"></div>
        <div class="grid grid-cols-3"></div>
        <div class="grid grid-cols-4"></div>
        <div class="grid grid-cols-5"></div>
        <div class="grid grid-cols-6"></div>
        <div class="grid grid-cols-7"></div>
        <div class="grid grid-cols-8"></div>
        <div class="grid grid-cols-9"></div>
        <div class="grid grid-cols-10"></div>
        <div class="grid grid-cols-11"></div>
        <div class="grid grid-cols-12">
            <div class="col-span-1"></div>
            <div class="col-span-2"></div>
            <div class="col-span-3"></div>
            <div class="col-span-4"></div>
            <div class="col-span-5"></div>
            <div class="col-span-6"></div>
            <div class="col-span-7"></div>
            <div class="col-span-8"></div>
            <div class="col-span-9"></div>
            <div class="col-span-10"></div>
            <div class="col-span-11"></div>
            <div class="col-span-12"></div>
        </div>
    @endif
</div>

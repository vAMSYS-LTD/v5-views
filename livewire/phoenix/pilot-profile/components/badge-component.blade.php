<div {{ count($badges) == 0 ? 'hidden':'' }} style="{{ count($badges) > 0 ? '' : 'display: contents'}}">
    @if($badges->count() > 0)
        <div class="card">
            <div class="card-header flex justify-between items-center !border-b-0 !pb-0">
                <h4 class="card-title">{{ $badgesName }}</h4>
            </div>
            <div class="px-6 pb-6 pt-2 h-96 overflow-auto">
                <div class="flex flex-wrap justify-around space-y-2">
                    @foreach($badges as $badge)
                        <div class="text-center">
                            <div>
                                <img src="{{ Storage::disk('do_spaces')->url($badge->image) }}" alt="{{ $badge->name }}" class="w-full h-full object-cover" />
                            </div>
                            <div>
                                {{ $badge->pivot->created_at->format('M j, y') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>


@php use Illuminate\Mail\Markdown; @endphp
<div class="{{ $componentWidth }}" {{ $alerts->count() == 0 ? 'hidden':'' }} style="{{ $alerts->count() > 0 ? '' : 'display: contents'}}">
    @if($alerts->count() > 0)
        <div class="flex flex-col gap-2">
            @foreach($alerts as $alert)
                <div
                    class="alert alert-{{ $alert->type }}">
                        <strong>{{ $alert->title }}</strong> {!! $alert->content_markdown?Markdown::parse($alert->content_markdown):null !!}
                </div>
            @endforeach
        </div>
    @endif

</div>

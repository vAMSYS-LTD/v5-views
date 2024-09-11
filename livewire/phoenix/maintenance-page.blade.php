<div>
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">{{ $airline->name }} is under Maintenance</h4>
        </div>
        <div class="px-6 py-2 space-y-2">
            @if($airline->maintenance_reason)
                {!! $airline->maintenance_reason !!}
            @else
                We are performing some maintenance. We will be back soon!
            @endif
        </div>
    </div>
</div>

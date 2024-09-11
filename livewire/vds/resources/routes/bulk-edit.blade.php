<div class="space-y-2">
    @foreach($routes as $route)
        <livewire:vds.resources.routes.bulk-edit-item :$route :$airports :$stands :$fleets :$containers :$factors
                                                      :key="$route->id"/>
    @endforeach
</div>

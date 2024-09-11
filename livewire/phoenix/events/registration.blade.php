<div>
    @if($this->registered)
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Registration</h4>
            </div>
            <div class="px-6 py-2 flex flex-col space-y-2">
                <form wire:submit="unregister">
                    <button type="submit" class="btn btn-danger w-full mb-2">Remove Registration</button>
                </form>
            </div>
        </div>
    @else
        @if($event->open_registrations_at->lte(now()) && $event->close_registrations_at->gte(now()))
            <div class="card">
                <div class="card-header flex justify-between items-center">
                    <h4 class="card-title">Registration</h4>
                </div>
                <div class="px-6 py-2 flex flex-col space-y-2">
                    <form wire:submit="register">
                        <label for="ctnSelect1">Select Network</label>
                        <select id="ctnSelect1" class="form-select text-white-dark" required name="network" wire:model.live="network">
                            @if($availableNetworks)
                                @foreach($availableNetworks as $network)
                                    <option {{ $loop->first ? 'selected' : '' }} value="{{ strtolower($network) }}">{{ $network }}</option>
                                @endforeach
                            @endif
                        </select>
                        <button type="submit" class="btn btn-primary w-full mt-4 mb-2">Register</button>
                    </form>
                </div>
            </div>
        @endif
    @endif
</div>

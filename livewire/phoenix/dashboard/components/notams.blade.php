<div class="{{ $componentWidth }}" {{ $this->showNotams ? '':'hidden' }} style="{{ $this->showNotams ? '' : 'display: contents'}}">
    @if($this->showNotams)
        {{ $this->table }}
    @endif
</div>

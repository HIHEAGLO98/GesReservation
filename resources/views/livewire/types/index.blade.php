<div>
    @if ($isBtnAddClicked)
        @include("livewire.types.create")
    @else
    @include("livewire.types.list")
    @endif
</div>
<div>
    @if ($isBtnAddClicked)
        @include("livewire.salles.create")
    @else
    @include("livewire.salles.list")
    @endif
</div>
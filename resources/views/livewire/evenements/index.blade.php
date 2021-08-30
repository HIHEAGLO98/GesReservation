<div wire:ignore.self>
    @if ($currentPage == PAGECREATEFORM)
        @include("livewire.evenements.create")
    @endif

    @if ($currentPage == PAGEEDITFORM)
        @include("livewire.evenements.edit")
    @endif

    @if($currentPage == PAGELIST)
        @include("livewire.evenements.list")
    @endif
</div>

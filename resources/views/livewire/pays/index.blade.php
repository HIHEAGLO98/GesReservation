<div wire:ignore.self>
    @if ($currentPage == PAGECREATEFORM)
        @include("livewire.pays.create")
    @endif

    @if ($currentPage == PAGEEDITFORM)
        @include("livewire.pays.edit")
    @endif

    @if($currentPage == PAGELIST)
        @include("livewire.pays.list")
    @endif
</div>

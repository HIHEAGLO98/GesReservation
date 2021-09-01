<div wire:ignore.self>
    @if ($currentPage == PAGECREATEFORM)
        @include("livewire.events.create")
    @endif

    @if ($currentPage == PAGEEDITFORM)
        @include("livewire.events.edit")
    @endif

    @if($currentPage == PAGELIST)
        @include("livewire.events.list")
    @endif
</div>

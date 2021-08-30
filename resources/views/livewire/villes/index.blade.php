<div wire:ignore.self>
    @if ($currentPage == PAGECREATEFORM)
        @include("livewire.villes.create")
    @endif

    @if ($currentPage == PAGEEDITFORM)
        @include("livewire.villes.edit")
    @endif

    @if($currentPage == PAGELIST)
        @include("livewire.villes.list")
    @endif
</div>

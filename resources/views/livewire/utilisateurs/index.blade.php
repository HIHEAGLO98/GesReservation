<div wire:ignore.self>
    @if ($currentPage == PAGECREATEFORM)
        @include("livewire.utilisateurs.create")
    @endif

    @if ($currentPage == PAGEEDITFORM)
        @include("livewire.utilisateurs.edit")
    @endif

    @if($currentPage == PAGELIST)
        @include("livewire.utilisateurs.list")
    @endif
</div>

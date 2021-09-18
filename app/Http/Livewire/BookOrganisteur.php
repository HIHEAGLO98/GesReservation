<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Participant;
use App\Models\Reservation;
use Livewire\WithPagination;

class BookOrganisteur extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    
    public function render()
    {
        return view('livewire.reservations.book',
        [
            "participant"=>Participant::all(),
            "bookings" => Reservation::latest()->paginate(10),
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }
}

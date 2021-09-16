<?php

namespace App\Http\Livewire;

use App\Models\Evenement;
use App\Models\Reservation;
use App\Models\Ticket;
use App\Models\User;
use Livewire\Component;


class Admin extends Component
{
    public $nombre;
    public $booking ;
    public $tickets;
    public $evenement;

    public function render()
    {
        $this->nombre = User::count();
        $this->booking = Reservation::count();
        $this->evenement = Evenement::count();
        $this->tickets = Ticket::count();

        return view('livewire.admin.index',[
            "bookings"=>Reservation::latest(),
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }
}

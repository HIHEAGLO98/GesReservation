<?php

namespace App\Http\Livewire;

use App\Models\Evenement;
use App\Models\Reservation;
use App\Models\Ticket;
use Livewire\Component;
use App\Models\User;

class Rapport extends Component
{
    public $nombre;
    public $ticket;
    public $reservation;
    public $event;
    public function render()
    {
        $this->ticket = Ticket::count();
        $this->nombre = User::count();
        $this->reservation = Reservation::count();

        $this->event = Evenement::count();
        
        return view('livewire.rapport.index',[
            'users' =>User::all(),
            'tickets' =>Ticket::all(),
            'bookings'=>Reservation::latest(),
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

  


}

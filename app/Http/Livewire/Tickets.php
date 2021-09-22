<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use App\Models\Evenement;
use App\Models\Participant;
use App\Models\Type_ticket;
use Illuminate\Support\Facades\Auth;

class Tickets extends Component
{
    public $newTicket = [];
    public function render()
    {

        return view('livewire.tickets.index',[
            "type_tickets" => Type_ticket::all(),
            "evenements" => Evenement::all(),

        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    protected $rules = [
        "newTicket.lib_ticket" => 'required[min:5|max:50',
        "newTicket.mode_paiement" => 'required',
        "newTicket.evenement_id" => 'required',
        "newTicket.type_ticket_id" => 'required',

    ];


    public function save()
    {
       $validationAttributes =  $this->validate();
       $userOnLine = Auth::user()->id;
       $user = Participant::where('user_id', '=',$userOnLine)->get();
       $user = $user[0];
       $validationAttributes["newTicket"] ["participant_id"] = $user->id;

       Ticket::create($validationAttributes["newTicket"]);

       $this->newTicket = [];

       $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Ticket payé avec succès!!"]);

        return redirect()->route('acceuils.index');

    }


}

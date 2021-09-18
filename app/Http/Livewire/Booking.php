<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Image;
use Livewire\Component;
use App\Models\Participant;
use App\Models\Reservation;
use Livewire\WithPagination;

class Booking extends Component
{

    use WithPagination;
    
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        return view('livewire.bookings.index',
        [
            "participant"=> Participant::all(),
            "bookings" => Reservation::latest()->paginate(10),
            "images" => Image::all(),
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }
    

    public function index()
    {
       
        return view('livewire.bookings.list',
        [
            "participant"=> Participant::all(),
            "bookings" => Reservation::all(),
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }


    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("ShowConfirmMessage",["message"=>
        ["text" =>"Vous êtes sur le point de supprimer $name de la liste. Voulez-vous continuer?",
          "title" => "Êtes-vous sur de continuer?",
          "type" => "warning",
          "data" => [
              "booking_id" => $id
          ]
        ]]);
    }

    public function deleteBooking($id)
    {
        Reservation::destroy($id);
        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Reservation supprimée avec succès!!"]);

    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use App\Models\User;
use Livewire\Component;
use App\Models\Reservation;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade as PDF;

class Reservations extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        return view('livewire.reservations.index',
        [
            "participant"=>Participant::all(),
            "bookings" => Reservation::latest()->paginate(10),
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    //générer un PDF
    public function generatePDF()
    {
        $bookings = Reservation::all();
        view()->share('bookings', $bookings);
       $pdf = PDF::loadView('report.booking', $bookings);
        return $pdf->download("Reservation.pdf");
    }
}

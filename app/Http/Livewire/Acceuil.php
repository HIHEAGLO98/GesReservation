<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Image;
use App\Mail\SendMail;
use Livewire\Component;
use App\Models\Evenement;
use App\Models\Participant;
use App\Models\Reservation;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Acceuil extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public string $query = '';
    protected $queryString = [
        'query' => ['except' => '']

    ];

    public function index()
    {
        $images = Image::latest()->paginate(6);
        $evenements = Evenement::all();
        return view('front.layout',compact('images','evenements'));
    }

    public function render()
    {
        return view('livewire.acceuils.index',[
            "images" => Image::latest()->paginate(6),
            "evenements" => Evenement::where('nom',  'LIKE', "%{$this->query}%"),
        ],
        [
            "participant" => Participant::all(),
        ],)
        ->extends("layouts.master")
        ->section("contenu");
    }

    //envoi de mail après que la personne ait à reserver une place pour un événement
    public function MailerSender(array $data)
    {
        Mail::to($data['email'])
        ->send(new SendMail($data));

        return view('livewire.acceuils.index');

    }


    public function booking($evenement, $user)
    {
        $userOnLine = Auth::user();
        $user = Participant::where('user_id', '=',$userOnLine->id)->get();
        $user = $user[0];

       Reservation::create(["evenement_id" =>$evenement,
                              "participant_id"=>$user['id'],
        ]);

        $evenement = Evenement::find($evenement);

        $info = [
            'name'=> $userOnLine->name,
            'email'=> $userOnLine->email,
            'subject'=> "Réservation approuvée",
            'message' => '<p>Vous venez de réserver une place pour l\'événement "' . $evenement->nom .'". </p>
                <p>Voici les informations par rapport à cet événement:</p>
                <ul>
                    <li> Organisateur : ' .$evenement->organisateur->nom . '</li>
                    <li> Date de début : ' . date('d/m/Y', strtotime($evenement->datedebut)) . '</li>
                    <li> Date de fin : ' . date('d/m/Y', strtotime($evenement->datefin)) . '</li>
                    <li> heure de début : ' .$evenement->heuredebut . '</li>
                    <li> heure de fin : ' .$evenement->heurefin . '</li>
                    <li> adresse : ' . $evenement->adresse. '</li>
                    <li> lieu : ' . $evenement->salle->libelle_salle. '</li>
                    <li>Contacts organisateur
                        <ul class="mail-contact">
                            <li>
                                <i class="fas fa-envelope"></i><a class="text-success" href="mailto:' . $evenement->organisateur->user->email. '">' . $evenement->organisateur->user->email . '
                            </li>
                            <li>
                                <i class="fas fa-phone"></i><a href="tel:' . $evenement->organisateur->contact . '">' . $evenement->organisateur->contact . '</a>
                            </li>
                        </ul>
                    </li>
                </ul>',
        ];

        $this->MailerSender($info);
        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Vous venez de reserver une place pour cet événement !! Consulter votre mail"]);

    }

}

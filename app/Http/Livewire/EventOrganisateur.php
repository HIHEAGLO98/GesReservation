<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Salle;
use Livewire\Component;
use App\Models\Evenement;
use App\Models\Organisateur;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Type_evenement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventOrganisateur extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = "bootstrap";
    public $newEvenement = [];
    public $editEvenement = [];
    public $photo;
    public $evenement;
    public $organisateur;

    public $currentPage = PAGELIST;

    public string $search = '';

    protected $queryString = [
        'search' => ['except' => '']

    ];

    public function render()
    {
        return view('livewire.events.index',[
            "evenements" => Evenement::where('nom',  'LIKE', "%{$this->search}%" )->paginate(10)
        ],
        [
            "organisateurs" => Organisateur::all(),
            "salles" => Salle::all(),
            "type_evenements" => Type_evenement::all(),
        ])
            ->extends("layouts.master")
            ->section("contenu");;
    }
   
    public function rules()
    {
        if( $this->currentPage == PAGEEDITFORM)
        {
            return [
                'editEvenement.nom' =>'required',
                'editEvenement.adresse'=>'required',
                'editEvenement.description' =>'required|max:500',
                'editEvenement.nombre_place'=>'required|numeric',
                'editEvenement.datedebut' =>'required|date',
                'editEvenement.datefin' =>'required',
                'editEvenement.heuredebut' => 'required',
                'editEvenement.heurefin'=>'required',
                'editEvenement.salle_id' =>'required',
                'editEvenement.type_evenement_id'=>'required',
                'editEvenement.organisateur_id' =>'required',

            ];
        }

        return [
            'newEvenement.nom' =>'required|unique:evenements,nom|max:255',
            'newEvenement.adresse' =>'required',
            'newEvenement.description' =>'required|max:500',
            'newEvenement.nombre_place' =>'required|numeric',
            'newEvenement.datedebut' =>'required|date|min:now()',
            'newEvenement.datefin' => 'required|date',
            'newEvenement.heuredebut' => 'required',
            'newEvenement.heurefin' => 'required',
            'newEvenement.salle_id' => 'required',
            'newEvenement.type_evenement_id' => 'required',
            'newEvenement.organisateur_id' => 'required',

        ];
    }


    public function goToAddEvent()
    {
        $this->currentPage = PAGECREATEFORM;

    }

    public function goToEditEvent($id)
    {
        $this->editEvenement = Evenement::find($id)->toArray();

        $this->currentPage = PAGEEDITFORM;
    }

    //Editer un événement
    public function UpdateEvent()
   {
        $validationAttributes = $this->validate();

        Evenement::find($this->editEvenement["id"])->update($validationAttributes["editEvenement"]);

        $this->dispatchBrowserEvent("ShowSuccessMessage",
            ["message" =>"Evénement modifié avec succès!!"]);
    }

    //Ajouter un événement
    public function AddEvent()
    {
       $validationAttributes =  $this->validate();
      $evenement =  Evenement::create($validationAttributes["newEvenement"]);
      $this->photo = $this->photo->store('photos','public');
      $filename = $this->photo;
      
      $image = new Image();

      $image->path = $filename;

      $evenement->images()->save($image);

       $this->newEvenement = [];

       $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"événement ajouté avec succès!!"]);

    }

    public function goToListEvent()
    {
        $this->currentPage = PAGELIST;
        $this->editEvenement = [];

    }

    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("ShowConfirmMessage",["message"=>
        ["text" =>"Vous êtes sur le point de supprimer $name de la liste. Voulez-vous continuer?",
          "title" => "Êtes-vous sur de continuer?",
          "type" => "warning",
          "data" => [
              "event_id" => $id
          ]
        ]]);
    }

    //supprimer un événement
    public function deleteEvent($id)
    {
        Evenement::destroy($id);
        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Evénement supprimé avec succès!!"]);

    }
}

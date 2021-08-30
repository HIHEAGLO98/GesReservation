<?php

namespace App\Http\Livewire;

use App\Models\Salle;
use App\Models\Ville;
use Livewire\Component;
use Livewire\WithPagination;

class Salles extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnAddClicked = false;
    public $newSalles = [];

    public string $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    
    ];

    public function render()
    {
        return view('livewire.salles.index',[
            "salles" => Salle::where('libelle_salle', 'LIKE', "%{$this->search}%")->paginate(15)
        ],
        [
            "villes" => Ville::all(),
        ])
        
            ->extends("layouts.master")
            ->section("contenu");
    }

    protected $rules = [
        'newSalles.libelle_salle' =>'required|unique:salles,libelle_salle',
        'newSalles.ville_id' => 'required',
    ];

    public function goToAddSalle()
    {
        $this->isBtnAddClicked = true;
    }
    

    public function goToListSalle()
    {
        $this->isBtnAddClicked = false;
    }


    public function addSalle()
    {
        
       $validationAttributes =  $this->validate();
       

       Salle::create($validationAttributes["newSalles"]);
       
       $this->newSalles = [];

       $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Salle Ajoutée avec succès!!"]);

    }

    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("ShowConfirmMessage",["message"=>
        ["text" =>"Vous êtes sur le point de supprimer $name de la liste. Voulez-vous continuer?",
          "title" => "Êtes-vous sur de continuer?",
          "type" => "warning",
          "data" => [
              "salle_id" => $id
          ]
        ]]);
    }


    public function deleteSalle($id)
    {
        Salle::destroy($id);
        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Salle supprimée avec succès!!"]);

    }

}

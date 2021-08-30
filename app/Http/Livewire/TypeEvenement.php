<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Type_evenement;

class TypeEvenement extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnAddClicked = false;
    public $newTypes = [];

    public function render()
    {
        return view('livewire.types.index',[
            "type_evenements" => Type_evenement::latest()->paginate(15)
             ])
            ->extends("layouts.master")
            ->section("contenu");;
    }

    protected $rules = [
        'newTypes.libelle_type_ev' =>'required|unique:type_evenements,libelle_type_ev',
    ];

    public function goToAddType()
    {
        $this->isBtnAddClicked = true;
    }

    public function goToListType()
    {
        $this->isBtnAddClicked = false;
    }


    public function addType()
    {
        //dump($this->newUser);
       $validationAttriutes =  $this->validate();
       //$validationAttriutes["newUser"] ["password"] = "password";

       Type_evenement::create($validationAttriutes["newTypes"]);
       
       $this->newTypes = [];

       $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Type d'événement Ajouté avec succès!!"]);

    }

    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("ShowConfirmMessage",["message"=>
        ["text" =>"Vous êtes sur le point de supprimer $name de la liste. Voulez-vous continuer?",
          "title" => "Êtes-vous sur de continuer?",
          "type" => "warning",
          "data" => [
              "type_id" => $id
          ]
        ]]);
    }

    public function deleteType($id)
    {
        Type_evenement::destroy($id);
        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Type d'événement supprimé avec succès!!"]);

    }
}

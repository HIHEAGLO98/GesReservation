<?php

namespace App\Http\Livewire;

use App\Models\Pays;
use App\Models\Ville;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Villes extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
   // public $isBtnAddClicked = false;

   public $currentPage = PAGELIST;

    public $newVilles = [];

    public $editVille = [];

    public string $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    
    ];

    public function render()
    {
        $pays = Pays::all();

        return view('livewire.villes.index',[
            "villes" => Ville::where('nom_ville', 'LIKE', "%{$this->search}%")->paginate(15),
        ],
        [
            "pays" => Pays::all(),
        ])
        ->extends("layouts.master")
        ->section("contenu");;
    }

   /* protected $rules = [
        'newVilles.nom_ville' =>'required|unique:villes,nom_ville',
        'newVilles.pays_id' => 'required',
    ];
    */

    public function goToAddVille()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToListVille()
    {
        $this->currentPage = PAGELIST;
        $this->editVille = [];
    }
    public function rules()
    {
        if( $this->currentPage == PAGEEDITFORM)
        {
            return [
                'editVille.nom_ville' => ['required', Rule::unique("villes", "nom_ville")->ignore($this->editVille["id"])],
                'editVille.pays_id' => 'required',
            ];
        }

        return [
        
            'newVilles.nom_ville' =>'required|unique:villes,nom_ville',
            'newVilles.pays_id' => 'required',
        ];
    }

    public function goToEditVille($id)
    {
        $this->editVille = Ville::find($id)->toArray();

        $this->currentPage = PAGEEDITFORM;
    }


    public function addVille()
    {
        
       $validationAttributes =  $this->validate();
       

       Ville::create($validationAttributes["newVilles"]);
       
       $this->newVilles = [];

       $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Ville Ajoutée avec succès!!"]);

    }

    public function updateVille()
    {

        $validationAttributes = $this->validate();

        Ville::find($this->editVille["id"])->update($validationAttributes["editVille"]);

        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Ville mise à jour avec succès!!"]);
    }


    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("ShowConfirmMessage",["message"=>
        ["text" =>"Vous êtes sur le point de supprimer $name de la liste. Voulez-vous continuer?",
          "title" => "Êtes-vous sur de continuer?",
          "type" => "warning",
          "data" => [
              "ville_id" => $id
          ]
        ]]);
    }


    public function deleteVille($id)
    {
        Ville::destroy($id);
        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Ville supprimée avec succès!!"]);

    }
}

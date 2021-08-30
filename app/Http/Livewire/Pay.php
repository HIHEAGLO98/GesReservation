<?php

namespace App\Http\Livewire;

use App\Models\Pays;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Pay extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
  
    public $newPays = [];
    public $editPays = [];
    public $currentPage = PAGELIST;

    public string $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    
    ];

    public function render()
    {
        $pays = Pays::all();
        
        return view('livewire.pays.index',[
        "pays" => Pays::where('nom_pays', 'LIKE', "%{$this->search}%")->paginate(15)

         ])
        ->extends("layouts.master")
        ->section("contenu");
    }

   /* protected $rules = [
        'newPays.nom_pays' =>'required|unique:pays,nom_pays',
    ];*/

    public function rules()
    {
        if( $this->currentPage == PAGEEDITFORM)
        {
            return [
                'editPays.nom_pays' => ['required', Rule::unique("pays", "nom_pays")->ignore($this->editPays["id"])],
            ];
        }

        return [
            'newPays.nom_pays' =>'required|unique:pays,nom_pays',
        ];
    }

    public function goToEditPays($id)
    {
        $this->editPays = Pays::find($id)->toArray();

        $this->currentPage = PAGEEDITFORM;
    }

    public function goToAddPays()
    {
        $this->currentPage = PAGECREATEFORM;
        $this->newPays = [];
    }

    public function goToListPays()
    {
        $this->currentPage = PAGELIST;
        $this->editPays = [];
    }

    public function updatePays()
    {

        $validationAttributes = $this->validate();

        Pays::find($this->editPays["id"])->update($validationAttributes["editPays"]);

        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Pays mis à jour avec succès!!"]);
    }


    public function addPays()
    {
        
       $validationAttriutes =  $this->validate();
       

       Pays::create($validationAttriutes["newPays"]);
       
       $this->newPays = [];

       $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Pays Ajouté avec succès!!"]);

    }

    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("ShowConfirmMessage",["message"=>
        ["text" =>"Vous êtes sur le point de supprimer $name de la liste. Voulez-vous continuer?",
          "title" => "Êtes-vous sur de continuer?",
          "type" => "warning",
          "data" => [
              "pays_id" => $id
          ]
        ]]);
    }


    public function deletePays($id)
    {
        Pays::destroy($id);
        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Pays supprimé avec succès!!"]);

    }
}

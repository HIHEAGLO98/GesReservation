<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Utilisateurs extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $currentPage = PAGELIST;
    public $newUser =  [];
    public $editUser = [];


    public $search = '';

    protected $queryString = [
        'search' => ['except' => '']

    ];

    public function render()
    {
        return view('livewire.utilisateurs.index' , [
            "users" => User::where('name', 'LIKE', "%{$this->search}%")->paginate(5),
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    //générer un PDF
    public function generatePDF()
    {
        $users = User::all();
        view()->share('users', $users);
       $pdf = PDF::loadView('report.users', $users);
        return $pdf->download("users.pdf");
    }

    public function rules()
    {
        if( $this->currentPage == PAGEEDITFORM)
        {
            return [
                'editUser.name' =>'required',
                'editUser.email' =>['required','email', Rule::unique("users", "email")->ignore($this->editUser["id"])],
                'editUser.adresse' =>'required',
                'editUser.sexe' =>'required',
                'editUser.ville' =>'required',
                'editUser.pays' => 'required',

            ];
        }

        return [
            'newUser.name' =>'required',
            'newUser.email' =>'required|email|unique:users,email',
            'newUser.adresse' =>'required',
            'newUser.sexe' =>'required',
            'newUser.ville' =>'required',
            'newUser.pays' => 'required',


        ];
    }


    public function goToAddUser()
    {

        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditUser($id)
    {
        $this->editUser = User::find($id)->toArray();

        $this->currentPage = PAGEEDITFORM;
    }

    public function goToListUser()
    {
        $this->currentPage = PAGELIST;
        $this->editUser = [];
    }


    public function addUser()
    {

       $validationAttributes =  $this->validate();
       $validationAttributes["newUser"] ["password"] = "password";
       $validationAttributes["newUser"] ["role"] = "admin";

       User::create($validationAttributes["newUser"]);

       $this->newUser = [];

       $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Utilisateur créé avec succès!!"]);

    }


    public function updateUser()
    {
        $validationAttributes = $this->validate();

        User::find($this->editUser["id"])->update($validationAttributes["editUser"]);

        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Administrateur mis à jour avec succès!!"]);


    }


    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("ShowConfirmMessage",["message"=>
        ["text" =>"Vous êtes sur le point de supprimer $name de la liste. Voulez-vous continuer?",
          "title" => "Êtes-vous sur de continuer?",
          "type" => "warning",
          "data" => [
              "user_id" => $id
          ]
        ]]);
    }


    public function deleteUser($id)
    {
        User::destroy($id);
        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Administrateur supprimé avec succès!!"]);

    }


}

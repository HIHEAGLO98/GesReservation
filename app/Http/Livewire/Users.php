<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search = '';
    public $user;

    protected $queryString =[
        'search' => ['except' => '']

    ];

    
    public function render()
    {
        $this->user = User::count();
    
        return view('livewire.users.index',[
            "users" => User::latest()->paginate(6),
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
              "user_id" => $id
          ]
        ]]);
    }


    public function deleteUser($id)
    {
        User::destroy($id);
        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Utilisateur supprimé avec succès!!"]);

    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organisateur;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Participant;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    protected $user = [];
    protected $participant = [];
    protected $organisateur = [];

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
   // protected $redirectTo = RouteServiceProvider::LOGIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'=>['required'],
            'adresse'=>['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

           User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role'=>   $data['role'],
            'adresse'=> $data['adresse'],
            'password' => Hash::make($data['password']),
        ]); 
        
        $max = User::selectRaw('MAX(id) as id')->get();
        $max = $max[0]['id'];
        $p = User::where('id', '=', $max)->get();
        $p = $p[0];
        

        if ($p->role == "participant") {
            
          $this->participant =  Participant::create([
                'user_id'=>$p->id,
                'nom' => $p->name,

            ]);
        }

        if ($p->role == "organisateur") {
            
          $this->organisateur = Organisateur::create([
            'user_id'=>$p->id,
            'nom' => $p->name,
          ]);
        }

        return $p;
    }
}

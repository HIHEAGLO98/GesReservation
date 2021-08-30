<?php

namespace Database\Seeders;

use App\Models\Pays;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Database\Seeder;
use Database\Seeders\TypeEvenementSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //$this->call(TypeEvenementSeeder::class);
       // $this->call(RoleTableSeeder::class);
        // \App\Models\User::factory(10)->create();
        Pays::factory(20)->create();
        Ville::factory(20)->create();
        User::factory(10)->create();
        /*
        User::find(1)->roles()->attach(1);
        User::find(2)->roles()->attach(2);
        User::find(3)->roles()->attach(3);
        User::find(4)->roles()->attach(4);*/


    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use App\Models\Contact_user;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role_admin =Role::create(['nom' => 'ADMINISTRATEUR']);
        $role_acheteur =Role::create(['nom' => 'ACHETEUR']);
        $role_vendeur =Role::create(['nom' => 'VENDEUR']);

        $admin = User::create(['name' => 'Admin','prenom' => 'admin','phone' => '0585782723','lock' => 'non','email' => 'admin@gmail.com','date_mdp' => now(),'password' => bcrypt('Admin001'),'role_id' => $role_admin->id,]);

        $acheteur = User::create(['name' => 'Acheteur','prenom' => 'acheteur','phone' => '0585782724','lock' => 'non','email' => 'acheteur@gmail.com','date_mdp' => now(),'password' => bcrypt('Acheteur001'),'role_id' => $role_acheteur->id,]);
        
        $vendeur = User::create(['name' => 'Vender','prenom' => 'vendeur','phone' => '0585782725','lock' => 'non','email' => 'vendeur@gmail.com','date_mdp' => now(),'password' => bcrypt('Vendeur001'),'role_id' => $role_vendeur->id,]);

    }
}

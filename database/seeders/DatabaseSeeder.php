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
        $role_user =Role::create(['nom' => 'ACHETEUR']);
        $role_vendeur =Role::create(['nom' => 'VENDEUR']);

        $admin = User::create(['name' => 'Admin','prenom' => 'admin','date_naissance' => '2000-08-10','email' => 'admin@gmail.com','password' => bcrypt('Admin001'),'role_id' => $role_admin->id,]);
        Contact_user::create(['contact' => '0585782723','user_id' => $admin->id,]);
    }
}

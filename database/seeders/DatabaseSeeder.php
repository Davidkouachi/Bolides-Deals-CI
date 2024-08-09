<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role_admin =Role::create(['nom' => 'ADMINISTRATEUR']);
        $role_user =Role::create(['nom' => 'UTILISATEUR']);
        $role_vendeur =Role::create(['nom' => 'VENDEUR']);

        User::create(['name' => 'Admin','email' => 'admin@gmail.com','password' => bcrypt('Admin001'),'role_id' => $role_admin->id,]);
    }
}

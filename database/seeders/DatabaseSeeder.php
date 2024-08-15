<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use App\Models\Contact_user;
use App\Models\Ville;

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

        $admin = User::create(['name' => 'Admin','prenom' => 'admin','phone' => '0585782723','lock' => 'non','email' => 'admin@gmail.com','adresse' => 'Néant','date_mdp' => now(),'password' => bcrypt('Admin001'),'role_id' => $role_admin->id,]);

        $acheteur = User::create(['name' => 'Acheteur','prenom' => 'acheteur','phone' => '0585782724','lock' => 'non','email' => 'acheteur@gmail.com','adresse' => 'Néant','date_mdp' => now(),'password' => bcrypt('Acheteur001'),'role_id' => $role_acheteur->id,]);
        
        $vendeur = User::create(['name' => 'Vender','prenom' => 'vendeur','phone' => '0585782725','lock' => 'non','email' => 'vendeur@gmail.com','adresse' => 'Néant','date_mdp' => now(),'password' => bcrypt('Vendeur001'),'role_id' => $role_vendeur->id,]);

        $villes = [
            'Abengourou','Abidjan','Aboisso','Adiaké','Adzopé','Agnibilékrou','Akoupé','Arrah','Bangolo','Bassawa','Bettié','Bocanda','Bondoukou','Bonoua','Botro','Bouaké','Bouna','Boundiali','Dabou', 'Daloa','Danané','Daoukro','Dianra','Dimbokro','Divo','Duekoué','Facobly','Ferkessédougou',
                'Gagnoa','Grand-Bassam','Grand-Lahou','Gouiné','Guiglo','Guitry','Gbon','Issia',
                'Jacqueville','Katiola','Kong','Korhogo','Kounahiri','Kouassi-Datékro','Kouibly','Lakota',
                'Lomokankro','Man','Mankono','Marcory','Méagui','Minignan','M’Bahiakro','Nassian',
                'Niakaramandougou','Odienné','Oumé','Ouellé','San-Pédro','Sakassou','Samoé','Sassandra',
                'Séguéla','Sikensi','Sinfra','Sipilou','Soubré','Tabou','Tanda','Tiassalé','Tiapoum',
                'Tiébissou','Tengréla','Toulepleu','Touba','Toumodi','Transua','Vavoua','Yamoussoukro',
                'Zouan-Hounien','Zoukougbeu',
        ];

        foreach ($villes as $ville) {
            Ville::create(['nom' => $ville]);
        }

    }
}

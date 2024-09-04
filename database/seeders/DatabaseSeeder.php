<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use App\Models\Contact_user;
use App\Models\Ville;
use App\Models\Type_marque;
use App\Models\Parametrage;
use App\Models\Formule;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $types = ['4x4','berline','break','bus','camion','coupé','mini-bus','moto','pick-up','suv','tricycle','utilitaire','autre'];
        foreach ($types as $value) {
            Type_marque::create(['nom' => $value]);
        }

        $para = Parametrage::create(['nbre_jours_ligne' => '14','nbre_jours_delete' => '5','nbre_refresh' => '2']);

        $basique = Formule::create(['nom' => 'BASIQUE', 'prix' => '0', 'gratuit' => 'oui', 'nbre_photo' => '6', 'duree_vie' => '14', 'nbre_refresh' => '2', 'badge' => 'non', 'tete_liste' => 'non', 'top_annonce' => 'non', 'stat' => 'non', 'couleur' => 'info']);
        $standard = Formule::create(['nom' => 'STANDARD', 'prix' => '10.000', 'gratuit' => 'non', 'nbre_photo' => '8', 'duree_vie' => '20', 'nbre_refresh' => '3', 'badge' => 'non', 'tete_liste' => '12', 'top_annonce' => 'non', 'stat' => 'non', 'couleur' => 'success']);
        $pro = Formule::create(['nom' => 'PRO', 'prix' => '20.000', 'gratuit' => 'non', 'nbre_photo' => '10', 'duree_vie' => '25', 'nbre_refresh' => '4', 'badge' => 'oui', 'tete_liste' => '24', 'top_annonce' => 'oui', 'stat' => 'non', 'couleur' => 'danger']);
        $max = Formule::create(['nom' => 'MAX', 'prix' => '35.000', 'gratuit' => 'non', 'nbre_photo' => '15', 'duree_vie' => '30', 'nbre_refresh' => '5', 'badge' => 'oui', 'tete_liste' => '72', 'top_annonce' => 'oui', 'stat' => 'oui', 'couleur' => 'warning']);

        $role_admin =Role::create(['nom' => 'ADMINISTRATEUR']);
        $role_user =Role::create(['nom' => 'UTILISATEUR']);

        $admin = User::create(['name' => 'Admin','prenom' => 'admin','phone' => '0585782723','lock' => 'non','email' => 'admin@gmail.com','adresse' => 'Néant','date_mdp' => now(),'password' => bcrypt('Admin001'),'role_id' => $role_admin->id,]);
        
        $user = User::create(['name' => 'Vender','prenom' => 'vendeur','phone' => '0585782725','lock' => 'non','email' => 'vendeur@gmail.com','adresse' => 'Néant','date_mdp' => now(),'password' => bcrypt('Vendeur001'),'role_id' => $role_user->id,]);

        $villes = [
            'Abengourou','Abidjan','Aboisso','Adiaké','Adzopé','Agnibilékrou','Akoupé','Arrah','Bangolo','Bassawa','Bettié','Bocanda','Bondoukou','Bonoua','Botro','Bouaké','Bouna','Boundiali','Dabou', 'Daloa','Danané','Daoukro','Dianra','Dimbokro','Divo','Duekoué','Facobly','Ferkessédougou','Gagnoa','Grand-Bassam','Grand-Lahou','Gouiné','Guiglo','Guitry','Gbon','Issia',
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

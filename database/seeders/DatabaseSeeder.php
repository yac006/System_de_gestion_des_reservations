<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User ;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        // User::factory(10)->create();

        // //---------"ROLES" table : ---------------
        DB::unprepared('SET IDENTITY_INSERT roles ON');
        DB::statement("INSERT INTO roles (id_role , designation) VALUES ( 1 , 'Admin')");
        DB::statement("INSERT INTO roles (id_role , designation) VALUES ( 2 , 'GRH')");
        DB::statement("INSERT INTO roles (id_role , designation) VALUES ( 3 , 'Chef EXP')");
        DB::statement("INSERT INTO roles (id_role , designation) VALUES ( 4 , 'Charge EXP')");
        DB::statement("INSERT INTO roles (id_role , designation) VALUES ( 5 , 'Chef HSE' )");
        DB::statement("INSERT INTO roles (id_role , designation) VALUES ( 6 , 'Charge HSE')");
        DB::statement("INSERT INTO roles (id_role , designation) VALUES ( 7 , 'Employe')");
        DB::unprepared('SET IDENTITY_INSERT roles OFF');

        // //---------"SECTEURS" table : ---------------
        DB::unprepared('SET IDENTITY_INSERT secteurs ON');
        DB::statement("INSERT INTO secteurs (num_secteur , nom_secteur) VALUES ( 1 , 'Informatique')");
        DB::statement("INSERT INTO secteurs (num_secteur , nom_secteur) VALUES ( 2 , 'Exploitation')");
        DB::statement("INSERT INTO secteurs (num_secteur , nom_secteur) VALUES ( 3 , 'HSE')");
        DB::statement("INSERT INTO secteurs (num_secteur , nom_secteur) VALUES ( 4 , 'RH')");
        DB::statement("INSERT INTO secteurs (num_secteur , nom_secteur) VALUES ( 5 , 'Commercial')");
        DB::statement("INSERT INTO secteurs (num_secteur , nom_secteur) VALUES ( 6 , 'Comptabilité')");
        DB::statement("INSERT INTO secteurs (num_secteur , nom_secteur) VALUES ( 7 , 'Secrétariat')");
        DB::statement("INSERT INTO secteurs (num_secteur , nom_secteur) VALUES ( 8 , 'Maintenance')");
        DB::statement("INSERT INTO secteurs (num_secteur , nom_secteur) VALUES ( 9 , 'Assurance')");
        DB::statement("INSERT INTO secteurs (num_secteur , nom_secteur) VALUES ( 10 , 'Direction')");
        DB::statement("INSERT INTO secteurs (num_secteur , nom_secteur) VALUES ( 11 , 'Securité')");
        DB::statement("INSERT INTO secteurs (num_secteur , nom_secteur) VALUES ( 12 , 'Marketing')");
        DB::unprepared('SET IDENTITY_INSERT secteurs OFF');

        // //---------"SALLES" table : ---------------
        DB::unprepared('SET IDENTITY_INSERT salles ON');
        DB::statement("INSERT INTO salles (num_sal , designation) VALUES ( 1 , 'Salle 01')");
        DB::statement("INSERT INTO salles (num_sal , designation) VALUES ( 2 , 'Salle 02')");
        DB::statement("INSERT INTO salles (num_sal , designation) VALUES ( 3 , 'Salle 03')");
        DB::unprepared('SET IDENTITY_INSERT salles OFF');

        // //---------"TYPE_VEHICULES" table : ---------------
        DB::unprepared('SET IDENTITY_INSERT type_vehicules ON');
        DB::statement("INSERT INTO type_vehicules (id_type , type ) VALUES ( 1 , 'Touristique')");
        DB::statement("INSERT INTO type_vehicules (id_type , type ) VALUES ( 2 , 'Utilitaire')");
        DB::statement("INSERT INTO type_vehicules (id_type , type ) VALUES ( 3 , 'Autres')");
        DB::unprepared('SET IDENTITY_INSERT type_vehicules OFF');

        // //---------"VEHICULES" table : ---------------
        DB::unprepared('SET IDENTITY_INSERT vehicules ON');
        DB::statement("INSERT INTO vehicules (id_vehc , marque , immat , num_parc , id_type) VALUES ( 1 , 'Passate' ,'0614572', 3 , 1)");
        DB::statement("INSERT INTO vehicules (id_vehc , marque , immat , num_parc , id_type) VALUES ( 2 , 'Accent' ,'0688502', 1 , 1)");
        DB::statement("INSERT INTO vehicules (id_vehc , marque , immat , num_parc , id_type) VALUES ( 3 , 'Jumper' ,'061759', 2 , 3)");
        DB::statement("INSERT INTO vehicules (id_vehc , marque , immat , num_parc , id_type) VALUES ( 4 , 'Master' ,'069633', 4 , 2)");
        DB::unprepared('SET IDENTITY_INSERT vehicules OFF');
            
        
        // //-----------------------------INSERTION DES ADMINS (Création des comptes) -----------------------//
        // //---------"USERS" table : ---------------
        DB::unprepared('SET IDENTITY_INSERT users ON');
        User::create(['user_id' => 1,'pseudo' => "Aimad_bl",'email' => "aimad@gmail.com",'password' => Hash::make("bladmin"),'avatar_path' => "images/avatars/9.jpg",'actif' => "True",'id_role' => 1]);
        User::create(['user_id' => 2,'pseudo' => "Farid_bl",'email' => "farid97@gmail.com",'password' => Hash::make("blrh"),'avatar_path' => "images/avatars/3.jpg",'actif' => "True",'id_role' => 2]);
        User::create(['user_id' => 3,'pseudo' => "Walid_bl",'email' => "walid@gmail.com",'password' => Hash::make("blexp"),'avatar_path' => "images/avatars/2.jpg",'actif' => "True",'id_role' => 3]);
        User::create(['user_id' => 4,'pseudo' => "Rabah_bl",'email' => "rabah@gmail.com",'password' => Hash::make("blexp"),'avatar_path' => "images/avatars/6.jpg",'actif' => "True",'id_role' => 4]);
        User::create(['user_id' => 5,'pseudo' => "Robert_bl",'email' => "robert@gmail.com",'password' => Hash::make("blhse"),'avatar_path' => "images/avatars/5.jpg",'actif' => "True",'id_role' => 5]);
        User::create(['user_id' => 6,'pseudo' => "Nadir_bl",'email' => "nadir@gmail.com",'password' => Hash::make("blhse"),'avatar_path' => "images/avatars/2.jpg",'actif' => "True",'id_role' => 6]);
        User::create(['user_id' => 7,'pseudo' => "aziz_bl",'email' => "aziz@gmail.com",'password' => Hash::make("bl2022"),'avatar_path' => "images/avatars/1.jpg",'actif' => "True",'id_role' => 7]);
        User::create(['user_id' => 8,'pseudo' => "nassim_bl",'email' => "nassim@gmail.com",'password' => Hash::make("bl2022"),'avatar_path' => "images/avatars/4.jpg",'actif' => "True",'id_role' => 7]);
        User::create(['user_id' => 9,'pseudo' => "mourad_bl",'email' => "mourad@gmail.com",'password' => Hash::make("bl2022"),'avatar_path' => "images/avatars/12.jpg",'actif' => "True",'id_role' => 7]);
        User::create(['user_id' => 10,'pseudo' => "samir_bl",'email' => "samir@gmail.com",'password' => Hash::make("bl2022"),'avatar_path' => "images/avatars/5.jpg",'actif' => "True",'id_role' => 7]);
        User::create(['user_id' => 11,'pseudo' => "Nacer_bl",'email' => "moussa@gmail.com",'password' => Hash::make("bl2022"),'avatar_path' => "images/avatars/2.jpg",'actif' => "True",'id_role' => 7]);
        User::create(['user_id' => 12,'pseudo' => "Slimane_bl",'email' => "salim@gmail.com",'password' => Hash::make("bl2022"),'avatar_path' => "images/avatars/2.jpg",'actif' => "True",'id_role' => 7]);
        DB::unprepared('SET IDENTITY_INSERT users OFF');

        // //---------"EMPLOYES" table : ---------------
        DB::unprepared('SET IDENTITY_INSERT employes ON');
        DB::statement("INSERT INTO employes ( num_emp , nom_emp , prenom_emp , poste , type , tele , num_secteur , user_id ) VALUES (1 ,'Herroug','Imad','Chef Dpt','interne','00018870',1,1)");
        DB::statement("INSERT INTO employes ( num_emp , nom_emp , prenom_emp , poste , type , tele , num_secteur , user_id ) VALUES (2 ,'Jarmouli','Farid','Personnel','interne','05017830',4,2)");
        DB::statement("INSERT INTO employes ( num_emp , nom_emp , prenom_emp , poste , type , tele , num_secteur , user_id ) VALUES (3 ,'Iberraken','Walid','Chef Dpt','interne','03017890',2,3)");
        DB::statement("INSERT INTO employes ( num_emp , nom_emp , prenom_emp , poste , type , tele , num_secteur , user_id ) VALUES (4 ,'Moussaoui','Rabah','Chargé EXP','interne','00918200',2,4)");
        DB::statement("INSERT INTO employes ( num_emp , nom_emp , prenom_emp , poste , type , tele , num_secteur , user_id ) VALUES (5 ,'Robert','Rachedi','Chef HSE','interne','00817200',3,5)");
        DB::statement("INSERT INTO employes ( num_emp , nom_emp , prenom_emp , poste , type , tele , num_secteur , user_id ) VALUES (6 ,'Ait slimane','Nadir','Chargé HSE','interne','00318440',3,6)");
        DB::statement("INSERT INTO employes ( num_emp , nom_emp , prenom_emp , poste , type , tele , num_secteur , user_id ) VALUES (7 ,'Hamza','Laziz','Help Desk','interne','00015420',7,7)");
        DB::statement("INSERT INTO employes ( num_emp , nom_emp , prenom_emp , poste , type , tele , num_secteur , user_id ) VALUES (8 ,'Ben laribi','Nassim','Paye','interne','00234420',4,8)");
        DB::statement("INSERT INTO employes ( num_emp , nom_emp , prenom_emp , poste , type , tele , num_secteur , user_id ) VALUES (9 ,'Ben ghanem','Mourad','Vulcanisateur','interne','00885016',8,9)");
        DB::statement("INSERT INTO employes ( num_emp , nom_emp , prenom_emp , poste , type , tele , num_secteur , user_id ) VALUES (10 ,'brahmi','samir','Agent commercial','interne','00885016',5,10)");
        DB::statement("INSERT INTO employes ( num_emp , nom_emp , prenom_emp , poste , type , tele , num_secteur , user_id ) VALUES (11 ,'Benuchen','Nacer','Chargé Marketing','interne','00885016',12,11)");
        DB::statement("INSERT INTO employes ( num_emp , nom_emp , prenom_emp , poste , type , tele , num_secteur , user_id ) VALUES (12 ,'Boualouche','Slimane','Agent Comptable','interne','00885016',6,12)");
        DB::unprepared('SET IDENTITY_INSERT employes OFF');
    }
}


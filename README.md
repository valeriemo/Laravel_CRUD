# Laravel_CRUD
Tp1 | Cadriciel web
Création d'un blog comme réseau social pour des étudiants.


1- creation d'un nouveau projet laravel
2- creation de la base de donnée my_blog
3- configuration de la BD dans le fichier .env

4- on crée les models 
#php artisan make:model Etudiant -m
#php artisan make:model Ville -m

5- On crée les tables (e nom de votre table est au pluriel et minuscule)
#php artisan make:migration create_etudiants_table
#php artisan make:migration create_villes_table

6- Une fois que vous avez créé la migration, nous devons la remplir avec les champs dont nous 
avons besoin dans la méthode Schema::create

7- on lance la migration
#php artisan migrate

8- On crée nos usines
#php artisan make:factory VilleFactory
#php artisan make:factory EtudiantFactory

9- On crée 15 ville:
#php artisan tinker
#\App\Models\Ville::factory()->count(15)->create()  

10- On crée 100 étudiants:
\App\Models\Etudiant::factory()->count(100)->create()  

** En créant mes factories en ligne de commande (avec les commandes ci-dessus), lors de la création des étudiants, 100 nouvelles villes étaient créer aussi. Suite à mes recherches, pour résoudre ce problème, j'ai utilisé les seeders (répertoire databaseSeeder) et passer la commande #php artisan migrate:fresh --seed.

11- On crée le controller en le connectant avec le model
 #php artisan make:controller VilleController -m Ville
 #php artisan make:controller EtudiantController -m Etudiant
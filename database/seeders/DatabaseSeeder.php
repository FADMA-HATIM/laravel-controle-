<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@123'),
            'role' => 'admin', 
        ]);

        User::factory()->create([
            'name' => 'frontend_dev',
            'email' => 'frontend_dev@gmail.com',
            'password' => Hash::make('frontend@123'),
            'role' => 'frontend_dev', 
        ]);

        User::factory()->create([
            'name' => 'backend_dev',
            'email' => 'backend_dev@gmail.com',
            'password' => Hash::make('backend@123'),
            'role' => 'backend_dev', 
        ]);

        User::factory()->create([
            'name' => 'designer',
            'email' => 'designer@gmail.com',
            'password' => Hash::make('designer@123'),
            'role' => 'designer', 
        ]);

        Project::create([
            'name' => 'Gestion d\'école',
            'description' => 'Projet de gestion d\'une école',
            'start_date' => now(),
            'end_date' => now()->addMonths(6),
        ]);

        Project::create([
            'name' => 'Gestion des stocks',
            'description' => 'Projet de gestion des stocks',
            'start_date' => now(),
            'end_date' => now()->addMonths(6),
        ]);

        Project::create([
            'name' => 'Gestion des ressources humaines',
            'description' => 'Projet de gestion des ressources humaines',
            'start_date' => now(),
            'end_date' => now()->addMonths(6),
        ]);
        
 
        Task::create([
            'user_id' => User::where('role', 'frontend_dev')->first()->id,
            'project_id' => 1,
            'name' => 'Création de la structure de l\'école',
            'description' => 'Conception et création de la structure de l\'école',
            'start_date' => now(),
            'due_date' => now()->addDays(7),
        ]);

        Task::create([
            'user_id' => User::where('role', 'backend_dev')->first()->id,
            'project_id' => 1,
            'name' => 'Planification des cours',
            'description' => 'Planification des cours et programmes d\'enseignement',
            'start_date' => now()->addDays(1),
            'due_date' => now()->addDays(8),
        ]);

        Task::create([
            'user_id' => User::where('role', 'admin')->first()->id,
            'project_id' => 1,
            'name' => 'Recrutement du personnel enseignant',
            'description' => 'Recrutement du personnel enseignant et administratif',
            'start_date' => now()->addDays(2),
            'due_date' => now()->addDays(9),
        ]);

        Task::create([
            'user_id' => User::where('role', 'frontend_dev')->first()->id,
            'project_id' => 2,
            'name' => 'Mise en place du système de gestion de stock',
            'description' => 'Mise en place du système de gestion de stock et des entrepôts',
            'start_date' => now(),
            'due_date' => now()->addDays(7),
        ]);

        Task::create([
            'user_id' => User::where('role', 'backend_dev')->first()->id,
            'project_id' => 2,
            'name' => 'Approvisionnement initial des produits',
            'description' => 'Approvisionnement initial des produits et articles en stock',
            'start_date' => now()->addDays(1),
            'due_date' => now()->addDays(8),
        ]);

        Task::create([
            'user_id' => User::where('role', 'admin')->first()->id,
            'project_id' => 2,
            'name' => 'Formation du personnel sur le système de gestion de stock',
            'description' => 'Formation du personnel sur l\'utilisation du système de gestion de stock',
            'start_date' => now()->addDays(2),
            'due_date' => now()->addDays(9),
        ]);

        Task::create([
            'user_id' => User::where('role', 'frontend_dev')->first()->id,
            'project_id' => 3,
            'name' => 'Recueil des besoins en ressources humaines',
            'description' => 'Recueil des besoins en ressources humaines pour le projet',
            'start_date' => now(),
            'due_date' => now()->addDays(7),
        ]);

        Task::create([
            'user_id' => User::where('role', 'backend_dev')->first()->id,
            'project_id' => 3,
            'name' => 'Recrutement de personnel qualifié',
            'description' => 'Recrutement de personnel qualifié pour le projet',
            'start_date' => now()->addDays(1),
            'due_date' => now()->addDays(8),
        ]);

        Task::create([
            'user_id' => User::where('role', 'admin')->first()->id,
            'project_id' => 3,
            'name' => 'Mise en place d\'un programme de formation',
            'description' => 'Mise en place d\'un programme de formation pour les employés',
            'start_date' => now()->addDays(2),
            'due_date' => now()->addDays(9),
        ]);
    }
}
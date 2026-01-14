<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer l'utilisateur admin
        $this->call([
            AdminUserSeeder::class,
            BrandSeeder::class, // Marques préexistantes
        ]);
    }
}

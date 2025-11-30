<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; 


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;


    public function run(): void
{
    User::factory()->create([
        'name' => 'Niang',
        'email' => 'bassinen13@gmail.com',
        'password' => Hash::make('nessiba96'),
        'role' => 'admin',
    ]);




    // Appeler les seeders
        $this->call([
            CategoriesTableSeeder::class,
            // tu peux ajouter d'autres seeders ici
        ]);

        
    }
}

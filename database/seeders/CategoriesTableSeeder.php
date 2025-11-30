<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        // Tableau des catégories
        $categories = [
            'Innovation',
            'Éducation',
            'Environnement',
            'Santé',
            'Technologie',
            'Culture & Loisirs',
            'Communauté'
        ];

        // Boucle pour créer chaque catégorie
        foreach ($categories as $libelle) {
            Categorie::create(['libelle' => $libelle]);
        }
    }
}

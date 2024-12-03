<?php

namespace Database\Factories;

use App\Models\Departement;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartementFactory extends Factory
{
    /**
     * Le nom du modèle que cette factory représente.
     *
     * @var string
     */
    protected $model = Departement::class;

    /**
     * Définir l'état par défaut de la factory.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->word(),  // Utilise un mot aléatoire pour le code
            'nom' => $this->faker->word(),              // Nom du département
            'description' => $this->faker->sentence(),  // Description aléatoire
        ];
    }
}

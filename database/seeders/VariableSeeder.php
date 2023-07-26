<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Group;
use App\Models\Variable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $variables = [
            ['Cambio', 'Cambio'],
            ['Cultura', 'Cultura'],
            ['Gestión del Talento Humano', 'Clima'],
            ['Trabajo en Equipo', 'Clima '],
            ['Comunicación e Integración', 'Clima'],
            ['Condiciones de Trabajo', 'Clima'],
            ['Espacio Físico de Trabajo', 'Clima'],
            ['Servicio al Cliente', 'Clima'],
            ['Estilo de Dirección', 'Clima'],
            ['Comunicación Gerencial', 'Clima'],
            ['Sentido de Pertenencia', 'Clima'],
            ['Orientación Organizacional', 'Clima'],
        ];

        foreach ($variables as $variable) {
            Variable::create([
                'group_id' => Group::where('name', $variable[1])->first()->id,
                'name' => $variable[0],
            ]);
        }
    }
}

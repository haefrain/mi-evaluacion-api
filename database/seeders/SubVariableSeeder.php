<?php

namespace Database\Seeders;

use App\Models\SubVariable;
use App\Models\Variable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubVariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subVariables = [
            ['Cambio', 'Compromiso con el cambio'],
            ['Cultura', 'Normas'],
            ['Cultura', 'Mitos e Historia'],
            ['Gestión del Talento Humano', 'Promoción'],
            ['Cambio', 'Asimilación del cambio'],
            ['Cultura', 'Creencias'],
            ['Gestión del Talento Humano', 'Aprovechamiento de las capacidades'],
            ['Trabajo en Equipo', 'Colaboración'],
            ['Comunicación e Integración', 'Cordialidad y Buen trato'],
            ['Trabajo en Equipo', 'Trabajo en Equipo'],
            ['Condiciones de Trabajo', 'Tecnología Competitiva'],
            ['Gestión del Talento Humano', 'Interés por los empleados'],
            ['Condiciones de Trabajo', 'Seguridad Industrial'],
            ['Espacio Físico de Trabajo', 'Recursos Físicos'],
            ['Servicio al Cliente', 'Servicio al cliente'],
            ['Comunicación e Integración', 'Armonía'],
            ['Estilo de Dirección', 'Interacción Jefe - Colaborador'],
            ['Estilo de Dirección', 'Autonomía'],
            ['Estilo de Dirección', 'Supervisión Respetuosa'],
            ['Estilo de Dirección', 'Estímulo y Soporte'],
            ['Comunicación Gerencial', 'Congruencia'],
            ['Condiciones de Trabajo', 'Carga Laboral'],
            ['Cultura', 'Ritos y Ceremonias'],
            ['Gestión del Talento Humano', 'Estímulo al Mejoramiento'],
            ['Cultura', 'Valores'],
            ['Cambio', 'Aceptación del cambio'],
            ['Sentido de Pertenencia', 'Lealtad'],
            ['Comunicación e Integración', 'Rel Interpersonales'],
            ['Cambio', 'Preparación para el Cambio'],
            ['Trabajo en Equipo', 'Eficiencia'],
            ['Comunicación Gerencial', 'Actualidad Organizacional'],
            ['Orientación Organizacional', 'Planeación'],
            ['Orientación Organizacional', 'Proyección'],
            ['Sentido de Pertenencia', 'Identificación'],
            ['Sentido de Pertenencia', 'Orgullo'],
            ['Sentido de Pertenencia', 'Compromiso'],
        ];

        foreach ($subVariables as $subVariable) {
            SubVariable::create([
                'variable_id' => Variable::where('name', $subVariable[0])->first()->id,
                'name' => $subVariable[1],
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dueno;
use App\Models\Mascota;
use App\Models\Consulta;
use App\Models\Veterinario;
use App\Models\User;

class ExpedienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Obtener o crear un Veterinario para la consulta
        $veterinario = Veterinario::first();
        
        if (!$veterinario) {
            $user = User::first();
            if (!$user) {
                $user = User::create([
                    'name' => 'Admin Vet',
                    'email' => 'admin@vet.com',
                    'password' => bcrypt('password'),
                ]);
            }
            
            $veterinario = Veterinario::create([
                'usuario_id' => $user->id,
                'nombre_completo' => 'Dr. Ejemplo',
                'especialidad' => 'Medicina General',
                'cedula_profesional' => '12345678',
                'foto_firma' => 'default.png',
            ]);
        }

        // 2. Crear un Dueño
        $dueno = Dueno::create([
            'nombre_completo' => 'Juan Pérez',
            'telefono' => '555-1234',
            'direccion' => 'Calle de las Mascotas 123, Ciudad',
        ]);

        // 3. Crear una Mascota
        $mascota = Mascota::create([
            'dueno_id' => $dueno->id,
            'nombre' => 'Firulais',
            'especie' => 'Perro',
            'raza' => 'Mestizo',
            'fecha_nacimiento' => '2021-05-10',
            'tipo_sangre' => 'DEA 1.1',
            'comportamiento' => 'Juguetón y dócil',
            'es_adoptado' => true,
        ]);

        // 4. Crear 2 Consultas para la Mascota
        Consulta::create([
            'mascota_id' => $mascota->id,
            'veterinario_id' => $veterinario->id,
            'fecha_consulta' => now()->subDays(30),
            'peso' => 15.5,
            'talla' => 45.0,
            'diagnostico' => 'Revisión general y desparasitación.',
            'tratamiento' => 'Se administró desparasitante interno. Citar en un mes para vacunas.',
        ]);

        Consulta::create([
            'mascota_id' => $mascota->id,
            'veterinario_id' => $veterinario->id,
            'fecha_consulta' => now(),
            'peso' => 16.0,
            'talla' => 45.0,
            'diagnostico' => 'Aplicación de vacuna múltiple anual.',
            'tratamiento' => 'Vacuna aplicada sin reacciones adversas. Siguiente cita en un año.',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\PRO_PROCESO;
use Illuminate\Database\Seeder;

class ProcesosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $procesos = [
            [
                'id' => 1,
                'PRO_NOMBRE' => 'Ingeniería',
                'PRO_PREFIJO' => 'ING',
            ],
            [
                'id' => 2,
                'PRO_NOMBRE' => 'Ciencias',
                'PRO_PREFIJO' => 'CIE',
            ],
            [
                'id' => 3,
                'PRO_NOMBRE' => 'Medicina',
                'PRO_PREFIJO' => 'MED',
            ],
            [
                'id' => 4,
                'PRO_NOMBRE' => 'Derecho',
                'PRO_PREFIJO' => 'DER',
            ],
            [
                'id' => 5,
                'PRO_NOMBRE' => 'Arquitectura',
                'PRO_PREFIJO' => 'ARQ',
            ],
        ];

        foreach ($procesos as $pro) {
            PRO_PROCESO::create($pro);
        }
    }
}

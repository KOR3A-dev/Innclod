<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TIP_TIPO_DOC;

class TipoDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipo_docs = [
            ['id' => 1, 'TIP_NOMBRE' => 'Instructivo', 'TIP_PREFIJO' => 'INS'],
            ['id' => 2, 'TIP_NOMBRE' => 'Manual', 'TIP_PREFIJO' => 'MAN'],
            ['id' => 3, 'TIP_NOMBRE' => 'Reporte', 'TIP_PREFIJO' => 'REP'],
            ['id' => 4, 'TIP_NOMBRE' => 'Formulario', 'TIP_PREFIJO' => 'FOR'],
            ['id' => 5, 'TIP_NOMBRE' => 'Procedimiento', 'TIP_PREFIJO' => 'PRO'],
        ];

        foreach ($tipo_docs as $tip) {
            TIP_TIPO_DOC::create($tip);
        }
    }
}

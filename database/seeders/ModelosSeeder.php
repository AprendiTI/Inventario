<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Modelos_recuento')->insert([
            'Model' => 'Ciego',
        ]);
        DB::table('Modelos_recuento')->insert([
            'Model' => 'Giuiado',
        ]);
        DB::table('Modelos_recuento')->insert([
            'Model' => 'Semiguiado',
        ]);
    }
}

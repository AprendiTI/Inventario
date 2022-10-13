<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert([
            'name' => 'pruebas',
            'email' => 'registro@ivanagro.com',
            'state' => '1',
            'rol_id' => '1',
            'password' => bcrypt('C0rr30.2023'),
        ]);
    }
}

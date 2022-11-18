<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Ivanagro',
            'email' => 'registro@ivanagro.com',
            'state' => '1',
            'rol_id' => '1',
            'password' => bcrypt('C0rr30.2023'),
        ]);
        
        // User::create([
        //     'name' => 'Camilo',
        //     'email' => 'aprendiz.ti@ivanagro.com',
        //     'state' => '1',
        //     'rol_id' => '2',
        //     'password' => bcrypt('1000568741'),
        // ]);
    }
}

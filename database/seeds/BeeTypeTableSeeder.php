<?php

use Illuminate\Database\Seeder;

class BeeTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beetypes = [
            ['name' => "Inconnu"],
            ['name' => "Noire"],
            ['name' => "Carnica"],

        ];

        foreach ($beetypes as $beetype)
        DB::table('beetype')->insert($beetype);        
    }
}

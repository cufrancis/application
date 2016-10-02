<?php

use Illuminate\Database\Seeder;

class PlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('platforms')->insert([
            ['name' =>  'win32'],
            ['name' =>  'linux'],
            ['name' =>  'MacOS'],
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class DevelopersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('developers')->insert([
            ['name' =>  'cufrancis'],
            ['name' =>  'llnhhy'],
        ]);
    }
}

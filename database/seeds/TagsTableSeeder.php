<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            ['name' =>  '蓝光',   'num'   =>  0],
            ['name' =>  '高清',   'num'   =>  6],
        ]);
    }
}

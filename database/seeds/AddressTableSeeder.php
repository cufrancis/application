<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            [
                'app_id'    =>  1,
                'disk'      =>  'local',
                'url'       =>  'http://www.baidu.com',
            ],
        ]);
    }
}

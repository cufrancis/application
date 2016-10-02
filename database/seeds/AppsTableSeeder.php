<?php

use Illuminate\Database\Seeder;

class AppsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apps')->insert([
            [
                'name' =>  'UC Browser',
                'version'   =>  '1.3.2',
                'introduction' => 'uc brower V1.3.2',
                'img'   =>  'uc.ico',

                'type'  =>  0,
                'size'  =>  '35.8M',
                'developer' => 'UC.ltd',
                'platform'  =>  0,
                'license'   =>  0,
            ],
        ]);
    }
}

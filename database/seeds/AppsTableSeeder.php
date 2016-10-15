<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
                'title' =>  'UC Browser',
                'filename' =>  'UC Browser',
                'version'   =>  '1.3.2',
                'introduction' => 'uc brower V1.3.2',
                'img'   =>  'uc.ico',

                // 'type'  =>  0,
                'size'  =>  '35.8M',
                'developer' => 'UC.ltd',
                'platform'  =>  0,
                'license'   =>  0,
                'author'    =>  1,
                'created_at'  =>  Carbon::now(),
                'updated_at'  =>  Carbon::now(),

            ],
        ]);
    }
}

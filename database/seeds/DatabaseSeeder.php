<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AppsTableSeeder::class);
        $this->call(DevelopersTableSeeder::class);
        $this->call(LicensesTableSeeder::class);
        $this->call(PlatformsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}

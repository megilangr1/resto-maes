<?php

use App\Level;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = Level::firstOrCreate([
					'name' => 'Admin'
				]);

        $levels = Level::firstOrCreate([
					'name' => 'Karyawan'
				]);
    }
}

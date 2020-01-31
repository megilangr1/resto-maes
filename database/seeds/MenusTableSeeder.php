<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			for ($i=1; $i < 10; $i++) { 
				if ($i % 2 == 0) {
					$status = true;
				} else {
					$status = false;
				}
				Menu::create([
					'name' => 'Menu '.$i,
					'description' => 'Menu Makanan yang Ke-'.$i,
					'price' => $i * 1000,
					'serve_status' => $status 
				]);
			}
    }
}

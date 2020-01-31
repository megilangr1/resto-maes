<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
					'name' => 'Me Gilang R',
					'username' => 'megilangr',
					'password' => bcrypt('nanozero1'),
					'level_id' => 1,
				]);
    }
}

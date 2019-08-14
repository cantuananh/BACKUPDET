<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) { 
	    	User::create([
                'name' => str_random(8),
                'email' => str_random(12).'@mail.com',
                'password' => bcrypt('123456'),
                'score_id' => rand(1,10),
                "age" => 20,
                'hours_worked' => rand(20,40),
                'technology' => 'Fullstack WEB',
                'period_first_at' => date("Y-m-d H:i:s"),
                'period_second_at' => date("Y-m-d H:i:s"),
                'expected_to_end' => date("Y-m-d H:i:s"),
                'manager_period_2' => "Kông",
                'parts_tracking' => "Decore",
                "trainning_state" => "waiting_for_introductory_training",
                "learning_state" => ['linux', 'git']

	        ]);
    	}
    }
}

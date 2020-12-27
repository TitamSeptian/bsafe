<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
        		"username" => "jhonsopir",
        		"password" => bcrypt("123qwe123"),
                "roles" => "driver",
        	],
        	[
        		"username" => "jhonoperator",
        		"password" => bcrypt("123qwe123"),
                "roles" => "operator",
        	],
        	[
        		"username" => "jhonadmin",
        		"password" => bcrypt("123qwe123"),
                "roles" => "admin",
        	],
        ];
		
		foreach ($users as $user) {
			\App\User::create($user);
        }

        \App\Driver::create([
        	"user_id" => 1,
        	"name" => "Jhon Sopir",
        	"NIK" => "3120000000000000",
        	"foto" => "sopir.jpg",
        	"gender" => "L",
        	"birth" => "2020-12-08",
        	"alamat" => "Bandung, 20, 121212, Jawabarat",
        	"status" => "Calon",
        ]);

        \App\Admin::create([
        	"user_id" => 3,
        	"name" => "Jhon Admin",
        ]);

        \App\Operator::create([
        	"user_id" => 2,
        	"name" => "Jhon Admin",
        ]);

    }
}

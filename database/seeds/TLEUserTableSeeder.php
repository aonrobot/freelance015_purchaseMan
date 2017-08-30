<?php

use Illuminate\Database\Seeder;
use App\User;

class TLEUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->delete();
        User::create([

        	'name' => 'Auttawut Wiriyakreng',
        	'email' => 'aonrobotz@gmail.com',
        	'password' => Hash::make('admin123'),
        ]);
    }
}

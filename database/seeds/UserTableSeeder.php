<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
         'first_name' => 'super',
         'last_name' => 'admin',
         'email' => 'admin@gmail.com',
         'password' => bcrypt('123456'),
        ]);

        $user->attachRole('super_admin');
    }// end of run
}// rnd of seeder

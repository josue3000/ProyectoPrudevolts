<?php

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
        App\User::create([
            'name'     => 'David Vallejos',
            'email'    => 'david@gmail.com',
            'password' => bcrypt('123'),
        ]);
        factory(App\User::class, 7)->create();
    }
}

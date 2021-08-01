<?php

namespace Database\Seeders;
use App\Models\User;
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
        User::create(
            [
                'name' => 'Jose Valentin Zarate',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => bcrypt('123456789')
            ]
        )->assignRole('Admin');
        //factory(User::class, 9)->create();
        
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<3; $i++) {
            $user = User::create([
                'name' => 'Mehedi Hasan'.$i,
                'phone' => '01734000000',
                'password' => Hash::make('password')
            ]);
        }
    }
}

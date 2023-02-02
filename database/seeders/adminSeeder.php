<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'Admin',
            'phone' => '09122457283',
            'password' => bcrypt('admin'),
            'isAdmin' => true
        ]);
    }
}

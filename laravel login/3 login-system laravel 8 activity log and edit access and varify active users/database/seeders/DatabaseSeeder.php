<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'email' => 'abu22'.'@gmail.com',
            'password' => Hash::make('12345'),
            'name' => 'abu',
            'phone' => '014',
            'picture' => 'empty.png',
            'role' => 1,
            'is_active' => true,
            'access' => '*'
        ]);

        DB::table('role_permissions')->insert([
            ['permission' => 'view dashboard',
            'access' => 'view_dashboard'],
            ['permission' => 'open',
            'access' => 'open']

        ]);
        
    }
}
 
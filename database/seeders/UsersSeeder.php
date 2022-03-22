<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@bboard.ru',
            'password' => Hash::make('admin1977246')
        ]);

        DB::table('users')->insert([
            'name' => 'Editor',
            'email' => 'editor@bboard.ru',
            'password' => Hash::make('editor1977246')
        ]);

        DB::table('users')->insert([
            'name' => 'Hippy',
            'email' => 'hippy@bboard.ru',
            'password' => Hash::make('hippy1977246')
        ]);
    }
}

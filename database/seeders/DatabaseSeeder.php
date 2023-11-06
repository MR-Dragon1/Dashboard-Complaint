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
        DB::table('users')->insert([
            [
                'name'=>'Dadang',
                'email'=>'admin-cs@admin.com',
                'password'=> Hash::make('12345678'),
                'roles' => 1
            ],
            [
                'name'=>'Diding',
                'email'=>'admin-it@admin.com',
                'password'=> Hash::make('12345678'),
                'roles' => 2
            ],
            [
                'name'=>'Dudung',
                'email'=>'admin-it-2@admin.com',
                'password'=> Hash::make('12345678'),
                'roles' => 2
            ]
        ]);
    }
}
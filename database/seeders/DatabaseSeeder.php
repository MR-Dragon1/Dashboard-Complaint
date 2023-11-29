<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


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
                'name'=>'Trude Hoffmann',
                'email'=>'admin-cs@admin.com',
                'password'=> Hash::make('12345678'),
                'roles' => 1
            ],
            [
                'name'=>'Muhammad Rindy',
                'email'=>'admin-it@admin.com',
                'password'=> Hash::make('12345678'),
                'roles' => 2
            ],
        ]);
    }

    // public function run()
    // {
    //     $faker = Faker::create();

    //     foreach (range(1, 100) as $index) {

    //         DB::table('complaint_lists')->insert([
    //             'email' => $faker->email,
    //             'site' => $faker->domainName,
    //             'ticket' => $faker->randomNumber(9),
    //             'complaints' => $faker->sentence,
    //             'expectation' => $faker->sentence,
    //             'status' => $faker->numberBetween(0,3),
    //             'page' => $faker->numberBetween(1,2),
    //         ]);
    //     }
    // }
}
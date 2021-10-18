<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personal_record')->delete();
        DB::table('user')->delete();

        $users = [
            [
                'id' => 1,
                'name' =>   'Joao',
            ],
            [
                'id' => 2,
                'name' =>   'Jose',
            ],
            [
                'id' => 3,
                'name' =>   'Paulo',
            ]
        ];

        DB::table('user')->insert($users);
    }
}

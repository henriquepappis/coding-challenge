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
        DB::table('user')->delete();

        DB::table('user')->insert(
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
        );
    }
}

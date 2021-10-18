<?php

namespace Database\Seeders;

use App\Models\Movement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personal_record')->delete();
        DB::table('movement')->delete();

        $movement = [
            [
                'id' => 1,
                'name' => 'Deadlift',
            ],
            [
                'id' => 2,
                'name' => 'Back Squat'
            ],
            [
                'id' => 3,
                'name' => 'Bench Press'
            ]
            ];

        DB::table('movement')->insert($movement);
    }
}

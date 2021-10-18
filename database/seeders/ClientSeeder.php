<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client')->delete();

        DB::table('client')->insert([
            'name' => 'Henrique Pappis',
            'password' => Hash::make('tecnofit'),
            'api_token' => env('API_TOKEN')
        ]);
    }
}

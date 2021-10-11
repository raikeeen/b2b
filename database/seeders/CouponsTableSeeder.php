<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coupons;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupons::create([
            'code' => 'ABC',
            'type' => 'fixed',
            'value'=> 30
        ]);
        Coupons::create([
            'code' => 'DEF456',
            'type' => 'percent',
            'percent_off'=> 50
        ]);
    }
}

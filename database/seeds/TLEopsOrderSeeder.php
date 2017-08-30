<?php

use Illuminate\Database\Seeder;
use App\opsOrder;
use App\masCustomer;
use Carbon\Carbon;

class TLEopsOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ops_order')->delete();
        opsOrder::create([

        	'OrderCode' => 'O-2017080001',
        	'CustomerCode' => 'C2017080001',
            'OrderDate' => Carbon::today()->toDateString(),
        ]);
    }
}

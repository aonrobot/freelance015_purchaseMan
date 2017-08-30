<?php

use Illuminate\Database\Seeder;
use App\masCustomer;

class TLEmasCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mas_customer')->delete();
        masCustomer::create([

        	'CustomerCode' => 'C2017080001',
        	'FirstName' => 'อัฐวุฒิ',
            'LastName' => 'วิริยะเกรียง',
            'IDCard' => '1100900451456',
            'Tel' => '08386924xx',
        ]);
    }
}

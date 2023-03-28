<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\vendorsBankDetail;

class vendorBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorBankDetails = [
            ['id' => 1, 'vendor_id' => 1, 'account_holder_name' => 'rehman', 'bank_name' => 'NBP', 'account_number' => '4165653899','swift_code' => 'AIINPKKA']
        ];
        vendorsBankDetail::insert($vendorBankDetails);
    }
}

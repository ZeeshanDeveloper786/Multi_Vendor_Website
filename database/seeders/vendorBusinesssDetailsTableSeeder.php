<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\vendorsBusinessDetail;

class vendorBusinesssDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorBusinessRecord = [
            ['id'=>1, 'vendor_id'=>1, 'shop_name'=>'rehman electronics store', 'shop_address'=>'johar town b block', 'shop_city'=>'lahore', 'shop_state'=>'lahore', 'shop_country'=>'Pakistan', 'shop_pincode'=>'1100', 'shop_mobile'=>'03449857764', 'shop_website'=>'rehmanelectronics.com', 'shop_email'=>'rehman@gmail.com', 'address_proof'=>'Passport', 'address_proof_image'=>'test.jpg', 'business_license_number' => '12345678', 'gst_number' => '123456789', 'pan_number' => '123456789']
        ];
        vendorsBusinessDetail::insert($vendorBusinessRecord);
        
    }
}

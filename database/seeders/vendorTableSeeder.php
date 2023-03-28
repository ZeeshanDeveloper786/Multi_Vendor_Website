<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\vendor;

class vendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecord = [
            ['id'=>1, 'name' => 'rehman', 'address' => 'block B johar town' , 'city' => 'Lahore' , 'state' => 'panjab' , 'country' => 'pakistan' , 'pincode' => '1100', 'mobile' => '03449857764' , 'email' => 'rehman@gmail.com' , 'status' =>0]
        ];
        vendor::insert($vendorRecord);
    }
}

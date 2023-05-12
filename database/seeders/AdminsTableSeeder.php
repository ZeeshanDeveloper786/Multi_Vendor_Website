<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id'=>1,'name'=>'zeeshan','type'=>'admin','vendor_id'=>0,'mobile'=>'03449857764','email'=>'admin@gmail.com','password'=>Hash::make(12345678),'image'=>'','status'=>1],
            ['id'=>2,'name'=>'rehman','type'=>'vendor','vendor_id'=>1,'mobile'=>'03449857764','email'=>'rehman@gmail.com','password'=>Hash::make(12345678),'image'=>'','status'=>1]
        ];
        Admin::insert($adminRecords);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

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
            ['id'=>2,'name'=>'rehman','type'=>'vendor','vendor_id'=>1,'mobile'=>'03449857764','email'=>'rehman@gmail.com','password'=>'$2a$12$yyhUZCStmi0oZJXjf1hC6OvIheSANnxLHsk17ngYYeUIT5yQNttK.','image'=>'','status'=>0]
        ];
        Admin::insert($adminRecords);
    }
}

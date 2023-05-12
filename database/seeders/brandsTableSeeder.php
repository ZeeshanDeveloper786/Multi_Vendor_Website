<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\brand;

class brandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandData = [
            ['id' =>1 , 'name'=> 'Samsung',  'status' => 1],
            ['id' =>2 , 'name'=> 'Lee',  'status' => 1],
            ['id' =>3 , 'name'=> 'LG',  'status' => 1],
            ['id' =>4 , 'name'=> 'Linovo',  'status' => 1],
        ];

        brand::insert($brandData);
    }
}

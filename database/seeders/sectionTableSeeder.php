<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\section;

class sectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['id' => 1,'name' => 'Clothing','status' => 1],
            ['id' => 2,'name' => 'Electronics','status' => 1],
            ['id' => 3,'name' => 'Appliances','status' => 1]
        ];

        section::insert($data);
    }
}

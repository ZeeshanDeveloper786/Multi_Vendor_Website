<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;

class productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productRecord = [
            ['id'=>1, 'section_id' => 2,'category_id'=> 7, 'brand_id'=> 1,'vendor_id'=>1 , 'admin_type'=> 'vendor', 'product_name' =>'Galaxy A23' , 'product_code' => 'A23','product_color' => 'black','product_price'=> 200000 ,'product_discount' =>10, 'product_weight'=> 500, 'product_video'=> '', 'product_image' => '', 'description'=> '', 'meta_title' => '' , 'meta_description' => '','meta_keywords' => '', 'is_featured' => 'Yes','status' => 1],

            ['id'=>2, 'section_id' => 1,'category_id'=> 10, 'brand_id'=> 8,'vendor_id'=>0 , 'admin_type'=> 'superadmin', 'product_name' =>'Casual T shirt' , 'product_code' => 'RC01','product_color' => 'Red','product_price'=> 1000 ,'product_discount' =>20, 'product_weight'=> 200, 'product_video'=> '', 'product_image' => '', 'description'=> '', 'meta_title' => '' , 'meta_description' => '','meta_keywords' => '', 'is_featured' => 'Yes','status' => 1]
        ];

        product::insert($productRecord);

    }
}

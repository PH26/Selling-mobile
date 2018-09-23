<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime = date('Y-m-d H:i:s');
        DB::table('categories')->insert([
        	[
        		'id'=>1,
        		'name'=> 'SAMSUNG',
        		'created_at'=>$currentTime,
        		'updated_at'=>$currentTime
        	],
        	[
        		'id'=>2,
        		'name'=> 'Xiaomi',
        		'created_at'=>$currentTime,
        		'updated_at'=>$currentTime
        	],
        	[
        		'id'=>3,
        		'name'=> 'Apple',
        		'created_at'=>$currentTime,
        		'updated_at'=>$currentTime
        	],
        	[
        		'id'=>4,
        		'name'=> 'OPPO',
        		'created_at'=>$currentTime,
        		'updated_at'=>$currentTime
        	],
        ]);
    }
}

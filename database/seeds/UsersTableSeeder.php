<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime = date('Y-m-d H:i:s');
        DB::table('users')->insert([
            [
                'id'=>1,
                'name'=> 'Trần Văn Tú',
                'tel'=>'01626663287',
                'email'=>'tranvantu.dev@gmail.com',
                'password'=> bcrypt('123456'),
                'user_type' => 1,
                'active'=> 1,
                'email_verified_at'=>$currentTime,
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                'id'=>2,
                'name'=> 'Tán Thị Hà',
                'tel'=>'01264423228',
                'email'=>'tanthiha201198@gmail.com',
                'password'=> bcrypt('123456'),
                'user_type' => 1,
                'active'=> 1,
                'email_verified_at'=>$currentTime,
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                'id'=>3,
                'name'=> 'Phan Doãn Tý',
                'tel'=>'01212190205',
                'email'=>'phandoanty.dev@gmail.com',
                'password'=> bcrypt('123456'),
                'user_type' => 0,
                'active'=> 1,
                'email_verified_at'=>$currentTime,
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                'id'=>4,
                'name'=> 'Hồ Văn Nhân',
                'tel'=>'01239158328',
                'email'=>'hovannhan.dev@gmail.com',
                'password'=> bcrypt('123456'),
                'user_type' => 0,
                'active'=> 1,
                'email_verified_at'=>$currentTime,
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ]
        ]);
    }
}

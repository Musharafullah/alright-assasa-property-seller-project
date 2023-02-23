<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'Admin',
            'phone' => '0123456789',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("password"),
            "type" => User::USER_TYPE_ADMIN
        ];
        $admin = new User($admin);
        $admin->save();
        $dealer = [
            'name' => 'Dealer',
            'phone' => '0123456789',
            'email' => 'dealer@gmail.com',
            'password' => Hash::make("password"),
            "type" => User::USER_TYPE_DEALER,
            'parent_id' => $admin->id,
            'designation' => 'New Dealer'
        ];
        $dealer = new User($dealer);
        $dealer->save();
        //dealer areas
        $area_user = [[
            "user_id" => $dealer->id,
            "area_id" => 1,
        ]];
        $area_user[] = [
            "user_id" => $dealer->id,
            "area_id" => 2,
        ];

        $user = [
            'name' => 'User',
            'phone' => '0123456789',
            'email' => 'user@gmail.com',
            'password' => Hash::make("password"),
            "type" => User::USER_TYPE_USER,
            'parent_id' => $dealer->id,
            'designation' => 'Sales Person'
        ];
        $user = new User($user);
        $user->save();
        $area_user[] = [
            "user_id" => $user->id,
            "area_id" => 1,
        ];

        DB::table("area_user")->insert($area_user);
    }
}
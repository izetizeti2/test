<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'surname' => 'User',
                'phone_number' => '49250075',
                'password' => Hash::make('12345678'), // Enkripton fjalëkalimin
                'blood_group_id' => 1,
                'city_id' => 4,
                'role_id' => 1, // Admin
                'address' => '123 Admin Street',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John',
                'surname' => 'Doe',
                'phone_number' => '43866014',
                'password' => Hash::make('12345678'),
                'blood_group_id' => 2,
                'city_id' => 2,
                'role_id' => 2, // Admin Campaign
                'address' => '456 User Road',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John',
                'surname' => 'Doe',
                'phone_number' => '49900900',
                'password' => Hash::make('12345678'),
                'blood_group_id' => 2,
                'city_id' => 2,
                'role_id' => 3,// qtgj
                'address' => '456 User Road',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

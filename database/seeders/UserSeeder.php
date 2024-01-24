<?php
// docker compose exec app php artisan db:seed --class=UserSeeder
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'password'=>'password'
            // Add other fields as needed
        ]);
        User::create([
            'name' => 'Sam',
            'email' => 'Sam@gmail.com',
            'password'=>'password1'
            // Add other fields as needed
        ]);
    }
}

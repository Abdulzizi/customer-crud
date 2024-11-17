<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Customer::factory(10)->create();

        // Customer::create([
        //     'image' => '/default-img/avatar.png',
        //     'firstName' => 'John',
        //     'lastName' => 'Doe',
        //     'email' => 'john.doe@example.com',
        //     'phoneNumber' => '1234567890',
        //     'bankNumber' => '1234567890',
        //     'about' => 'A brief about John Doe.',
        // ]);

        // Customer::create([
        //     'image' => '/default-img/avatar.png',
        //     'firstName' => 'Jane',
        //     'lastName' => 'Smith',
        //     'email' => 'jane.smith@example.com',
        //     'phoneNumber' => '0987654321',
        //     'bankNumber' => '0987654321',
        //     'about' => 'A brief about Jane Smith.',
        // ]);

    }
}

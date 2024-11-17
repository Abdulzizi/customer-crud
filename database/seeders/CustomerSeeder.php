<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 customers using the CustomerFactory
        Customer::factory(10)->create();

        // Or if you want to manually create some customers:
        Customer::create([
            'image' => '/default-img/avatar.png',
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john.doe@example.com',
            'phoneNumber' => '1234567890',
            'bankNumber' => '1234567890',
            'about' => 'A brief about John Doe.',
        ]);

        Customer::create([
            'image' => '/default-img/avatar.png',
            'firstName' => 'Jane',
            'lastName' => 'Smith',
            'email' => 'jane.smith@example.com',
            'phoneNumber' => '0987654321',
            'bankNumber' => '0987654321',
            'about' => 'A brief about Jane Smith.',
        ]);

        // You can also generate more customers with Faker for bulk data.
        // \App\Models\Customer::factory(50)->create();
    }
}

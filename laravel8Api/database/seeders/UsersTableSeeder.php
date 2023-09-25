<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => 'password123'
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => 'securepass'
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice.johnson@example.com',
                'password' => 'p@$$w0rd'
            ],
            [
                'name' => 'Bob Brown',
                'email' => 'bob.brown@example.com',
                'password' => 'secretcode'
            ],
            [
                'name' => 'Ella Davis',
                'email' => 'ella.davis@example.com',
                'password' => 'letmein'
            ],
            [
                'name' => 'Mike Wilson',
                'email' => 'mike.wilson@example.com',
                'password' => 'access123'
            ],
            [
                'name' => 'Sarah Lee',
                'email' => 'sarah.lee@example.com',
                'password' => 'sarah1234'
            ],
            [
                'name' => 'David Clark',
                'email' => 'david.clark@example.com',
                'password' => 'davidpass'
            ],
            [
                'name' => 'Linda White',
                'email' => 'linda.white@example.com',
                'password' => 'lindapassword'
            ],
            [
                'name' => 'Tom Green',
                'email' => 'tom.green@example.com',
                'password' => 'green2023'
            ],
        ];
        User::insert($users);
    }
}

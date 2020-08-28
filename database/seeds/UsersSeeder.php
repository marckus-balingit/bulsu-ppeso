<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
              'name' => 'Marckus Balingit',
              'email' => 'philipfry32@gmail.com',
              'contact_number' => '09454294527',
              'email_verified_at' => now(),
              'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
              'remember_token' => Str::random(10),
            ]
        ];

        foreach ($users as $key => $user) {
            if (User::where('email', $user['email'])->count() === 0) {
                $result = User::create($user);
            }
        }
    }
}

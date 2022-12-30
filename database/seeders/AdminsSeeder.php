<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;



class AdminsSeeder extends Seeder
{
    public function run()
    {
    
        User::create([
            'name' => Crypt::encryptString('Admin'),
            'email' => 'admin@mkacademy.com',
            'email_verified_at' => now(),
            'type' => "0",
            // deixei sem foto mesmo
            'password' => '$2y$10$D0ZhzhBF0pVZqSKxCIuGgum4iXHTdgnyQ.oShXfs31YwECSBuYH62', // password: 12345678
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => Crypt::encryptString('Poldin'),
            'email' => 'leopalds@mkacademy.com',
            'email_verified_at' => now(),
            'type' => "0",
            // deixei sem foto mesmo
            'password' => '$2y$10$D0ZhzhBF0pVZqSKxCIuGgum4iXHTdgnyQ.oShXfs31YwECSBuYH62', // password: 12345678
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => Crypt::encryptString('Laninha'),
            'email' => 'lanadosreis@mkacademy.com',
            'email_verified_at' => now(),
            'type' => "0",
            // deixei sem foto mesmo
            'password' => '$2y$10$D0ZhzhBF0pVZqSKxCIuGgum4iXHTdgnyQ.oShXfs31YwECSBuYH62', // password: 12345678
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => Crypt::encryptString('Kayanzada'),
            'email' => 'martinsk@mkacademy.com',
            'email_verified_at' => now(),
            'type' => "0",
            // deixei sem foto mesmo
            'password' => '$2y$10$D0ZhzhBF0pVZqSKxCIuGgum4iXHTdgnyQ.oShXfs31YwECSBuYH62', // password: 12345678
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => Crypt::encryptString('gustavara'),
            'email' => 'gusta@mkacademy.com',
            'email_verified_at' => now(),
            'type' => "0",
            'picture' => "0dd834eb4b88d49370ceba88eba214f2", // é o batma
            'password' => '$2y$10$D0ZhzhBF0pVZqSKxCIuGgum4iXHTdgnyQ.oShXfs31YwECSBuYH62', // password: 12345678
            'remember_token' => Str::random(10),
        ]);
       
    }
}

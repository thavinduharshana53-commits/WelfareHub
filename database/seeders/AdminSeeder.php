<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use RuntimeException;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminEmail = env('ADMIN_EMAIL');
        $adminPassword = env('ADMIN_PASSWORD');

        if(! $adminEmail || ! $adminPassword){
            throw new RuntimeException(
                'ADMIN_EMAIL and ADMIN_PASSWORD must be configured.'
            );
        }

        User::updateOrCreate(
            [
                'email' => $adminEmail,
            ],
            [
                'name' => 'ThaviAdmin',
                'password' => Hash::make($adminPassword), 
                'email_verified_at' => now(),
            ]
        );
    }
}

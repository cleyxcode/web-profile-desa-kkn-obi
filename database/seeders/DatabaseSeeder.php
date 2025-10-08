<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed User
        User::factory()->create([
            'name' => 'Admin Desa',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'), // Ganti dengan password yang aman
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Seed Data Desa
        $this->call([
            ProfilDesaSeeder::class,
            DataDesaSeeder::class,
            BeritaSeeder::class,
            GaleriSeeder::class,
        ]);

        $this->command->info('Database seeding completed successfully!');
        $this->command->info('');
        $this->command->info('Login credentials:');
        $this->command->info('Email: admin@admin.com');
        $this->command->info('Password: admin');
        $this->command->info('');
        $this->command->info('Email: test@example.com');
        $this->command->info('Password: password');
    }
}
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Dewa Sheva Dzaky',
            'username' => 'dzakyyyy',
            'email' => 'dzakylinggau@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);
        User::factory(5)->create();
        Category::factory(50)->create();
        Article::factory(50)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

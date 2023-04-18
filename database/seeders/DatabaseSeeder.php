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

        Category::create([
            'name' => 'Politik',
            'slug' => 'politik',
            'image' => 'https://source.unsplash.com/700x300?political',
            'background' => '#012970',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'Ekonomi',
            'slug' => 'ekonomi',
            'image' => 'https://source.unsplash.com/700x300?economy',
            'background' => '#8e44ad',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'Geografis',
            'slug' => 'geografis',
            'image' => 'https://source.unsplash.com/700x300?geography',
            'background' => '#2ecc71',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'Terpopuler',
            'slug' => 'terpopuler',
            'image' => 'https://source.unsplash.com/700x300?popular',
            'background' => '#f1c40f',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'Tren',
            'slug' => 'tren',
            'image' => 'https://source.unsplash.com/700x300?trending',
            'background' => '#3498db',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
            'image' => 'https://source.unsplash.com/700x300?sports',
            'background' => '#e67e22',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'Kesehatan',
            'slug' => 'kesehatan',
            'image' => 'https://source.unsplash.com/700x300?health',
            'background' => '#c0392b',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'Gaya Hidup',
            'slug' => 'gaya-hidup',
            'image' => 'https://source.unsplash.com/700x300?lifestyle',
            'background' => '#27ae60',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'Entertainment',
            'slug' => 'entertainment',
            'image' => 'https://source.unsplash.com/700x300?entertainment',
            'background' => '#9b59b6',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'Kejahatan',
            'slug' => 'kejahatan',
            'image' => 'https://source.unsplash.com/700x300?crime',
            'background' => '#e74c3c',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'IPTEK',
            'slug' => 'iptek',
            'image' => 'https://source.unsplash.com/700x300?technology',
            'background' => '#1abc9c',
            'color' => '#fff',
        ]);


        User::factory(5)->create();
        Article::factory(50)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

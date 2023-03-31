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
            'image' => 'https: //source.unsplash.com/700x300?political',
            'background' => '#012970',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
            'image' => 'https: //source.unsplash.com/700x300?sport',
            'background' => '#FF914D',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'Bisnis',
            'slug' => 'bisnis',
            'image' => 'https://source.unsplash.com/700x300?business',
            'background' => '#F7DC6F',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi',
            'image' => 'https://source.unsplash.com/700x300?technology',
            'background' => '#95A5A6',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'Pendidikan',
            'slug' => 'pendidikan',
            'image' => 'https://source.unsplash.com/700x300?education',
            'background' => '#5DADE2',
            'color' => '#fff',
        ]);

        Category::create([
            'name' => 'Seni dan Budaya',
            'slug' => 'seni-dan-budaya',
            'image' => 'https://source.unsplash.com/700x300?art-culture',
            'background' => '#F5B7B1',
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

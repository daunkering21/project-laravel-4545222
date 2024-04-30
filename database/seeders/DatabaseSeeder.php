<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run() //: void
    {
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Charles',
            'username' => 'dedaunan',
            'email' => 'charlesimmanuel71@gmail.com',
            'password' => bcrypt('hapus123')
        ]);

        // User::create([
        //     'name' => 'Dedaunan',
        //     'email' => 'tevimmanuel71@gmail.com',
        //     'password' => bcrypt('hapus')
        // ]); 

        User::factory(5)->create();

        Category::create([
            'name'=> 'Programming',
            'slug'=> 'programming',
        ]);

        Category::create([
            'name'=> 'Web Design',
            'slug'=> 'web-design',
        ]);

        Category::create([
            'name'=> 'Personal',
            'slug'=> 'personal',
        ]);

        Post::factory(32)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, eligendi voluptatum autem quasi voluptas numquam?',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem harum, quis ea sequi nobis voluptatum nulla illum sint veniam, eos ex deserunt autem provident quam. Suscipit nemo blanditiis officia quibusdam. Modi totam officiis, doloribus itaque aspernatur quisquam illum et quidem eos deserunt? Deserunt, quis. Dolor modi quisquam eveniet quam repellendus aspernatur! Ex temporibus expedita est nam aut! Voluptates soluta a accusamus ullam sed. Quasi omnis eligendi corporis quaerat labore corrupti id, laudantium nulla sint nemo? Minima, ad? Ea distinctio adipisci sunt harum. Illum et aspernatur enim molestiae vel dicta voluptatibus laudantium ipsa esse omnis nisi, accusamus officia, vitae dolores quos.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, eligendi voluptatum autem quasi voluptas numquam?',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem harum, quis ea sequi nobis voluptatum nulla illum sint veniam, eos ex deserunt autem provident quam. Suscipit nemo blanditiis officia quibusdam. Modi totam officiis, doloribus itaque aspernatur quisquam illum et quidem eos deserunt? Deserunt, quis. Dolor modi quisquam eveniet quam repellendus aspernatur! Ex temporibus expedita est nam aut! Voluptates soluta a accusamus ullam sed. Quasi omnis eligendi corporis quaerat labore corrupti id, laudantium nulla sint nemo? Minima, ad? Ea distinctio adipisci sunt harum. Illum et aspernatur enim molestiae vel dicta voluptatibus laudantium ipsa esse omnis nisi, accusamus officia, vitae dolores quos.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, eligendi voluptatum autem quasi voluptas numquam?',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem harum, quis ea sequi nobis voluptatum nulla illum sint veniam, eos ex deserunt autem provident quam. Suscipit nemo blanditiis officia quibusdam. Modi totam officiis, doloribus itaque aspernatur quisquam illum et quidem eos deserunt? Deserunt, quis. Dolor modi quisquam eveniet quam repellendus aspernatur! Ex temporibus expedita est nam aut! Voluptates soluta a accusamus ullam sed. Quasi omnis eligendi corporis quaerat labore corrupti id, laudantium nulla sint nemo? Minima, ad? Ea distinctio adipisci sunt harum. Illum et aspernatur enim molestiae vel dicta voluptatibus laudantium ipsa esse omnis nisi, accusamus officia, vitae dolores quos.',
        //     'category_id' => 3,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, eligendi voluptatum autem quasi voluptas numquam?',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem harum, quis ea sequi nobis voluptatum nulla illum sint veniam, eos ex deserunt autem provident quam. Suscipit nemo blanditiis officia quibusdam. Modi totam officiis, doloribus itaque aspernatur quisquam illum et quidem eos deserunt? Deserunt, quis. Dolor modi quisquam eveniet quam repellendus aspernatur! Ex temporibus expedita est nam aut! Voluptates soluta a accusamus ullam sed. Quasi omnis eligendi corporis quaerat labore corrupti id, laudantium nulla sint nemo? Minima, ad? Ea distinctio adipisci sunt harum. Illum et aspernatur enim molestiae vel dicta voluptatibus laudantium ipsa esse omnis nisi, accusamus officia, vitae dolores quos.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}

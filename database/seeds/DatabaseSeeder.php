<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PostSeeder::class);
    }
}

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();
        Post::create([
            'title' => 'Заголовок 1',
            'slug' => 'title 1',
            'excerpt' => 'Content introtext',
            'content' => 'Content all content text',
            'published' => 'true',
            'published_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        Post::create([
            'title' => 'Заголовок 2',
            'slug' => 'title 2',
            'excerpt' => 'Content introtext 2',
            'content' => 'Content all content text 2',
            'published' => 'false',
            'published_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        Post::create([
            'title' => 'Заголовок 3',
            'slug' => 'title 3',
            'excerpt' => 'Content introtext 3',
            'content' => 'Content all content text 3',
            'published' => 'true',
            'published_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
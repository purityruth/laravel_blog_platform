<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Author;
use App\Models\Category;

class PostSeeder extends Seeder
{
    public function run()
    {
        $authors = Author::all();
        $categories = Category::all();

        foreach ($authors as $author) {
            foreach ($categories as $category) {
                Post::create([
                    'title' => 'Blog Post ' . $author->name,
                    'body' => 'Great content, all day, every day.',
                    'author_id' => $author->id,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class SearchPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:search {query}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search for blog posts by title or body containing the specified string';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $query = $this->argument('query');

        // Search for posts by title or body containing the query
        $posts = Post::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('body', 'LIKE', '%' . $query . '%')
            ->get();

        if ($posts->isEmpty()) {
            $this->info("No posts found containing '{$query}'");
        } else {
            $this->info("Found " . $posts->count() . " post(s) containing '{$query}':");

            // Output the titles of the found posts
            foreach ($posts as $post) {
                $this->line("- " . $post->title);
            }
        }

        return 0; // Return 0 for successful execution
    }
}

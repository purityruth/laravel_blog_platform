<?php

namespace App\Jobs;

use App\Models\Post;
use App\Models\Subscriber;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;
use App\Mail\LatestArticlesEmail;

class SendLatestArticlesEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $newPost;
    
    public function __construct($newPost)
    {
        $this->newPost = $newPost;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Get the last 3 posts, excluding the new post
        $latestPosts = Post::where('id', '!=', $this->newPost->id)
                          ->orderBy('created_at', 'desc')
                          ->limit(3)
                          ->get();

        // Get all subscribers
        $subscribers = Subscriber::all();

        // Send email to each subscriber
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new LatestArticlesEmail($latestPosts));
        }
    }
}

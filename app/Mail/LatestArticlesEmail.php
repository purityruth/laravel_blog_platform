<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Models\Post;

class LatestArticlesEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $posts;
    
    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    public function build()
    {
        return $this->subject('Latest Blog Posts')
                    ->view('emails.latest_articles')
                    ->with(['posts' => $this->posts]);
    }

    
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Latest Articles Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

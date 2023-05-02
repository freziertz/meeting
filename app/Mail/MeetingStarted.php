<?php

namespace App\Mail;

use App\Models\Meeting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MeetingStarted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(protected Meeting $meeting)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Meeting Started',

            tags: ['Meeting Started'],
            metadata: [
                'meeting_id' => $this->meeting->id,
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // html: 'emails.meetings.published',
            // text: 'emails.meetings.published-text',
            markdown: 'emails.meetings.started',
            with: [
                'url' => "http://127.0.0.1:8000/meetings/" . $this->meeting->id,
                'title' => $this->meeting->title,
                'venue' => $this->meeting->venue,
                'description' => $this->meeting->description,
                'participants_notes' => $this->meeting->participants_notes,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];  // attach annotated meeting pack
    }
}

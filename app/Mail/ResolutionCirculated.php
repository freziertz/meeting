<?php

namespace App\Mail;


use App\Models\Resolution;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;
use Spatie\CalendarLinks\Link;


class ResolutionCirculated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;



    /**
     * Create a new message instance.
     */
    public function __construct(protected Resolution $resolution)
    {

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(

            subject: 'Resolution Circulated',

            tags: ['Resolution Publised'],
            metadata: [
                'resolution_id' => $this->resolution->id,
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {


        return new Content(
            // html: 'emails.resolutions.circulated',
            // text: 'emails.resolutions.circulated-text',
            markdown: 'emails.resolutions.circulated',
            with: [
                'url' => "http://127.0.0.1:8000/resolutions/" . $this->resolution->id,
                'title' => $this->resolution->subject,

                'voting_deadline' => $this->resolution->voting_deadline,
                'notes_to_voters' => $this->resolution->notes_to_voters,
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

        // attach a resolution pack
        return [
            // Attachment::fromPath('/path/to/file')
            //         ->as('name.pdf')
            //         ->withMime('application/pdf'),
        ];
    }
}

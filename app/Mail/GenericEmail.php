<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GenericEmail extends Mailable {
    use Queueable, SerializesModels;

    public $header, $content; 

    public function __construct($header, $content) {
        $this->header = $header;
        $this->content = $content;
    }

    public function envelope(): Envelope {
        return new Envelope(
            subject: $this->header,
        );
    }

    public function content(): Content {
        return new Content(
            view: 'mail.generic',
        );
    }

    public function attachments(): array {
        return [];
    }
}

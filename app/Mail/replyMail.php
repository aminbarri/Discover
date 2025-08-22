<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class replyMail extends Mailable
{
    use Queueable, SerializesModels;
    private string $email;
    private string $content;
    private int $id_message_reply;
    /**
     * Create a new message instance.
     */
    public function __construct($email,$content,$id_message_reply)
    {
        $this->email = $email;
        $this->content = $content;
        $this->id_message_reply = $id_message_reply;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
         $sujet = DB::table('messages')
            ->where('id_mess', $this->id_message_reply)
            ->first();

        return new Envelope(
            subject: 'Reply Mail To ' . $sujet->sujet,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.emails.reply',
            with: [
                'email'   => $this->email,
                'content' => $this->content,
            ]
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

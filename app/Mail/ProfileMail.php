<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ProfileMail extends Mailable
{
    use Queueable, SerializesModels;

    private string $name;
    private string $email;

    /**
     * Create a new message instance.
     */
    public function __construct(private  User $user)
    {
        // constructor logic
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Email Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $date = $date = $this->user->created_at ? $this->user->created_at->format('Y-m-d H:i:s') : now()->format('Y-m-d H:i:s');

        $id = $this->user->id;
        $href =url(''). '/verify_email/'.base64_encode($date.'//'.$id);

        return new Content(

            view: 'admin.emails.inscripp',
            with:[
                'email' =>$this->user->email,
                'name' =>$this->user->name,
                'href' => $href

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

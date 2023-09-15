<?php

namespace App\Mail;

use App\Models\Doctor;
use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailToLead extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    public $doctor;

    public function __construct(Message $message, Doctor $doctor)
    {
        $this->message = $message;
        $this->doctor = $doctor;
    }



    public function build()
    {
        return $this->from('tua-email@example.com')
            ->subject('Nuovo Messaggio')
            ->view('emails.new-message')
            ->with([
                'message' => $this->message,
                'doctor' => $this->doctor,
                // Altri dati necessari per la vista email
            ]);
    }
    public function envelope()
    {
        return new Envelope(
            replyTo: $this->message->email,
            subject: 'Richiesta di informazionei ricevuta ' . $this->message->name,
        );
    }


    public function content()
    {
        return new Content(
            view: 'emails.new-message',
        );
    }


    public function attachments()
    {
        return [];
    }
}

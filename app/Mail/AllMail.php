<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AllMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectText;
    public $user;
    public $content;
    public $attachments;

    /**
     * Create a new message instance.
     */
    public function __construct($subjectText, $user, $content, $attachments = [])
    {
        $this->subjectText = $subjectText;
        $this->user = $user;
        $this->content = $content;
        $this->attachments = $attachments;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $mail = $this->subject($this->subjectText)
                     ->view('email.email_template')
                     ->with([
                         'subject' => $this->subjectText,
                         'user' => $this->user,
                         'content' => $this->content,
                     ]);

        // Attach files if provided
        if(!empty($this->attachments)) {
            foreach ($this->attachments as $file) {
                $mail->attach($file['path'], $file['options'] ?? []);
            }
        }

        return $mail;
    }
}

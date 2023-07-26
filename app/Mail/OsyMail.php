<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OsyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $detail, $file, $extenstion;
    public function __construct($detail, $file_name, $extension)
    {
        $this->detail = $detail;
        $this->file = $file_name;
        $this->extenstion = $extension;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->file) {
            return $this->view('email.web.user-email')->with(['detail' => $this->detail])->attach(public_path() .  '/uploads/attachments/' . $this->file, [
                'as' => 'sample.' . $this->extenstion,

                'mime' => 'application/' . $this->extenstion,

            ]);
        } else {
            return $this->view('email.web.user-email')->with(['detail' => $this->detail]);
        }
    }
}
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoanApplication extends Mailable
{
    use Queueable, SerializesModels;

    public $data, $files;

    /**
     * Create a new message instance.
     *
     * @param  array  $data
     * @param  array  $files
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        // $this->file = [
        //     'file_path' => public_path('forms/preapproval-mfs.docx'), // use public_path() to get the correct absolute path
        //     'file_name' => 'Pre-Approval-Form.docx',
        //     'file_mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        //     // other data for the email template
        // ];
        $this->files = [
            [
                'file_path' => public_path('forms/preapproval-mfs.docx'),
                'file_name' => 'MFS -  Pre-approval Form.docx',
                'file_mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            ],
            [
                'file_path' => public_path('forms/letter-of-introduction-mfs.docx'),
                'file_name' => 'MRS - Letter of Introduction.pdf',
                'file_mime' => 'application/pdf',
            ],
            // Add more attachments as needed
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('email.loan-email')
        //     ->attach($this->file['file_path'], [
        //         'as' => $this->file['file_name'],
        //         'mime' => $this->file['file_mime'],
        //     ]);

        $message = $this->view('email.loan-email');

        foreach ($this->files as $file) {
            $message->attach($file['file_path'], [
                'as' => $file['file_name'],
                'mime' => $file['file_mime'],
            ]);
        }

        return $message;
    }
}

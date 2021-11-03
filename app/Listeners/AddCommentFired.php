<?php

namespace App\Listeners;

use App\Events\AddComment;
use Illuminate\Support\Facades\Mail;

class AddCommentFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AddComment  $event
     * @return void
     */
    public function handle(AddComment $event)
    {
        $data = [
            'name' => $event->name,
            'email' => $event->email,
            'message' => $event->message,
            'url' => $event->url,
        ];

        Mail::send(['text' => 'mail.add-comment'], ['data' => $data], function ($message) {
            $message->to(env('MAIL_TO_ADDRESS'), __('mail.admin_name'))->subject(__('mail.add_new_comment'));
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_ADDRESS'));
        });
    }
}

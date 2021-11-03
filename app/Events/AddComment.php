<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddComment
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $name;
    public string $email;
    public string $message;
    public string $url;

    /**
     * Create a new event instance.
     *
     * @param string $name author name
     * @param string $email author e-mail
     * @param string $message comment
     * @param string $url video url
     * @return void
     */
    public function __construct(string $name, string $email, string $message, string $url)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->url = $url;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

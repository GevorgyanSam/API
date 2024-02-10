<?php

namespace App\Jobs;

use App\Mail\NotifySubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifySubscribersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $post;
    public $subscribers;

    public function __construct($post, $subscribers)
    {
        $this->post = $post;
        $this->subscribers = $subscribers;
    }

    public function handle(): void
    {
        foreach ($this->subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new NotifySubscriber($this->post));
        }
    }
}

<?php

namespace App\Listeners;

use App\Events\TaskStatysUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTaskStatusNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TaskStatysUpdate $event): void
    {
        //

        Log::info("Task '{$event->task->title}'status  changed from '{$event->oldStatus}' to {$event->task->title}" 'status  changed from '{$event->oldStatus}');

    }
}

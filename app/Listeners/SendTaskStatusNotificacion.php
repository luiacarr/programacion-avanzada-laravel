<?php

namespace App\Listeners;

use App\Events\TaskStatusUpdated;
use App\Jobs\SendTaskCompleteEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTaskStatusNotificacion
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
    public function handle(TaskStatusUpdated $event): void
    {
        Log::info("Task '{$event->task->title}' status changed from '{$event->oldStatus}' to '{$event->task->status}'");
        if ($event->task->status === 'finalizado') {
            SendTaskCompleteEmail::dispatch($event->task);
        }
    }
}

<?php

namespace App\Listeners;

use App\Events\TaskStatusUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

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
    public function handle(TaskStatusUpdated $event): void
    {
        //
        Log::info("Task '{$event->task->title}' status changed from '{$event->oldstatus}' to '{$event->task->status}'");
        if($event->task->status === 'finalizado'){
            SendTaskCompletionEmail::dispatch($event->task);
        }
    }
}

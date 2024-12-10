<?php

namespace App\Jobs;

use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SendTaskCompletionEmail implements ShouldQueue
{
    use Queueable;

    public $task;

    /**
     * Create a new job instance.
     */
    public function __construct(Task $task)
    {
        //
        $this->task = $task;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Log::info("Sending completion email for task ID {$this->task->id}");
    }
}

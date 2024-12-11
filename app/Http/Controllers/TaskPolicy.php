<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskPolicy extends Controller
{
    public function update(User $user, Task $task): bool
    {
        return $user->id === $task->user_id;
    }
    public function delete(User $user, Task $task): bool
    {
        return $user->id === $task->user_id;
    }
}

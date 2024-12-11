<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class TaskController extends Controller
{
    public function update (Request $request, Task $task)
    {
        if (!Gate::allows('update-task', $task)) {
            return response()->json(['message'=>'No pemritido'], 403); 
    }
    $task->update($request->all());
    return redirect('task');
    }

public function destroy (Task $task){
    if (!Gate::allows('delete-task', $task)) {
        return response()->json(['message'=>'No pemritido'], 403);
    }
$task->estado='I';
$task->save();
return redirect('task');
    }
}
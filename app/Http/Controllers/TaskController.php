<?php

namespace App\Http\Controllers;

use App\Events\TaskStatusUpdated;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    //
    public function update(Request $request, Task $task){
        if(!Gate::allows('update-task',$task)){
            return response()->json(['message'=>'No permitido'],403);
        }

        //logica de actualizacion
        $task->update($request->all());
        event(new TaskStatusUpdated($task,$oldStatus));
        
        return redirect('task');
    }
    
    public function destroy(Task $task){
        if(!Gate::allows('delete-task',$task)){
            return response()->json(['message'=>'No permitido'],403);
        }

        //logica de actualizacion
        //$task->delete();
        $task->estado= 'I';
        $task->save();
        
        return redirect('task');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function update (Request $request , Task $task)
    {
        if (Gate::allows ('update-task', $task)){
            return response()->json(('message' => 'no Permitido'),403); 
        }
        //logica de actualizacion
        Task-> update ($request->all());
        return redirect('task');
    }
    public function destroy (Task $task)
    {
        if (Gate::allows ('delete-task', $task)){
            return response()->json(('message' => 'no Permitido'),403); 
        }
        //logica de actualizacion
        Task-> estado ($request->all());
        Task-> save(); 
        return redirect('task');
    }

}


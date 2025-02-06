<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return Task::all();
        return TaskResource::collection(Task::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        //
        Task::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'Task created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
        return TaskResource::make($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
        $task->update([
            'name' => $request->name,
            // 'status' => $request->status,
        ]);

        return TaskResource::make($task);
    }
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully'], 201);
    }
  
}

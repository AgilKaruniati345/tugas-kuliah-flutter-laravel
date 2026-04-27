<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return response()->json([
            'status' => 'success',
            'data' => $tasks
        ]);
    }

    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'status' => 'error',
                'message' => 'Task tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $task
        ]);
    }
}
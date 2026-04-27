<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengambil semua data',
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
            'message' => 'Berhasil mengambil detail data',
            'data' => $task
        ]);
    }

    public function store(Request $request)
{
    try {
        $task = Task::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditambahkan',
            'data' => $task
        ], 201);

    } catch (\Throwable $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
}

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        // VALIDASI
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $task->update($request->only('title', 'description'));

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diupdate',
            'data' => $task
        ]);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $task->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ]);
        
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        if (!auth()->check()){
            $tasks = Task::where('session_id', session()->getId())->get();
        }else{
            return redirect('/admin/tasks');
        }

        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.form');
    }

    public function edit(Task $task)
    {
        return view('tasks.form', compact('task'));
    }

    public function store(Request $request)
    {
        $this->validateTaskRequest($request);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'session_id' => auth()->check() ? null : session()->getId(),
            'user_id' => auth()->check() ? auth()->id() : null,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created!');
    }

    public function update(Request $request, Task $task)
    {
        $this->validateTaskRequest($request);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task successfully updated!');
    }

    public function delete(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }

    private function validateTaskRequest(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'description' => 'nullable',
            'status' => 'required|in:new,in_progress,completed',
        ]);
    }
}

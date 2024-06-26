<?php

namespace App\Http\Controllers;

use App\Events\TaskCreated;
use App\Http\Requests\storeTaskRequest;
use App\Models\Admin;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create', [
            'admins' => Admin::take(10)->get(),
            'users' => User::take(10)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeTaskRequest $request)
    {
        $task = Task::create($request->validated());
        event(new TaskCreated($task));
        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }
}

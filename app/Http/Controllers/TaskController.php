<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view("task.list")
            ->with("tasks", Task::all());
    }

    public function store(TaskRequest $request)
    {
        Task::forceCreate([
            'name'        => $request->name,
            "description" => $request->description
        ]);

        return ['message' => 'Task Created'];
    }

    public function update(Task $task)
    {

    }
}

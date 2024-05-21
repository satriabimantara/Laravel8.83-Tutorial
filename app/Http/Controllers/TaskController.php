<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('is_admin');
    }
    public function index(Request $request)
    {
        $tasks = Task::paginate(4);
        // ddd(request()->all());
        // ambil to dolist berdasarkan query string
        if ($request->search) {
            $key = $request->search;
            $tasks = Task::where('task', 'LIKE', "%$key%")->paginate(4);
        }
        $context = [
            'tasks' => $tasks
        ];
        return view('task.index', $context);
    }
    public function create()
    {
        $context = [
            'formurl' => '/tasks',
            'button' => [
                'class' => 'btn btn-primary',
                'text' => 'Submit'
            ]
        ];
        return view('task.create', $context);
    }
    public function show($id)
    {
        $task = Task::find($id);
        return $task;
    }
    public function edit($id)
    {
        $task = Task::find($id);
        $context = [
            'formurl' => "/tasks/$task->id",
            'method' => 'PATCH',
            'task' => $task,
            'button' => [
                'class' => 'btn btn-warning',
                'text' => 'Edit'
            ]
        ];
        return view('task.edit', $context);
    }
    // route POST
    public function store(TaskRequest $request)
    {
        Task::create([
            'task' => $request->task,
            'user' => $request->user
        ]);

        return redirect('/tasks');
    }
    // route PATCH / UPDATE
    public function update(TaskRequest $request, $id)
    {
        $task = Task::find($id);
        $task->update([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return redirect('/tasks');
    }
    // route DELETE
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect('/tasks');
    }
}

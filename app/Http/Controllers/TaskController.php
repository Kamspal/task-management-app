<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = Task::all();
        $projects = Project::all();
        
        return view('task.index', compact('tasks', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        return view('task.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string',
            'priority' => 'required|integer',
            'project_id' =>'required|integer'
        ]);

        Task::create($request->all());

        return redirect('tasks')->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('task.edit', compact('task', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'task_name' => 'required|string',
            'priority' => 'required|integer',
            'project_id' => 'required|integer'
        ]);

        $task = Task::find($id);
        $task->update($request->all());

        return redirect('tasks')->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('tasks')->with('success', 'Task deleted successfully');
    }

    // Update task priority on drag and drop

    public function updatePriorities(Request $request)
    {
        $tasks = $request->input('tasks');

        foreach ($tasks as $task) {
            Task::where('id', $task['id'])->update(['priority' => $task['priority']]);
        }

        return response()->json(['success' => true]);
    }

    public function projectsWithTasks() {

        $projects = Project::all();
        $tasks = Task::all();

        return view('projects-with-tasks', compact('tasks', 'projects'));
    }
}

<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="container">
    <h1>Task List</h1>
        <div class="row">
            <div class="col-10">
            <a href="{{ route('tasks.create') }}" class="btn btn-success">Create New Task</a>
            </div>
            <div class="col-2"> 
                <a href="{{ route('projects.index') }}" class="btn btn-primary">Go to Projects</a>
            </div>   
        </div>
       
    
    @if(count($tasks) > 0)
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Name</th>
                <th>Priority</th>
                <th>Task Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->project->name }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>{{ $task->task_name }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                        <!-- Add delete button with a form to handle deletion -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p class="mt-3">No projects found.</p>
    @endif
    </div>

@endsection

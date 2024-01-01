@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="task_name">Task Name:</label>
            <input type="text" name="task_name" id="task_name" class="form-control" value="{{ $task->task_name }}" required>
            @error('task_name')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="priority">Priority:</label>
            <input type="text" name="priority" id="priority" class="form-control" value="{{ $task->priority }}" required>
            @error('priority')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
        <label for="project_id">Project:</label>
            <select name="project_id" id="project_id" class="form-control" required>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        @error('project_id')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
    
    <p class="mt-3"><a href="{{ route('tasks.index') }}">Back to Task List</a></p>
    
@endsection

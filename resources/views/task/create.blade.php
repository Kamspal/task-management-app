@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Create Task</h1>

    <form method="post" action="{{ route('tasks.store') }}">
      @csrf

      <div class="form-group">
        <label for="name">Task Name:</label>
        <input type="text" name="task_name" id="task_name" class="form-control" required>
        @error('task_name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="priority">Priority:</label>
        <input type="number" name="priority" id="priority" class="form-control" required>
        @error('priority')
            <p style="color: red;">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="project">Project:</label>
        <select name="project_id" id="project_id" class="form-control">
          <option value="">Select Project</option>
          @foreach($projects as $project)
            <option value="{{ $project->id }}">{{ $project->name }}</option>
          @endforeach
        </select>
        @error('project_id')
            <p style="color: red;">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
    <p class="mt-3"><a href="{{ route('tasks.index') }}">Back to Task List</a></p>
  </div>
 
@endsection
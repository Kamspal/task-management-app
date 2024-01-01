@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Create Project</h1>

    <form method="post" action="{{ route('projects.store') }}">
      @csrf

      <div class="form-group">
        <label for="name">Project Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary">Create Project</button>
    </form>
    <p class="mt-3"><a href="{{ route('projects.index') }}">Back to Project List</a></p>
  </div>
@endsection

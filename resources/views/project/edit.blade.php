@extends('layouts.app')

@section('content')
    <h1>Edit Project</h1>

    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="project_name">Project Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}" required>
            @error('name')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Project</button>
    </form>

    <p class="mt-3"><a href="{{ route('projects.index') }}">Back to Project List</a></p>
@endsection

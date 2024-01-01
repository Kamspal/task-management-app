@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Project List</h1>
    <div class="row">
        <div class="col-10">
            <a href="{{ route('projects.create') }}" class="btn btn-success">Create New Project</a>
        </div>
        <div class="col-2">
            <a href="{{ route('tasks.index') }}" class="btn btn-primary">Go to Tasks</a>
        </div>
    </div>


    @if(count($projects) > 0)
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Edit</a>
                    <!-- Add delete button with a form to handle deletion -->
                    <form action="{{ route('projects.destroy', $project->id) }}" method="post" style="display: inline-block;">
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
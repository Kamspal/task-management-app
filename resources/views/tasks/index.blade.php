@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
    <ul class="list-group mt-3">
        @foreach ($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('tasks.edit', $task->id) }}">{{ $task->title }}</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
        <p class="mt-1 bold-text">Click on the task name to edit and update</p>
    </ul>
</div>
@endsection

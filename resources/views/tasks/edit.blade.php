@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $task->title }}" required>
        </div>
        <div class="form-group mb-1">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description">{{ $task->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary mx-2">Back</a>
    </form>
</div>
@endsection

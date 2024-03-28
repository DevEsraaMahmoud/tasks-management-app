@extends('layout')

@section('title', 'Task List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Tasks</h2>
    <div class="d-flex">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mr-2">Create Task</a>
        <a href="{{ route('tasks.statistics') }}" class="btn btn-info">View Statistics</a>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Assigned Name</th>
            <th>Admin Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->user->name }}</td>
            <td>{{ $task->admin->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $tasks->links() }}
</div>
@endsection
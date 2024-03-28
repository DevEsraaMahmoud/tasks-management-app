@extends('layout')

@section('title', 'Task List')

@section('content')

<div class="container">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col">
            <h2>Tasks</h2>
        </div>
        <div class="col-auto">
            <div class="btn-group" role="group" aria-label="Task Actions">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
                <a href="{{ route('tasks.statistics') }}" class="btn btn-info">View Statistics</a>
            </div>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if($tasks->isEmpty())
    <div class="alert alert-info">No tasks yet.</div>
    @else
    <div class="table-responsive">
        <table class="table table-striped">
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
    </div>

    <div class="d-flex justify-content-center">
        {{ $tasks->links() }}
    </div>
    @endif
</div>

@endsection
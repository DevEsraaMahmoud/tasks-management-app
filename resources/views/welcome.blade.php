<!-- resources/views/welcome.blade.php -->

@extends('layout')

@section('title', 'Welcome')

@section('content')
<div class="jumbotron text-center">
    <h1>Welcome to Task Management System</h1>
    <p>Click below to navigate:</p>
    <div class="mt-4">
        <a href="{{ route('tasks.index') }}" class="btn btn-primary mr-3">Task List</a>
        <a href="{{ route('tasks.create') }}" class="btn btn-success mr-3">Create Task</a>
        <a href="{{ route('tasks.statistics') }}" class="btn btn-info">Statistics</a>
    </div>
</div>
@endsection

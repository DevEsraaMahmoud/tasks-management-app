<!-- statistics.blade.php -->

@extends('layout')

@section('title', 'User Task Statistics')

@section('content')
<h2>User Task Statistics</h2>
<table class="table">
    <thead>
        <tr>
            <th>User</th>
            <th>Task Count</th>
        </tr>
    </thead>
    <tbody>
        @foreach($topUsers as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->tasks_count }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
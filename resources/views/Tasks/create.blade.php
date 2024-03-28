@extends('layout')

@section('title', 'Task List')

@section('content')
<h2>Create Task</h2>
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="admin_name">Admin Name:</label>
        <select class="form-control" id="assigned_by_id" name="assigned_by_id">
            <option value="">Select Admin</option>
            @foreach($admins as $admin)
            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="assigned_user">Assigned User:</label>
        <select class="form-control select2" id="assigned_to_id" name="assigned_to_id">
            <option value="">Select User</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create Task</button>
</form>

<script>
    $(document).ready(function() {
        $('#assigned_to_id').select2({
            placeholder: "Search for a user...",
            allowClear: true,
            minimumInputLength: 0,
            ajax: {
                url: '{{ route("search.users") }}',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        $('#assigned_by_id').select2({
            placeholder: "Search for an admin...",
            allowClear: true,
            minimumInputLength: 0,
            ajax: {
                url: '{{ route("search.admins") }}',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    });
</script>
@endsection
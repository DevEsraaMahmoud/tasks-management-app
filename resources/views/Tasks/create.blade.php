@extends('layout')

@section('title', 'Create Task')

@section('content')
<div class="container">
    <h2>Create Task</h2>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="admin_name">Admin Name<span class="text-danger">*</span></label>
            <select class="form-control" id="assigned_by_id" name="assigned_by_id" required>
                <option value="">Select Admin</option>
                @foreach($admins as $admin)
                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                @endforeach
            </select>
            @error('assigned_by_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Task Title<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="title" name="title" required>
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Task Description<span class="text-danger">*</span></label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
            @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="assigned_user">Assigned User<span class="text-danger">*</span></label>
            <select class="form-control select2" id="assigned_to_id" name="assigned_to_id" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('assigned_to_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#assigned_to_id').select2({
            placeholder: "Search for a user...",
            allowClear: true,
            ajax: {
                url: '{{ route("search.users") }}',
                dataType: 'json',
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
            ajax: {
                url: '{{ route("search.admins") }}',
                dataType: 'json',
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
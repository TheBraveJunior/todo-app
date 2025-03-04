@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Create Task')

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ isset($task) ? 'Edit Task' : 'Create Task' }}</h1>

        <form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.save') }}" method="POST">
            @csrf
            @if(isset($task))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', isset($task) ? $task->title : '') }}" required>
                @error('title')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description (optional)</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', isset($task) ? $task->description : '') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="new" {{ old('status', isset($task) ? $task->status : '') == 'new' ? 'selected' : '' }}>New</option>
                    <option value="in_progress" {{ old('status', isset($task) ? $task->status : '') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status', isset($task) ? $task->status : '') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($task) ? 'Update Task' : 'Create Task' }}</button>
        </form>
    </div>
@endsection

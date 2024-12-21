@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Todo</h1>

    <div class="d-flex justify-content-center">
        <div class="card shadow-lg p-4 w-50">
            <h3 class="text-center mb-3">Edit Todo Details</h3>
            <form action="{{ route('todo.update', $todoList->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- or @method('PATCH') -->

                <!-- Title Field -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" value="{{ $todoList->title }}" class="form-control" name="title" id="title" required>
                </div>

                <!-- Description Field -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" value="{{ $todoList->description }}" class="form-control" name="description" id="description" required>
                </div>

                <!-- Due Date Field -->
                <div class="mb-3">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input type="date" value="{{ $todoList->due_date }}" class="form-control" name="due_date" id="due_date" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Update Todo</button>
            </form>
        </div>
    </div>
</div>
@endsection

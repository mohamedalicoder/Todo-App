@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">To Do App</h1>

    <!-- Add Todo Form -->
    <div class="d-flex justify-content-center">
        <div class="card shadow-lg p-4 w-50">
            <h3 class="text-center mb-3">Add New Todo</h3>
            <form action="{{ route('todo.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" id="description" required>
                </div>
                <div class="mb-3">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input type="date" class="form-control" name="due_date" id="due_date" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Add Todo</button>
            </form>
        </div>
    </div>

    <!-- Show Todos Table -->
    @if ($todos->isEmpty())
        <div class="alert alert-info text-center mt-5">No Todos Found</div>
    @else
        <div class="table-responsive mt-5">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos as $todo)
                        <tr>
                            <td>{{ $todo->title }}</td>
                            <td>{{ $todo->description }}</td>
                            <td>{{ \Carbon\Carbon::parse($todo->due_date)->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this todo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection

@push('styles')
<style>
    .card {
        background-color: #f8f9fa;
    }
    .table th, .table td {
        text-align: center;
    }
    .table th {
        background-color: #343a40;
        color: white;
    }
    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }
    .alert-info {
        font-size: 1.2em;
    }
</style>
@endpush

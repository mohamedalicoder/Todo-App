@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Deleted Todos</h1>

    @if($deletedData->isEmpty())
        <div class="alert alert-info">No deleted todos found.</div>
    @else
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deletedData as $todo)
                    <tr>
                        <td>{{ $todo->id }}</td>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->description }}</td>
                        <td>{{ $todo->deleted_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <!-- Restore Button -->
                            <form action="{{ route('todo.restore', $todo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm" title="Restore Todo">Restore</button>
                            </form>

                            <!-- Force Delete Button -->
                            <form action="{{ route('todo.forceDelete', $todo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Permanently Delete Todo" onclick="return confirm('Are you sure you want to permanently delete this todo?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection

@push('styles')
<style>
    .table th, .table td {
        text-align: center;
    }

    .table .btn {
        margin: 0 5px;
    }

    .thead-dark th {
        background-color: #343a40;
        color: white;
    }

    .alert-info {
        text-align: center;
        font-size: 1.2em;
    }
</style>
@endpush

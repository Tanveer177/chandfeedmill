@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Roles Management</h1>
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Create Role</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach($role->permissions as $permission)
                        <span class="badge bg-info text-dark">{{ $permission->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('roles.destroy', $role) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $roles->links() }}
    </div>
</div>
@endsection

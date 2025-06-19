@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Role</h1>
    <form action="{{ route('roles.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Role Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="permissions" class="form-label">Permissions</label>
            <select name="permissions[]" id="permissions" class="form-select" multiple>
                @foreach($permissions as $permission)
                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

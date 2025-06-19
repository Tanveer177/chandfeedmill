@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Permission</h1>
    <form action="{{ route('permissions.update', $permission) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Permission Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $permission->name) }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

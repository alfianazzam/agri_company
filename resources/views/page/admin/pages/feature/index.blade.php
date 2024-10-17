@extends('layouts.admin')

@section('title', 'Feature Management')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Feature Management</h2>

        <div class="card shadow-lg border-0 rounded mb-4">
            <div class="card-header bg-black text-white text-center">
                <h2 class="mb-0 font-weight-bold">Live Preview</h2>
            </div>
            <div class="card-body p-4">
                <iframe src="{{ route('feature.show') }}" width="100%" height="500px" style="border: none; border-radius: 10px; overflow: hidden;" class="shadow-sm" scrolling="yes"></iframe>
            </div>
        </div>

        <div class="card shadow-lg border-0 rounded mb-4">
            <div class="card-header bg-black text-white text-center">
                <h2 class="mb-0 font-weight-bold">Icons Preview</h2>
            </div>
            <div class="card-body p-4">
                <iframe src="{{ route('feature.icons') }}" width="100%" height="500px" style="border: none; border-radius: 10px; overflow: hidden;" class="shadow-sm" scrolling="yes"></iframe>
            </div>
        </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add New Feature Form -->
    <form action="{{ route('feature.store') }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
        @csrf

        <div class="form-group mb-3">
            <label for="icon_class" class="font-weight-bold">Icon Class</label>
            <input type="text" name="icon_class" id="icon_class" class="form-control" value="{{ old('icon_class') }}" placeholder="e.g., icon-lightbulb" required>
            @error('icon_class')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="icon_name" class="font-weight-bold">Icon Name</label>
            <input type="text" name="icon_name" id="icon_name" class="form-control" value="{{ old('icon_name') }}" placeholder="Icon description" required>
            @error('icon_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="title" class="font-weight-bold">Feature Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Feature Title" required>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description" class="font-weight-bold">Feature Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter feature description" required>{{ old('description') }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary btn-block">Add Feature</button>
        </div>
    </form>

    <!-- Existing Features -->
    <h3 class="mt-5">Existing Features</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Icon Class</th>
                <th>Icon Name</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($features as $feature)
                <tr>
                    <td><i class="{{ $feature->icon_class }}"></i> ({{ $feature->icon_class }})</td>
                    <td>{{ $feature->icon_name }}</td>
                    <td>{{ $feature->title }}</td>
                    <td>{{ $feature->description }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('feature.show', $feature->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <!-- Delete Form -->
                        <form action="{{ route('feature.delete', $feature->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this feature?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

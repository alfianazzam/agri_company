@extends('layouts.admin')

@section('title', 'Manage Gallery')

@section('content')
<main>
    <div class="container p-4">

        <!-- Live Preview Section -->
        <div class="card shadow-lg border-0 rounded mb-4">
            <div class="card-header bg-dark text-white text-center">
                <h2 class="mb-0 font-weight-bold">Live Preview</h2>
            </div>
            <div class="card-body p-4">
                <iframe id="livePreview" src="{{ route('gallery.show') }}" width="100%" height="500px" style="border: none; border-radius: 10px;" class="shadow-sm"></iframe>
            </div>
        </div>
        
        <!-- Form Gallery -->
        <div class="card-body">
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

            <form id="createUpdateGallery" action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="gallery_id">

                <!-- Title Input -->
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required placeholder="Enter gallery title">
                </div>

                <!-- Category Dropdown -->
                <div class="form-group mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="" disabled selected>Select category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Image Upload -->
                <div class="form-group mb-3">
                    <label for="img_url" class="form-label">Upload Image</label>
                    <input type="file" name="img_url" id="img_url" class="form-control">
                    <img id="current_image" src="" class="img-thumbnail mt-2" style="display:none;" width="100">
                </div>

                <!-- Description -->
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success" id="saveButton">
                    Save Gallery
                </button>
            </form>
        </div>

        <!-- Existing Galleries -->
        <div class="card shadow-lg mt-4">
            <div class="card-header bg-dark text-white">
                <h3>Existing Galleries</h3>
            </div>
            <div class="card-body">
                <div class="row">
                @foreach($galleries as $gallery)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('storage/' . $gallery->img_url) }}" class="card-img-top" alt="{{ $gallery->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $gallery->title }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($gallery->description, 100, '...') }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <small class="text-muted">
                                    <i>Category:</i> {{ $gallery->category->name }} <br>
                                    <i>Uploaded by:</i> {{ $gallery->user->name }}
                                </small>
                                <hr>
                                <a href="javascript:void(0);" class="btn btn-warning btn-sm" onclick="populateForm({{ json_encode($gallery) }});">
                                    Edit
                                </a>
                                <form action="{{ route('gallery.delete', $gallery->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function populateForm(gallery) {
        document.getElementById('gallery_id').value = gallery.id;
        document.getElementById('title').value = gallery.title;
        document.getElementById('category_id').value = gallery.category_id;
        document.getElementById('description').value = gallery.description;

        // Set gambar saat ini
        if (gallery.img_url) {
            document.getElementById('current_image').src = `{{ asset('storage/') }}/${gallery.img_url}`;
            document.getElementById('current_image').style.display = 'block';
        } else {
            document.getElementById('current_image').style.display = 'none';
        }

        // Scroll ke form dengan smooth
        const form = document.getElementById('createUpdateGallery');
        const formPosition = form.getBoundingClientRect().top + window.scrollY;
        window.scrollTo({ top: formPosition, behavior: 'smooth' });
    }
</script>

@endsection

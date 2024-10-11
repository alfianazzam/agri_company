@extends('layouts.admin')

@section('title', 'Manage Posters')

@section('content')
<main>
    <div class="container p-4">

        <!-- Live Preview Section -->
        <div class="card shadow-lg border-0 rounded mb-4">
            <div class="card-header bg-dark text-white text-center">
                <h2 class="mb-0 font-weight-bold">Live Preview</h2>
            </div>
            <div class="card-body p-4">
                <iframe id="livePreview" src="{{ route('poster.show', 1) }}" width="100%" height="500px" style="border: none; border-radius: 10px;" class="shadow-sm"></iframe>
            </div>
        </div>

        <!-- Form Section -->
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
            
            <form id="createUpdatePoster" action="{{ route('poster.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="poster_id">

                <!-- Title Input -->
                <div class="form-group mb-3">
                    <label for="title" class="form-label"><i class="fas fa-heading me-2"></i>Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required placeholder="Enter poster title">
                </div>

                <!-- Image Upload -->
                <div class="form-group mb-3">
                    <label for="image_url" class="form-label"><i class="fas fa-image me-2"></i>Upload Image</label>
                    <input type="file" name="image_url" id="image_url" class="form-control">
                    <img id="current_image" src="" class="img-thumbnail mt-2" style="display:none;" width="100">
                </div>

                <!-- Content Input -->
                <div class="form-group mb-3">
                    <label for="content" class="form-label"><i class="fas fa-align-left me-2"></i>Content</label>
                    <textarea name="content" id="content" class="form-control summernote mb-4" rows="5" required placeholder="Write your poster content here...">{{ old('content') }}</textarea>
                </div>

                <!-- Category Selection -->
                <div class="form-group mb-3">
                    <label for="category_id" class="form-label"><i class="fas fa-list-alt me-2"></i>Category</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Select a category</option>
                        @foreach($categories as $category) <!-- Gantilah $posters menjadi $categories untuk mengacu pada model Category -->
                            <option value="{{ $category->id }}" {{ (old('category_id') ?? $poster->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success" id="saveButton">
                    <i class="fas fa-save me-2"></i>Save Poster
                </button>
                <button type="submit" class="btn btn-warning d-none" id="updateButton">
                    <i class="fas fa-edit me-2"></i>Update Poster
                </button>
            </form>
        </div>



        <!-- Existing Posters -->
        <div class="card shadow-lg mt-4">
            <div class="card-header bg-dark text-white">
                <h3><i class="fas fa-file-alt me-2"></i>Existing Posters</h3>
            </div>
            <div class="card-body">
                <div class="row">
                @foreach($posters as $poster)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('storage/' . $poster->img_url) }}" class="card-img-top" alt="{{ $poster->title }}">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-file-signature me-2"></i>{{ $poster->title }}</h5>
                                <!-- Limit content to 100 characters -->
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($poster->content, 100, '...') }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <!-- Display the writer's username, category, and timestamp -->
                                <small class="text-muted">
                                    <i class="fas fa-user me-1"></i>Written by: {{ $poster->user->name }} <br>
                                    <i class="fas fa-tags me-1"></i>Category: {{ $poster->category->name ?? 'No category assigned' }} <br>
                                    <i class="fas fa-clock me-1"></i>Published: {{ $poster->created_at->format('M d, Y H:i') }}
                                </small>
                                <hr>
                                <a href="javascript:void(0);" class="btn btn-secondary btn-sm" onclick="scrollToPreview({{ $poster->id }});">
                                    <i class="fas fa-eye me-1"></i>View Poster
                                </a>
                                <a href="javascript:void(0);" class="btn btn-warning btn-sm" onclick="scrollToForm(); populateForm({{ json_encode($poster) }});">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('poster.delete', $poster->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash me-1"></i>Delete
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

<!-- JavaScript Functions -->
<script>
    function scrollToForm() {
        const formSection = document.getElementById('createUpdatePoster');
        formSection.scrollIntoView({ behavior: 'smooth' });
    }

    function scrollToPreview(posterId) {
        const previewSection = document.getElementById('livePreview');
        previewSection.src = `{{ url('admin/poster/show') }}/${posterId}`;
        previewSection.scrollIntoView({ behavior: 'smooth' });
    }

    function populateForm(poster) {
        document.getElementById('poster_id').value = poster.id;
        document.getElementById('title').value = poster.title;
        document.getElementById('content').value = poster.content.replace(/<br\s*\/?>/gi, '\n');
        
        // Tampilkan gambar jika ada
        const currentImage = document.getElementById('current_image');
        if (poster.img_url) {
            currentImage.src = `{{ asset('storage/') }}/${poster.img_url}`;
            currentImage.style.display = 'block';
        } else {
            currentImage.style.display = 'none';
        }

        // Tampilkan tombol update, sembunyikan tombol save
        document.getElementById('saveButton').classList.add('d-none');
        document.getElementById('updateButton').classList.remove('d-none');
    }
</script>

<!-- Summernote Initialization -->
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>
@endsection

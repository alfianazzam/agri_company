@extends('layouts.admin')

@section('title', 'Manage Projects')

@section('content')
<main>
    <div class="container p-4">

        <!-- Live Preview Section -->
        <div class="card shadow-lg border-0 rounded mb-4">
            <div class="card-header bg-dark text-white text-center">
                <h2 class="mb-0 font-weight-bold">Live Preview</h2>
            </div>
            <div class="card-body p-4">
                <iframe id="livePreview" src="{{ route('project.show', 1) }}" width="100%" height="500px" style="border: none; border-radius: 10px;" class="shadow-sm"></iframe>
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
            
            <form id="createUpdateProject" action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="project_id">

                <!-- Jumbotron Title Input -->
                <div class="form-group mb-3">
                    <label for="jumbotron_title" class="form-label"><i class="fas fa-heading me-2"></i>Jumbotron Title</label>
                    <input type="text" name="jumbotron_title" id="jumbotron_title" class="form-control" value="{{ old('jumbotron_title') }}" required placeholder="Enter jumbotron title">
                </div>

                <!-- Jumbotron Subtitle Input -->
                <div class="form-group mb-3">
                    <label for="jumbotron_subtitle" class="form-label"><i class="fas fa-heading me-2"></i>Jumbotron Subtitle</label>
                    <input type="text" name="jumbotron_subtitle" id="jumbotron_subtitle" class="form-control" value="{{ old('jumbotron_subtitle') }}" placeholder="Enter jumbotron subtitle">
                </div>

                <!-- Jumbotron Image Upload -->
                <div class="form-group mb-3">
                    <label for="jumbotron_image" class="form-label"><i class="fas fa-image me-2"></i>Upload Jumbotron Image</label>
                    <input type="file" name="jumbotron_image" id="jumbotron_image" class="form-control">
                    <img id="current_jumbotron_image" src="" class="img-thumbnail mt-2" style="display:none;" width="100">
                </div>

                <!-- Text Content Input -->
                <div class="form-group mb-3">
                    <label for="text_content" class="form-label"><i class="fas fa-align-left me-2"></i>Content</label>
                    <textarea name="text_content" id="text_content" class="form-control summernote mb-4" rows="5" required placeholder="Write your project content here...">{{ old('text_content') }}</textarea>
                </div>

                <!-- Client Input -->
                <div class="form-group mb-3">
                    <label for="client" class="form-label"><i class="fas fa-user me-2"></i>Client</label>
                    <input type="text" name="client" id="client" class="form-control" value="{{ old('client') }}" placeholder="Enter client name">
                </div>

                <!-- Date Input -->
                <div class="form-group mb-3">
                    <label for="date" class="form-label"><i class="fas fa-calendar-alt me-2"></i>Date</label>
                    <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}">
                </div>

                <!-- Location Input -->
                <div class="form-group mb-3">
                    <label for="location" class="form-label"><i class="fas fa-map-marker-alt me-2"></i>Location</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" placeholder="Enter location">
                </div>

                <!-- Website Input -->
                <div class="form-group mb-3">
                    <label for="website" class="form-label"><i class="fas fa-globe me-2"></i>Website</label>
                    <input type="url" name="website" id="website" class="form-control" value="{{ old('website') }}" placeholder="Enter website URL">
                </div>

                <!-- Slider Images Upload -->
                <div class="form-group mb-3">
                    <label for="images" class="form-label">
                        <i class="fas fa-images me-2"></i>Upload Slider Images
                    </label>
                    <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*" onchange="previewImages()">
                    <small class="form-text text-muted">You can upload multiple images.</small>

                    <!-- Preview Container -->
                    <div class="row mt-3" id="imagePreviewContainer" style="display: flex; flex-wrap: wrap;">
                        <!-- This is where the uploaded image previews will appear -->
                    </div>
                </div>

                <script>
                    // Array to hold files for upload
                    let fileArray = [];

                    function previewImages() {
                        var imagePreviewContainer = document.getElementById('imagePreviewContainer');
                        var files = document.getElementById('images').files;

                        if (files.length > 0) {
                            // Add new files to the fileArray
                            for (let i = 0; i < files.length; i++) {
                                fileArray.push(files[i]);
                            }

                            updatePreview(); // Update the preview with the new images
                        }
                    }

                    function updatePreview() {
                        var imagePreviewContainer = document.getElementById('imagePreviewContainer');
                        imagePreviewContainer.innerHTML = ''; // Clear previous previews

                        fileArray.forEach((file, index) => {
                            if (file.type.startsWith('image/')) {
                                let reader = new FileReader();

                                reader.onload = function (e) {
                                    // Create a div for each image and its delete button
                                    let colDiv = document.createElement('div');
                                    colDiv.classList.add('col-sm-4', 'mb-3', 'position-relative');
                                    colDiv.style.marginRight = "10px"; // Adjust margin for better alignment

                                    let img = document.createElement('img');
                                    img.setAttribute('src', e.target.result);
                                    img.setAttribute('class', 'img-fluid rounded shadow-sm');
                                    img.setAttribute('alt', 'Uploaded Image Preview');
                                    img.setAttribute('style', 'max-height: 150px; object-fit: cover;');

                                    // Create the delete button (X)
                                    let deleteBtn = document.createElement('button');
                                    deleteBtn.setAttribute('type', 'button');
                                    deleteBtn.classList.add('btn', 'btn-danger', 'position-absolute', 'top-0', 'right-0');
                                    deleteBtn.innerHTML = '&times;';
                                    deleteBtn.style.zIndex = '2'; // Ensure the button is above the image
                                    deleteBtn.onclick = function () {
                                        removeImage(index);
                                    };

                                    // Append image and delete button to the div
                                    colDiv.appendChild(img);
                                    colDiv.appendChild(deleteBtn);

                                    imagePreviewContainer.appendChild(colDiv);
                                };

                                reader.readAsDataURL(file);
                            }
                        });
                    }

                    function removeImage(index) {
                        // Remove the file from the fileArray
                        fileArray.splice(index, 1);
                        updatePreview(); // Re-render the preview after removal
                    }
                </script>


                <!-- Category Selection -->
                <div class="form-group mb-3">
                    <label for="category_id" class="form-label"><i class="fas fa-list-alt me-2"></i>Category</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ (old('category_id') ?? $project->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success" id="saveButton">
                    <i class="fas fa-save me-2"></i>Save Project
                </button>
                <button type="submit" class="btn btn-warning d-none" id="updateButton">
                    <i class="fas fa-edit me-2"></i>Update Project
                </button>
            </form>
        </div>

        <!-- Existing Projects -->
        <div class="card shadow-lg mt-4">
            <div class="card-header bg-dark text-white">
                <h3><i class="fas fa-file-alt me-2"></i>Existing Projects</h3>
            </div>
            <div class="card-body">
                <div class="row">
                @foreach($projects as $project)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('storage/' . $project->jumbotron_image) }}" class="card-img-top" alt="{{ $project->jumbotron_title }}">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-file-signature me-2"></i>{{ $project->jumbotron_title }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($project->text_content, 100, '...') }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <small class="text-muted">
                                    <i class="fas fa-user me-1"></i>Client: {{ $project->client }} <br>
                                    <i class="fas fa-clock me-1"></i>Date: {{ $project->date ? $project->date->format('M d, Y') : 'No date' }} <br>
                                    <i class="fas fa-map-marker-alt me-1"></i>Location: {{ $project->location }} <br>
                                    <i class="fas fa-tags me-1"></i>Category: {{ $project->category->name ?? 'No category assigned' }} <br>
                                </small>
                                <hr>
                                <a href="javascript:void(0);" class="btn btn-secondary btn-sm" onclick="scrollToPreview({{ $project->id }});">
                                    <i class="fas fa-eye me-1"></i>View Project
                                </a>
                                <a href="javascript:void(0);" class="btn btn-warning btn-sm" onclick="scrollToForm(); populateForm({{ json_encode($project) }});">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('project.delete', $project->id) }}" method="POST" class="d-inline">
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
        const formSection = document.getElementById('createUpdateProject');
        formSection.scrollIntoView({ behavior: 'smooth' });
    }

    function scrollToPreview() {
        const previewSection = document.getElementById('livePreview');
        previewSection.scrollIntoView({ behavior: 'smooth' });
    }

    function populateForm(project) {
        document.getElementById('project_id').value = project.id;
        document.getElementById('jumbotron_title').value = project.jumbotron_title;
        document.getElementById('jumbotron_subtitle').value = project.jumbotron_subtitle;
        document.getElementById('text_content').value = project.text_content;
        document.getElementById('client').value = project.client;
        document.getElementById('date').value = project.date ? project.date : '';
        document.getElementById('location').value = project.location;
        document.getElementById('website').value = project.website;
        document.getElementById('category_id').value = project.category_id;

        // Set current jumbotron image
        const currentImage = document.getElementById('current_jumbotron_image');
        currentImage.src = '/storage/' + project.jumbotron_image;
        currentImage.style.display = 'block';
        
        // Show the update button and hide the save button
        document.getElementById('updateButton').classList.remove('d-none');
        document.getElementById('saveButton').classList.add('d-none');
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

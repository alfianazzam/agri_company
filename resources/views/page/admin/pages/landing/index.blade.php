@extends('layouts.admin')

@section('title', 'Page Landing')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <!-- 1. Jumbotron -->
        <div class="card mb-4">

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

            <div class="card-header d-flex justify-content-between align-items-center">
                <h5><i class="fas fa-image me-1"></i> Add Jumbotron</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="jumbotronTitle" class="form-label">Title</label>
                        <input class="form-control" type="text" name="title" id="jumbotronTitle" placeholder="Jumbotron Title">
                    </div>

                    <div class="mb-3">
                        <label for="subTitle" class="form-label">Subtitle</label>
                        <input class="form-control" type="text" name="subtitle" id="subTitle" placeholder="Sub Title">
                    </div>

                    <div class="mb-3">
                        <label for="jumbotronImage" class="form-label">Upload Image</label>
                        <input class="form-control" type="file" name="image_url" id="jumbotronImage">
                    </div>

                    <button type="submit" class="btn btn-success">Add Jumbotron</button>
                </form>
            </div>

            <div class="card-header d-flex justify-content-between align-items-center">
                <h5><i class="fas fa-list me-1 mx-3"></i> Existing Jumbotron Items</h5>
                <button id="toggle-jumbos" class="btn btn-secondary btn-sm">Hide</button>
            </div>
            <div id="existing-jumbos" class="card-body">
                @if($jumbos->isEmpty())
                    <p class="text-muted">No Jumbotron items available.</p>
                @else
                    @foreach($jumbos as $jumbo)
                        <div class="form-check mb-3 p-3 border rounded shadow-sm d-flex align-items-center" style="background-color: #f9f9f9;">
                            <div class="w-100">
                                <form action="{{ route('update', $jumbo->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="jumbotronTitle{{ $jumbo->id }}" class="form-label">Title</label>
                                        <input class="form-control form-control-sm" type="text" name="title" id="jumbotronTitle{{ $jumbo->id }}" value="{{ $jumbo->title }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="jumbotronSubtitle{{ $jumbo->id }}" class="form-label">Subtitle</label>
                                        <input class="form-control form-control-sm" type="text" name="subtitle" id="jumbotronSubtitle{{ $jumbo->id }}" value="{{ $jumbo->subtitle }}">
                                    </div>

                                    <div class="mb-3 text-center">
                                        <img src="{{ asset('storage/' . $jumbo->image_url) }}" alt="Jumbotron Image" class="img-fluid rounded" style="max-width: 150px; height: auto; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">
                                    </div>

                                    <div class="mb-3">
                                        <label for="jumbotronImageReplace" class="form-label">Ganti Jumbotron</label>
                                        <input class="form-control" type="file" name="image_url" id="jumbotronImageReplace">
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    </div>
                                </form>

                                <form action="{{ route('delete', $jumbo->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        <!-- JavaScript untuk Hide/Show Existing Jumbotron -->
        <script>
            document.getElementById('toggle-jumbos').addEventListener('click', function () {
                var existingJumbos = document.getElementById('existing-jumbos');
                if (existingJumbos.style.display === 'none' || existingJumbos.style.display === '') {
                    existingJumbos.style.display = 'block';
                    this.textContent = 'Hide'; // Ubah teks tombol ke 'Hide'
                } else {
                    existingJumbos.style.display = 'none';
                    this.textContent = 'Show'; // Ubah teks tombol ke 'Show'
                }
            });
        </script>
        </div>

<!-- 2. About Us -->
<div class="card mb-4">

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

    <!-- Header Section -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5><i class="fas fa-info-circle me-1"></i> About Us</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title Input -->
            <div class="mb-3">
                <label for="aboutUsTitle" class="form-label"><i class="fas fa-heading me-1"></i> Title</label>
                <input class="form-control" type="text" name="title" id="aboutUsTitle" placeholder="Enter title..." required value="{{ old('title', $about->title ?? '') }}">
            </div>

            <!-- Subtitle Input -->
            <div class="mb-3">
                <label for="aboutUsSubtitle" class="form-label"><i class="fas fa-subscript me-1"></i> Subtitle</label>
                <input class="form-control" type="text" name="subtitle" id="aboutUsSubtitle" placeholder="Enter subtitle..." value="{{ old('subtitle', $about->subtitle ?? '') }}">
            </div>

            <!-- Image Upload -->
            <div class="mb-3">
                <label for="aboutUsImage" class="form-label"><i class="fas fa-upload me-1"></i> Upload Image</label>
                <input class="form-control" type="file" name="image_url" id="aboutUsImage">
            </div>

            <!-- Description Textarea -->
            <div class="mb-3">
                <label for="aboutUsText" class="form-label"><i class="fas fa-align-left me-1"></i> Description</label>
                <textarea class="form-control" name="text" id="aboutUsText" rows="5" placeholder="Write description..." required>{{ old('text', $about->text ?? '') }}</textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save me-1"></i> Save About Us
            </button>
        </form>

        <!-- Preview Section -->
        @if(isset($about))
            <div class="mt-4">
                <h2>Preview</h2>
                <h3>{{ $about->title }}</h3>
                @if($about->image_url)
                    <img src="{{ asset('storage/' . $about->image_url) }}" alt="About Us Image" class="img-fluid rounded mb-3" style="max-width: 150px; height: auto; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">
                @endif
                <h4 class="fw-normal">{{ $about->subtitle }}</h4>
                <p>{!! $about->text !!}</p>
                
                <!-- Delete Button -->
                <form action="{{ route('delete', $about->id) }}" method="POST" class="mt-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i> Delete About Us
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>

        <!-- 3. Our Works -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-briefcase me-1"></i>
                    Our Works
                </span>
                <button class="btn btn-danger btn-sm" onclick="deleteSelected('work')">Delete Selected</button>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="workCategory" class="form-label">Category</label>
                        <select class="form-select" id="workCategory">
                            <option selected>Choose category...</option>
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="workImage" class="form-label">Work Image</label>
                        <input class="form-control" type="file" id="workImage" onchange="previewImage(event, 'workPreview')">
                    </div>
                    <div id="workPreview" class="preview-container mb-3">
                        <h5>Preview:</h5>
                        <img src="" alt="Preview" style="max-width: 100%; height: auto; display: none;" />
                    </div>
                    <div class="mb-3">
                        <label for="workTitle" class="form-label">Work Title</label>
                        <input class="form-control" type="text" id="workTitle" value="Work Title Here">
                    </div>
                    <div class="mb-3">
                        <label for="workDescription" class="form-label">Work Description</label>
                        <textarea class="form-control" id="workDescription" rows="3">Description of the work here...</textarea>
                    </div>
                    <button type="button" class="btn btn-success" onclick="addWork()">Add</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <hr>
                <h5>Existing Work Items:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="work1" id="work1">
                    <label class="form-check-label" for="work1">Existing Work 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="work2" id="work2">
                    <label class="form-check-label" for="work2">Existing Work 2</label>
                </div>
            </div>
        </div>

        <!-- 4. Articles -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-newspaper me-1"></i>
                    Articles
                </span>
                <button class="btn btn-danger btn-sm" onclick="deleteSelected('article')">Delete Selected</button>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="articleTitle" class="form-label">Title</label>
                        <input class="form-control" type="text" id="articleTitle" value="Article Title Here">
                    </div>
                    <div class="mb-3">
                        <label for="articleImage" class="form-label">Article Image</label>
                        <input class="form-control" type="file" id="articleImage" onchange="previewImage(event, 'articlePreview')">
                    </div>
                    <div id="articlePreview" class="preview-container mb-3">
                        <h5>Preview:</h5>
                        <img src="" alt="Preview" style="max-width: 100%; height: auto; display: none;" />
                    </div>
                    <div class="mb-3">
                        <label for="articleText" class="form-label">Article Text</label>
                        <textarea class="form-control" id="articleText" rows="3">Content of the article goes here...</textarea>
                    </div>
                    <button type="button" class="btn btn-success" onclick="addArticle()">Add</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <hr>
                <h5>Existing Article Items:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="article1" id="article1">
                    <label class="form-check-label" for="article1">Existing Article 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="article2" id="article2">
                    <label class="form-check-label" for="article2">Existing Article 2</label>
                </div>
            </div>
        </div>

        <!-- 5. Meet Our Teams -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-users me-1"></i>
                    Meet Our Teams
                </span>
                <button class="btn btn-danger btn-sm" onclick="deleteSelected('team')">Delete Selected</button>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="teamName" class="form-label">Team Member Name</label>
                        <input class="form-control" type="text" id="teamName" value="Team Member Name Here">
                    </div>
                    <div class="mb-3">
                        <label for="teamRole" class="form-label">Role</label>
                        <input class="form-control" type="text" id="teamRole" value="Role Here">
                    </div>
                    <div class="mb-3">
                        <label for="teamImage" class="form-label">Team Image</label>
                        <input class="form-control" type="file" id="teamImage" onchange="previewImage(event, 'teamPreview')">
                    </div>
                    <div id="teamPreview" class="preview-container mb-3">
                        <h5>Preview:</h5>
                        <img src="" alt="Preview" style="max-width: 100%; height: auto; display: none;" />
                    </div>
                    <button type="button" class="btn btn-success" onclick="addTeamMember()">Add</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <hr>
                <h5>Existing Team Members:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="team1" id="team1">
                    <label class="form-check-label" for="team1">Existing Team Member 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="team2" id="team2">
                    <label class="form-check-label" for="team2">Existing Team Member 2</label>
                </div>
            </div>
        </div>

        <!-- 6. Questions -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-question-circle me-1"></i>
                    Questions
                </span>
                <button class="btn btn-danger btn-sm" onclick="deleteSelected('question')">Delete Selected</button>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="questionText" class="form-label">Question</label>
                        <input class="form-control" type="text" id="questionText" value="Question Here">
                    </div>
                    <button type="button" class="btn btn-success" onclick="addQuestion()">Add</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <hr>
                <h5>Existing Questions:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="question1" id="question1">
                    <label class="form-check-label" for="question1">Existing Question 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="question2" id="question2">
                    <label class="form-check-label" for="question2">Existing Question 2</label>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection


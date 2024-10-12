@extends('layouts.admin')

@section('title', 'Manage Agendas')

@section('content')
<main>
    <div class="container p-4">

        <!-- Live Preview Section -->
        <div class="card shadow-lg border-0 rounded mb-4">
            <div class="card-header bg-dark text-white text-center">
                <h2 class="mb-0 font-weight-bold">Live Preview</h2>
            </div>
            <div class="card-body p-4">
                <iframe id="livePreview" src="{{ route('agenda.show', 1) }}" width="100%" height="500px" style="border: none; border-radius: 10px;" class="shadow-sm"></iframe>
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
            
            <form id="createUpdateAgenda" action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="agenda_id">

                <!-- Title Input -->
                <div class="form-group mb-3">
                    <label for="title" class="form-label"><i class="fas fa-heading me-2"></i>Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required placeholder="Enter agenda title">
                </div>

                <!-- Image Upload -->
                <div class="form-group mb-3">
                    <label for="img_url" class="form-label"><i class="fas fa-image me-2"></i>Upload Image</label>
                    <input type="file" name="img_url" id="img_url" class="form-control">
                    <img id="current_image" src="" class="img-thumbnail mt-2" style="display:none;" width="100">
                </div>

                <!-- Date and Location -->
                <div class="form-group mb-3">
                    <label for="date" class="form-label"><i class="fas fa-calendar-alt me-2"></i>Date</label>
                    <input type="datetime-local" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="location" class="form-label"><i class="fas fa-map-marker-alt me-2"></i>Location</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" required placeholder="Enter agenda location">
                </div>

                <!-- Description Input -->
                <div class="form-group mb-3">
                    <label for="description" class="form-label"><i class="fas fa-align-left me-2"></i>Description</label>
                    <textarea name="description" id="description" class="form-control summernote mb-4" rows="5" required placeholder="Write your agenda description here...">{{ old('description') }}</textarea>
                </div>

                <!-- Status Selection -->
                <div class="form-group mb-3">
                    <label for="status" class="form-label"><i class="fas fa-info-circle me-2"></i>Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="upcoming" {{ old('status') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                        <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success" id="saveButton">
                    <i class="fas fa-save me-2"></i>Save Agenda
                </button>
                <button type="submit" class="btn btn-warning d-none" id="updateButton">
                    <i class="fas fa-edit me-2"></i>Update Agenda
                </button>
            </form>
        </div>

        <!-- Existing Agendas -->
        <div class="card shadow-lg mt-4">
            <div class="card-header bg-dark text-white">
                <h3><i class="fas fa-calendar-alt me-2"></i>Existing Agendas</h3>
            </div>
            <div class="card-body">
                <div class="row">
                @foreach($agendas as $agenda)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('storage/' . $agenda->img_url) }}" class="card-img-top" alt="{{ $agenda->title }}">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-calendar-check me-2"></i>{{ $agenda->title }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($agenda->description, 100, '...') }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <small class="text-muted">
                                    <i class="fas fa-clock me-1"></i> {{ \Carbon\Carbon::parse($agenda->date)->format('M d, Y H:i') }} <br>
                                    <i class="fas fa-map-marker-alt me-1"></i> {{ $agenda->location }} <br>
                                    <i class="fas fa-info-circle me-1"></i> Status: {{ ucfirst($agenda->status) }}
                                </small>
                                <hr>
                                <a href="javascript:void(0);" class="btn btn-secondary btn-sm" onclick="scrollToPreview({{ $agenda->id }});">
                                    <i class="fas fa-eye me-1"></i>View Agenda
                                </a>
                                <a href="javascript:void(0);" class="btn btn-warning btn-sm" onclick="scrollToForm(); populateForm({{ json_encode($agenda) }});">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('agenda.delete', $agenda->id) }}" method="POST" class="d-inline">
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
        const formSection = document.getElementById('createUpdateAgenda');
        formSection.scrollIntoView({ behavior: 'smooth' });
    }

    function scrollToPreview(agendaId) {
        const previewSection = document.getElementById('livePreview');
        previewSection.src = `{{ url('admin/agenda/show') }}/${agendaId}`;
        previewSection.scrollIntoView({ behavior: 'smooth' });
    }

    function populateForm(agenda) {
        document.getElementById('agenda_id').value = agenda.id;
        document.getElementById('title').value = agenda.title;
        document.getElementById('description').value = agenda.description.replace(/<br\s*\/?>/gi, '\n');
        document.getElementById('date').value = agenda.date.replace(' ', 'T');
        document.getElementById('location').value = agenda.location;
        document.getElementById('status').value = agenda.status;
        
        const currentImage = document.getElementById('current_image');
        if (agenda.img_url) {
            currentImage.src = `{{ asset('storage/') }}/${agenda.img_url}`;
            currentImage.style.display = 'block';
        } else {
            currentImage.style.display = 'none';
        }

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

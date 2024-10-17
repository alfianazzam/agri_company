@extends('layouts.admin')

@section('title', 'Manage Team Members')

@section('content')
<main>
    <div class="container p-4">

        <!-- Live Preview Section -->
        <div class="card shadow-lg border-0 rounded mb-4">
            <div class="card-header bg-dark text-white text-center">
                <h2 class="mb-0 font-weight-bold">Live Preview</h2>
            </div>
            <div class="card-body p-4">
                <iframe id="livePreview" src="{{ route('team.show', 1) }}" width="100%" height="500px" style="border: none; border-radius: 10px;" class="shadow-sm"></iframe>
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
            
            <form id="createUpdateTeamMember" action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="team_member_id">

                <!-- Name Input -->
                <div class="form-group mb-3">
                    <label for="name" class="form-label"><i class="fas fa-user me-2"></i>Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required placeholder="Enter team member name">
                </div>

                <!-- Role Input -->
                <div class="form-group mb-3">
                    <label for="role" class="form-label"><i class="fas fa-briefcase me-2"></i>Role</label>
                    <input type="text" name="role" id="role" class="form-control" value="{{ old('role') }}" required placeholder="Enter team member role">
                </div>

                <!-- Image Upload -->
                <div class="form-group mb-3">
                    <label for="image" class="form-label"><i class="fas fa-image me-2"></i>Upload Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <img id="current_image" src="" class="img-thumbnail mt-2" style="display:none;" width="100">
                </div>

                <!-- Description Input -->
                <div class="form-group mb-3">
                    <label for="description" class="form-label"><i class="fas fa-align-left me-2"></i>Description</label>
                    <textarea name="description" id="description" class="form-control summernote mb-4" rows="5" required placeholder="Write a description...">{{ old('description') }}</textarea>
                </div>

                <!-- Social Links Input -->
                <div class="form-group mb-3">
                    <label for="facebook" class="form-label"><i class="fab fa-facebook me-2"></i>Facebook</label>
                    <input type="text" name="social_links[facebook]" id="facebook" class="form-control" placeholder="Facebook URL" value="{{ old('social_links.facebook') }}">
                </div>
                <div class="form-group mb-3">
                    <label for="twitter" class="form-label"><i class="fab fa-twitter me-2"></i>Twitter</label>
                    <input type="text" name="social_links[twitter]" id="twitter" class="form-control" placeholder="Twitter URL" value="{{ old('social_links.twitter') }}">
                </div>
                <div class="form-group mb-3">
                    <label for="dribbble" class="form-label"><i class="fab fa-dribbble me-2"></i>Dribbble</label>
                    <input type="text" name="social_links[dribbble]" id="dribbble" class="form-control" placeholder="Dribbble URL" value="{{ old('social_links.dribbble') }}">
                </div>
                <div class="form-group mb-3">
                    <label for="skype" class="form-label"><i class="fab fa-skype me-2"></i>Skype</label>
                    <input type="text" name="social_links[skype]" id="skype" class="form-control" placeholder="Skype URL" value="{{ old('social_links.skype') }}">
                </div>
                <div class="form-group mb-3">
                    <label for="instagram" class="form-label"><i class="fab fa-instagram me-2"></i>Instagram</label>
                    <input type="text" name="social_links[instagram]" id="instagram" class="form-control" placeholder="instagram URL" value="{{ old('social_links.instagram') }}">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success" id="saveButton">
                    <i class="fas fa-save me-2"></i>Save Team Member
                </button>
                <button type="submit" class="btn btn-warning d-none" id="updateButton">
                    <i class="fas fa-edit me-2"></i>Update Team Member
                </button>
            </form>
        </div>

        <!-- Existing Team Members -->
        <div class="card shadow-lg mt-4">
            <div class="card-header bg-dark text-white">
                <h3><i class="fas fa-users me-2"></i>Existing Team Members</h3>
            </div>
            <div class="card-body">
                <div class="row">
                @foreach($teamMembers as $member)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('storage/' . $member->image) }}" class="card-img-top" alt="{{ $member->name }}">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-user me-2"></i>{{ $member->name }}</h5>
                                <!-- Limit description to 100 characters -->
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($member->description, 100, '...') }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <!-- Display social links -->
                                <small class="text-muted">
                                    @foreach(json_decode($member->social_links, true) as $link => $url)
                                        <i class="fab fa-{{ $link }}"></i> {{ $url }} <br>
                                    @endforeach
                                </small>
                                <hr>
                                <a href="javascript:void(0);" class="btn btn-secondary btn-sm" onclick="scrollToPreview({{ $member->id }});">
                                    <i class="fas fa-eye me-1"></i>View Team Member
                                </a>
                                <a href="javascript:void(0);" class="btn btn-warning btn-sm" onclick="scrollToForm(); populateForm({{ json_encode($member) }});">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('team.delete', $member->id) }}" method="POST" class="d-inline">
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
        const formSection = document.getElementById('createUpdateTeamMember');
        formSection.scrollIntoView({ behavior: 'smooth' });
    }

    function scrollToPreview(teamMemberId) {
        const previewSection = document.getElementById('livePreview');
        previewSection.src = `{{ url('admin/team-member/show') }}`;
        previewSection.scrollIntoView({ behavior: 'smooth' });
    }

    function populateForm(teamMember) {
        // Mengisi form dengan data dari objek teamMember
        document.getElementById('team_member_id').value = teamMember.id;
        document.getElementById('name').value = teamMember.name;
        document.getElementById('role').value = teamMember.role;
        document.getElementById('description').value = teamMember.description.replace(/<br\s*\/?>/gi, '\n');

        // Tampilkan gambar jika ada
        const currentImage = document.getElementById('current_image');
        if (teamMember.image) {
            currentImage.src = `{{ asset('storage/') }}/${teamMember.image}`;
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
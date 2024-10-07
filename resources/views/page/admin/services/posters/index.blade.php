@extends('layouts.admin')

@section('title', 'Page About')

@section('content')
<!-- 2. About Us -->
<main>
    <div class="container-fluid p-4">

        <!-- Live Preview Section -->
        <div class="card shadow-lg border-0 rounded mb-4">
            <div class="card-header bg-dark text-white text-center">
                <h2 class="mb-0 font-weight-bold">Live Preview</h2>
            </div>
            <div class="card-body p-4">
                <iframe src="{{ route('about.show') }}" width="100%" height="500px" style="border: none; border-radius: 10px;" class="shadow-sm" scrolling="no"></iframe>
            </div>
        </div>

        <!-- Form Section -->
        <div class="card shadow-lg border-0 rounded">
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
            <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i> About Us</h5>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Title Input -->
                    <div class="mb-4">
                        <label for="aboutUsTitle" class="form-label"><i class="fas fa-heading me-1"></i> Title</label>
                        <input class="form-control" type="text" name="title" id="aboutUsTitle" placeholder="Enter title..." required value="{{ old('title', $about->title ?? '') }}">
                    </div>

                    <!-- Subtitle Input -->
                    <div class="mb-4">
                        <label for="aboutUsSubtitle" class="form-label"><i class="fas fa-subscript me-1"></i> Subtitle</label>
                        <input class="form-control" type="text" name="subtitle" id="aboutUsSubtitle" placeholder="Enter subtitle..." value="{{ old('subtitle', $about->subtitle ?? '') }}">
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-4">
                        <label for="aboutUsImage" class="form-label"><i class="fas fa-upload me-1"></i> Upload Image</label>
                        <input class="form-control" type="file" name="image_url" id="aboutUsImage">
                    </div>

                    <!-- Summernote Textarea with Plugins -->
                    <div class="mb-4">
                        <label for="aboutUsText" class="form-label"><i class="fas fa-align-left me-1"></i> Description</label>
                        <textarea class="form-control summernote mb-3" name="text" id="aboutUsText" rows="5" placeholder="Write description..." required>{!! old('text', $about->text ?? '') !!}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success btn-block">
                        <i class="fas fa-save me-2"></i> Save and Update
                    </button>
                </form>

                <!-- Preview Section -->
                @if(isset($about))
                    <div class="mt-5">
                        <h2 class="fw-bold">Preview</h2>
                        <h3>{{ $about->title }}</h3>

                        @if($about->image_url)
                            <img src="{{ asset('storage/' . $about->image_url) }}" alt="About Us Image" class="img-fluid rounded mb-3" style="max-width: 150px; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">
                        @endif
                        
                        <h4 class="fw-normal">{{ $about->subtitle }}</h4>
                        <p class="mt-4">{!! $about->text !!}</p>

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
    </div>
</main>

<!-- Scripts Section -->
<script>
    $(document).ready(function() {
        $('#aboutUsText').summernote({
            height: 300,
            toolbar: [
                // Baris pertama: Style (Gaya teks)
                ['style', ['style']], // Mengganti heading/paragraph
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']], // Pilih font

                // Baris kedua: Format teks
                ['fontsize', ['fontsize']], // Ukuran font
                ['color', ['color']], // Warna font dan background
                ['font', ['strikethrough', 'superscript', 'subscript']],

                // Baris ketiga: Alignment dan daftar
                ['para', ['ul', 'ol', 'paragraph']], // Bullet, Number, Align
                ['height', ['height']], // Jarak antar baris

                // Baris keempat: Insertion (penyisipan)
                ['insert', ['picture', 'link', 'video', 'table', 'hr']], // Gambar, Link, Video, Tabel, Garis horizontal
                ['insert', ['specialcharacter']], // Karakter spesial

                // Baris kelima: Tampilan dan lain-lain
                ['view', ['fullscreen', 'codeview', 'help']] // Fullscreen, Code view, Help
            ],
        });
    });
</script>

@endsection

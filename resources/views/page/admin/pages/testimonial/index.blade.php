@extends('layouts.admin')

@section('title', 'Pages Testimonial')

@section('content')

<!-- 1. Testimonial -->
<main>
    <div class="container-fluid p-4">

        
        <div class="card shadow-lg border-0 rounded mb-4">
            <div class="card-header bg-black text-white text-center">
                <h2 class="mb-0 font-weight-bold">Live Preview</h2>
            </div>
            <div class="card-body p-4">
                <iframe src="{{ route('testimonial.show') }}" width="100%" height="500px" style="border: none; border-radius: 10px; overflow: hidden;" class="shadow-sm" scrolling="no"></iframe>
            </div>
        </div>
        
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
                <h5><i class="fas fa-image me-1"></i> Add Testimonial</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="testimonialImage" class="form-label">Upload Image</label>
                        <input class="form-control" type="file" name="jumbotron_image" id="testimonialImage">
                    </div>

                    <div class="mb-3">
                        <label for="quote" class="form-label">Quote</label>
                        <input class="form-control" type="text" name="quote" id="quote" placeholder="Quote">
                    </div>

                    <div class="mb-3">
                        <label for="writer" class="form-label">Writer</label>
                        <input class="form-control" type="text" name="writer" id="writer" placeholder="Writer">
                    </div>

                    <button type="submit" class="btn btn-success">Add Testimonial</button>
                </form>
            </div>

            <div class="card-header d-flex justify-content-between align-items-center">
                <h5><i class="fas fa-list me-1 mx-3"></i> Existing Testimonial Items</h5>
                <button id="toggle-testimonials" class="btn btn-secondary btn-sm">Hide</button>
            </div>
            <div id="existing-testimonials" class="card-body">
                @if($testimonials->isEmpty())
                    <p class="text-muted">No Testimonial items available.</p>
                @else
                    @foreach($testimonials as $testimonial)
                        <div class="form-check mb-3 p-3 border rounded shadow-sm d-flex align-items-center" style="background-color: #f9f9f9;">
                            <div class="w-100">
                                <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="testimonialImage{{ $testimonial->id }}" class="form-label">Upload Image</label>
                                        <input class="form-control" type="file" name="jumbotron_image" id="testimonialImage{{ $testimonial->id }}">
                                        @if($testimonial->jumbotron_image)

                                        <div class="text-center mt-3">
                                        <img src="{{ asset('storage/' . $testimonial->jumbotron_image) }}" alt="Jumbotron Image" class="img-fluid rounded" style="max-width: 150px; height: auto; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">

                                        @endif

                                    </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="quote{{ $testimonial->id }}" class="form-label">Quote</label>
                                        <input class="form-control" type="text" name="quote" id="quote{{ $testimonial->id }}" value="{{ $testimonial->quote }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="writer{{ $testimonial->id }}" class="form-label">Writer</label>
                                        <input class="form-control" type="text" name="writer" id="writer{{ $testimonial->id }}" value="{{ $testimonial->writer }}">
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    </div>
                                </form>

                                <form action="{{ route('testimonial.delete', $testimonial->id) }}" method="POST" class="mt-2">
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
        <!-- JavaScript untuk Hide/Show Existing Testimonial -->
        <script>
            document.getElementById('toggle-testimonials').addEventListener('click', function () {
                var existingTestimonials = document.getElementById('existing-testimonials');
                if (existingTestimonials.style.display === 'none' || existingTestimonials.style.display === '') {
                    existingTestimonials.style.display = 'block';
                    this.textContent = 'Hide'; // Ubah teks tombol ke 'Hide'
                } else {
                    existingTestimonials.style.display = 'none';
                    this.textContent = 'Show'; // Ubah teks tombol ke 'Show'
                }
            });
        </script>
        </div>
    </div>
</main>

@endsection
@extends('layouts.admin')

@section('title', 'Pages Jumbotron')

@section('content')

<!-- 1. Jumbotron -->
<main>
    <div class="container-fluid p-4">

        
        <div class="card shadow-lg border-0 rounded mb-4">
            <div class="card-header bg-black text-white text-center">
                <h2 class="mb-0 font-weight-bold">Live Preview</h2>
            </div>
            <div class="card-body p-4">
                <iframe src="{{ route('jumbotron.show') }}" width="100%" height="500px" style="border: none; border-radius: 10px; overflow: hidden;" class="shadow-sm" scrolling="no"></iframe>
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
    </div>
</main>

    @endsection
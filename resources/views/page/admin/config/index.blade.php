@extends('layouts.admin')

@section('title', 'Company Configuration')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Company Configuration</h2>

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

    <form action="{{ route('company.update') }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name" class="font-weight-bold">Company Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $company->name ?? '') }}" required>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="address" class="font-weight-bold">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $company->address ?? '') }}">
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="phone" class="font-weight-bold">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $company->phone ?? '') }}">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email" class="font-weight-bold">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $company->email ?? '') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="logo_url" class="font-weight-bold">Logo</label>
            <input type="file" name="logo_url" id="logo_url" class="form-control">
            @if(!empty($company->logo_url))
                <img src="{{ asset('storage/' . $company->logo_url) }}" alt="Company Logo" class="img-fluid mt-2" style="max-width: 200px;">
            @endif
            @error('logo_url')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description" class="font-weight-bold">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $company->description ?? '') }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <h3 class="mt-4">Social Media Links</h3>

        @php
            $socialMediaPlatforms = [
                'facebook' => 'Facebook',
                'instagram' => 'Instagram',
                'whatsapp' => 'WhatsApp',
                'linkedin' => 'LinkedIn',
                'twitter' => 'Twitter',
            ];
        @endphp

        @foreach($socialMediaPlatforms as $platform => $name)
            <div class="form-group mb-3">
                <div class="input-group">
                    <div class="input-group-prepend mx-3">
                        <span class="input-group-text"><i class="fab fa-{{ $platform }}"></i></span>
                    </div>
                    <input type="url" name="{{ $platform }}" id="{{ $platform }}" class="form-control" placeholder="{{ $name }} URL" value="{{ old($platform, $company->{$platform} ?? '') }}" style="padding: 10px;">
                </div>
            </div>
        @endforeach

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary btn-block">
                {{ isset($company) ? 'Update Company' : 'Save Company' }}
            </button>
        </div>
    </form>
</div>

@endsection

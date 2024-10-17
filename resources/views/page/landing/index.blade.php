@extends('layouts.app')

@section('title', 'Welcome Page')

@section('content')

    <div class="main">

        @include('components.features.index')

        @include('components.about.index')

        @include('components.ourworks.index')

        @include('components.cta.index')

        @include('components.poster.index')
        
        @include('components.testimonials.index')

        @include('components.teams.index')

        <hr class="divider-w">

        {{-- @include('components.ask.index') --}}

        @include('components.contact.index')

    </div>

@endsection

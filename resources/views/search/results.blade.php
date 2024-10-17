@extends('layouts.app')

@section('content')
<div class="module-small">
    <div class="container">
        <h1>Hasil Pencarian untuk: "{{ $query }}"</h1>
    
        <h2>Projects</h2>
        @if($projects->isEmpty())
            <p>Tidak ada hasil untuk Projects.</p>
        @else
            <ul>
                @foreach($projects as $project)
                    <li><a href="{{ route('project.detail', $project->id) }}">{{ $project->jumbotron_title }}</a></li>
                @endforeach
            </ul>
        @endif
    
        <h2>Galleries</h2>
        @if($galleries->isEmpty())
            <p>Tidak ada hasil untuk Galleries.</p>
        @else
            <ul>
                @foreach($galleries as $gallery)
                    <li><a href="{{ route('gallery.show', $gallery->id) }}">{{ $gallery->title }}</a></li>
                @endforeach
            </ul>
        @endif
    
        <h2>Posters</h2>
        @if($posters->isEmpty())
            <p>Tidak ada hasil untuk Posters.</p>
        @else
            <ul>
                @foreach($posters as $poster)
                    <li><a href="{{ route('poster.detail', $poster->id) }}">{{ $poster->title }}</a></li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
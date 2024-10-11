@extends('layouts.app')

@section('title', 'Pages Posters')

@section('content')
<section class="module-small">
    <div class="container">
        <div class="row post-masonry post-columns">
            @foreach($posters as $poster)
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="post">
                    <div class="post-thumbnail">
                        <a href="{{ route('poster', $poster->id) }}">
                            <img src="{{ asset('storage/' . $poster->img_url) }}" alt="Blog-post Thumbnail" class="img-fluid">
                        </a>
                    </div>
                    <div class="post-header font-alt">
                        <!-- Link ke halaman detail poster berdasarkan ID -->
                        <h2 class="post-title"><a href="{{ route('poster.detail', $poster->id) }}">{{ $poster->title }}</a></h2>
                        <div class="post-meta">
                            By&nbsp;<a href="#">{{ $poster->user->name }}</a>&nbsp;| 
                            {{ $poster->created_at->format('d M Y, H:i') }} | 3 Comments
                        </div>
                    </div>
                    <div class="post-entry">
                        <p>{!! Str::limit($poster->content, 100) !!}</p>
                    </div>
                    <div class="post-more">
                        <!-- Link 'Read more' ke halaman detail poster -->
                        <a class="more-link" href="{{ route('poster.detail', $poster->id) }}">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="pagination font-alt">
            {{ $posters->links('vendor.pagination.bootstrap-5') }} <!-- Menggunakan tampilan pagination kustom -->
        </div>
    </div>
</section>
@endsection

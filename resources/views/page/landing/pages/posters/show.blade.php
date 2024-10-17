@extends('layouts.app')

@section('title', 'Poster Detail')

@section('content')
<section class="module-small">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="post">
                    <div class="post-thumbnail">
                        <img src="{{ asset('storage/' . $poster->img_url) }}" alt="Blog Featured Image" class="img-fluid">
                    </div>
                    <div class="post-header font-alt">
                        <h1 class="post-title">{{ $poster->title }}</h1>
                        <div class="post-meta">
                            By <a href="#">{{ $poster->user->name }}</a> | {{ $poster->created_at->format('d M Y, H:i') }} |
                            <a href="#">{{ $poster->category->name ?? 'No category assigned' }}</a>
                        </div>
                    </div>
                    <div class="post-entry">
                        <p>{!! $poster->content !!}</p>
                    </div>
                    
                    <!-- Improved Tags Section -->
                    <div class="post-tags">
                        <h5>Tags:</h5>
                        <ul class="list-inline">
                            @if($poster->category && $poster->category->tags)
                                @foreach(json_decode($poster->category->tags) as $tag)
                                    <li class="list-inline-item">
                                        <a href="https://www.google.com/search?q={{ urlencode(trim($tag)) }}" target="_blank" class="badge badge-primary">
                                            {{ trim($tag) }}
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li>No tags available</li>
                            @endif
                        </ul>
                    </div>  
                </div>
            </div>

            <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
                <div class="widget">
                    <form role="form">
                        <div class="search-box">
                            <input class="form-control" type="text" placeholder="Search...">
                            <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="widget">
                    <h5 class="widget-title font-alt">Article Categories</h5>
                    <ul class="icon-list">
                        @foreach($categories as $category)
                            <li><a href="#">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

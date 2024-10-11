@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<div class="main">
    <section class="module-small">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Galleries</h2>
                    <div class="module-subtitle font-serif"></div>
                </div>
            </div>
        </div>

        <!-- Category Filter Section -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="filter font-alt" id="filters">
                        <li><a class="current wow fadeInUp" href="#" data-filter="*">All</a></li>
                        @foreach($categories as $category)
                            <li>
                                <a class="wow fadeInUp" href="#" data-filter=".{{ $category->name }}" data-wow-delay="0.2s">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Gallery Items Section -->
            <ul class="works-grid works-grid-gut works-grid-3 works-hover-d" id="works-grid">
                @foreach($galleries as $gallery)
                    <li class="work-item {{ $gallery->category->name }}">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a class="gallery" href="{{ asset('storage/' . $gallery->img_url) }}" title="Desc: {{ $gallery->description }}">
                                    <div class="work-image">
                                        <img src="{{ asset('storage/' . $gallery->img_url) }}" alt="{{ $gallery->title }}">
                                    </div>
                                    <div class="work-caption font-alt">
                                        <h3 class="work-title">{{ $gallery->title }}</h3>
                                        <div class="work-descr">{{ $gallery->category->name }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</div>
@endsection

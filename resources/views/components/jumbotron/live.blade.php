@extends('layouts.app')

@section('content')
<section class="home-section home-parallax home-fade home-full-height" id="home">
    <div class="hero-slider">
        <ul class="slides">
            @foreach ($jumbos as $jumbo)
                <li class="bg-dark-30 bg-dark @if($loop->first) active @endif" style="background-image:url('{{ asset('storage/' . $jumbo->image_url) }}');">
                    <div class="titan-caption">
                        <div class="caption-content">
                            <div class="font-alt mb-30 titan-title-size-1">{{ $jumbo->title }}</div>
                            <div class="font-alt mb-40 titan-title-size-4">{{ $jumbo->subtitle }}</div>
                            <a class="section-scroll btn btn-border-w btn-round" href="#about">Learn More</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection

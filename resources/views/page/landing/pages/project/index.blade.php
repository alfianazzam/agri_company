@extends('layouts.app')

@section('title', 'Project Details')

@section('content')

<div class="main">
    <!-- Project Header -->
    <section class="module bg-dark-60 portfolio-page-header" 
             data-background="{{ $project->jumbotron_image ? asset('storage/' . $project->jumbotron_image) : asset('assets/images/agro/agro_header_bg.jpg') }}" 
             style="background-image: url('{{ $project->jumbotron_image ? asset('storage/' . $project->jumbotron_image) : asset('assets/images/agro/agro_header_bg.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <!-- Project Title -->
                    <h2 class="module-title font-alt">{{ $project->jumbotron_title ?? 'Project Title' }}</h2>
                    
                    <!-- Project Subtitle -->
                    <div class="module-subtitle font-serif">{{ $project->jumbotron_subtitle ?? 'Project Subtitle' }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Gallery Slider -->
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="post-images-slider">
                        <ul class="slides">
                            @if(!empty($project->images))
                                @foreach ($project->images as $image)
                                    <li><img class="center-block" src="{{ asset('storage/' . $image) }}" alt="{{ $project->title }}"></li>
                                @endforeach
                            @else
                                <li><img class="center-block" src="{{ asset('assets/images/default-placeholder.png') }}" alt="No Image Available"></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Key Highlights (aligned with agro theme) -->
            <div class="row multi-columns-row">
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="alt-features-item">
                        <div class="alt-features-icon"><span class="icon-leaf"></span></div>
                        <h3 class="alt-features-title font-alt">Sustainable Farming</h3>
                        Focus on sustainable practices that protect the environment and yield better crops.
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="alt-features-item">
                        <div class="alt-features-icon"><span class="icon-wrench"></span></div>
                        <h3 class="alt-features-title font-alt">Modern Techniques</h3>
                        Utilizing modern technology to enhance agricultural productivity and efficiency.
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="alt-features-item">
                        <div class="alt-features-icon"><span class="icon-globe"></span></div>
                        <h3 class="alt-features-title font-alt">Global Outreach</h3>
                        Projects that expand to international markets, improving global food security.
                    </div>
                </div>
            </div>

            <hr class="divider-w mt-60 mb-60">

            <!-- Project Details -->
            <div class="row multi-columns-row">
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="work-details">
                        <h5 class="work-details-title font-alt">Project Details</h5>
                        <ul>
                            <li><strong>Client: </strong><span class="font-serif">{{ $project->client ?? 'Not Available' }}</span></li>
                            <li><strong>Date: </strong><span class="font-serif">{{ $project->date ?? 'Not Available' }}</span></li>
                            <li><strong>Location: </strong><span class="font-serif">{{ $project->location ?? 'Not Available' }}</span></li>
                            <li><strong>Category: </strong><span class="font-serif">{{ $project->category->name ?? 'Not Available' }}</span></li>
                            <li><strong>Website: </strong><span class="font-serif"><a href="{{ $project->website ?? '#' }}" target="_blank">{{ $project->website ?? 'Not Available' }}</a></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <p>{!! $project->text_content ?? 'Description not available.' !!}</p>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <p>Through collaboration and innovative solutions, this project has had a significant impact on improving agricultural processes, increasing efficiency, and promoting sustainability.</p>
                </div>
            </div>
        </div>
    </section>

    <hr class="divider-w">

    
</div>

@endsection

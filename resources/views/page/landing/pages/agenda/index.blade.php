@extends('layouts.app')

@section('title', 'Agenda')

@section('content')

<!-- Agenda Section -->
<section id="agenda" class="module-small bg-light">
    <div class="container">
        <!-- Section Title -->
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Upcoming Events & Agenda</h2>
                <div class="module-subtitle font-serif">
                    Explore our latest events, seminars, and activities.
                </div>
            </div>
        </div>
        
        <!-- Agenda Items -->
        <div class="row multi-columns-row post-columns">
            <!-- Example of a single agenda item -->
            @foreach($agendas as $agenda)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="post mb-4">
                    <div class="post-thumbnail">
                        <a href="{{ route('agenda', $agenda->id) }}">
                            <img src="{{ asset('storage/'.$agenda->img_url) }}" alt="{{ $agenda->title }}" />
                        </a>
                    </div>
                    <div class="post-header font-alt">
                        <h2 class="post-title">
                            <a href="{{ route('agenda', $agenda->id) }}">{{ $agenda->title }}</a>
                        </h2>
                        <div class="post-meta">
                            <span class="post-date">{{ \Carbon\Carbon::parse($agenda->date)->format('F j, Y') }}</span>
                            <span class="post-location">{{ $agenda->location }}</span>
                            <span class="post-status badge 
                                @if($agenda->status === 'upcoming') alert-warning 
                                @elseif($agenda->status === 'ongoing') alert-success 
                                @else alert-info 
                                @endif">
                                {{ ucfirst($agenda->status) }}
                            </span>
                        </div>
                    </div>
                    <div class="post-entry">
                        @if($agenda->description)
                            <!-- Batasi konten maksimal 100 kata -->
                            <p>{{ Str::limit(strip_tags($agenda->description), 100) }}</p>
                        @else
                            <!-- Jika konten kosong, beri ruang kosong agar tata letak tetap rapi -->
                            <p>No content available.</p>
                        @endif
                    </div>
                    
                    <div class="post-more">
                        <a href="{{ route('agenda.detail', $agenda->id) }}" class="more-link">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination font-alt">
            {{ $agendas->links('vendor.pagination.bootstrap-5') }} <!-- Menggunakan tampilan pagination kustom -->
        </div>
    </div>
</section>

@endsection

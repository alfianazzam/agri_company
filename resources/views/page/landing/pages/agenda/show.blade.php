@extends('layouts.app')

@section('title', $agenda->title)

@section('content')

<!-- Agenda Detail Section -->
<section id="agenda-detail" class="module-small bg-light">
    <div class="container">
        <div class="row">
            <!-- Agenda Image -->
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $agenda->img_url) }}" alt="{{ $agenda->title }}" class="img-fluid rounded shadow-sm mb-4">
            </div>

            <!-- Agenda Details -->
            <div class="col-md-6">
                <h2 class="font-alt mb-3">{{ $agenda->title }}</h2>

                <!-- Date, Location, Status -->
                <ul class="list-unstyled mb-4">
                    <li>
                        <i class="fas fa-calendar-alt me-2"></i> 
                        <strong>Date: </strong> {{ \Carbon\Carbon::parse($agenda->date)->format('F j, Y H:i') }}
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt me-2"></i> 
                        <strong>Location: </strong> {{ $agenda->location }}
                    </li>
                    <li>
                        <i class="fas fa-info-circle me-2"></i> 
                        <strong>Status: </strong> 
                        <span class="badge 
                            @if($agenda->status === 'upcoming') badge-warning 
                            @elseif($agenda->status === 'ongoing') badge-success 
                            @else badge-secondary 
                            @endif">
                            {{ ucfirst($agenda->status) }}
                        </span>
                    </li>
                </ul>

                <!-- Description -->
                <div class="mb-4">
                    <p class="lead">{{ $agenda->description }}</p>
                </div>

                <!-- Back Button -->
                <a href="{{ route('agenda') }}" class="btn btn-d btn-round">
                    <i class="fas fa-arrow-left me-2"></i>Back to Agendas
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

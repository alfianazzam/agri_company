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
                        <i class="icon-calendar me-2"></i> 
                        <strong>Date: </strong> {{ \Carbon\Carbon::parse($agenda->date)->format('F j, Y H:i') }}
                    </li>
                    <li>
                        <i class="icon-map-pin me-2"></i> 
                        <strong>Location: </strong> {{ $agenda->location }}
                    </li>
                    <li>
                        <i class="icon-lightbulb me-2"></i> 
                        <strong>Status: </strong> 
                        <span class="badge 
                            @if($agenda->status === 'upcoming') alert-warning 
                            @elseif($agenda->status === 'ongoing') alert-success  
                            @else alert-info  
                            @endif">
                            {{ ucfirst($agenda->status) }}
                        </span>
                    </li>
                </ul>

                <!-- Description -->
                <div class="mb-4">
                    <p>{{ (strip_tags($agenda->description)) }}</p>
                </div>

                <!-- Back Button -->
                <a href="{{ route('agenda') }}" class="btn btn-d btn-round">
                    <i class="bi bi-arrow-left me-2"></i>Back to Agendas
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

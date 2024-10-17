@extends('layouts.app')

@section('content')

<section class="module">
            <div class="container">
                <div class="row multi-columns-row">
                    @foreach ( $feature as $features)    
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="{{ $features->icon_class }}"></span></div>
                            <h3 class="features-title font-alt">{{ $features->title }}</h3>
                            <p>{{ $features->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

@endsection
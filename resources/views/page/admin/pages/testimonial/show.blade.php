@extends('layouts.app')

@section('content')
        @foreach ($testimonials as $testimonial )    
        <section class="module bg-dark-60 pt-0 pb-0 parallax-bg testimonial" data-background="{{ asset('storage/' . $testimonial->jumbotron_image) }}">
            <div class="testimonials-slider pt-140 pb-140">
                <ul class="slides">
                    <li>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="module-icon"><span class="icon-quote"></span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <blockquote class="testimonial-text font-alt">{{ $testimonial->quote }}
                                    </blockquote>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <div class="testimonial-author">
                                        <div class="testimonial-caption font-alt">
                                            <div class="testimonial-title">{{ $testimonial->writer }}</div>
                                            <div class="testimonial-descr">{{ $company->name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        @endforeach

@endsection
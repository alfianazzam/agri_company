@extends('layouts.app')

@section('content')
<section class="module pt-0 pb-0" id="about">
            <div class="row position-relative m-0">
                <div class="col-xs-12 col-md-6 side-image" data-background="{{ asset('storage/' . $about->image_url) }}"></div>
                <div class="col-xs-12 col-md-6 col-md-offset-6 side-image-text">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="module-title font-alt align-left">{{ $about->title }}</h2>
                            <div class="module-subtitle font-serif align-left">{{ $about->subtitle }}</div>
                            <p>{!! $about->text !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
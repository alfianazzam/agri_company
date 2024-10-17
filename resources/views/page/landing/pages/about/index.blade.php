@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="main">
        <section class="module bg-dark-60 about-page-header" data-background="{{ asset('storage/' . $about->image_url) }}" style="background-image: url('{{ asset('storage/' . $about->image_url) }}');">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">{{ $about->title }}</h2>
                <div class="module-subtitle font-serif">{{ $about->subtitle }}</div>
              </div>
            </div>
          </div>
        </section>

        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Our Expertise</h2>
                <div class="module-subtitle font-serif">From seed to harvest, our team provides leading-edge solutions to maximize yields and improve sustainability.</div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <h6 class="font-alt"><span class="icon-leaf"></span> Sustainable Farming</h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="85" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"><span class="font-alt" style="opacity: 1;">85%</span></div>
                </div>
                <h6 class="font-alt"><span class="icon-tree"></span> Agroforestry</h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="70" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"><span class="font-alt" style="opacity: 1;">70%</span></div>
                </div>
                <h6 class="font-alt"><span class="icon-harvest"></span> Crop Management</h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="90" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"><span class="font-alt" style="opacity: 1;">90%</span></div>
                </div>
                <h6 class="font-alt"><span class="icon-water"></span> Irrigation Systems</h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="75" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"><span class="font-alt" style="opacity: 1;">75%</span></div>
                </div>
              </div>

              <div class="col-sm-6">
                <h6 class="font-alt"><span class="icon-leaf"></span> Sustainable Farming</h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="85" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"><span class="font-alt" style="opacity: 1;">85%</span></div>
                </div>
                <h6 class="font-alt"><span class="icon-tree"></span> Agroforestry</h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="70" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"><span class="font-alt" style="opacity: 1;">70%</span></div>
                </div>
                <h6 class="font-alt"><span class="icon-harvest"></span> Crop Management</h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="90" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"><span class="font-alt" style="opacity: 1;">90%</span></div>
                </div>
                <h6 class="font-alt"><span class="icon-water"></span> Irrigation Systems</h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="75" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"><span class="font-alt" style="opacity: 1;">75%</span></div>
                </div>
              </div>
            </div>
          </div>
        </section>

        @include('components.about.index')

        @include('components.teams.index')

        <hr class="divider-w">
        
        @include('components.features.index')

        @include('components.contact.index')

</div>
@endsection

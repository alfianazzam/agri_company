@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="main">
        <section class="module bg-dark-60 about-page-header" data-background="assets/images/about_bg.jpg" style="background-image: url(&quot;assets/images/about_bg.jpg&quot;);">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">About</h2>
                <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
              </div>
            </div>
          </div>
        </section>
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Our skills</h2>
                <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <h6 class="font-alt"><span class="icon-tools-2"></span> Development
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="60" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="font-alt" style="opacity: 1;">60</span></div>
                </div>
                <h6 class="font-alt"><span class="icon-strategy"></span> Branding
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="80" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="font-alt" style="opacity: 1;">80</span></div>
                </div>
                <h6 class="font-alt"><span class="icon-target"></span> Marketing
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="50" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"><span class="font-alt" style="opacity: 1;">50</span></div>
                </div>
                <h6 class="font-alt"><span class="icon-camera"></span> Photography
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="90" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"><span class="font-alt" style="opacity: 1;">90</span></div>
                </div>
              </div>
              <div class="col-sm-6">
                <h6 class="font-alt"><span class="icon-tools-2"></span> Development
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="60" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="font-alt" style="opacity: 1;">60</span></div>
                </div>
                <h6 class="font-alt"><span class="icon-strategy"></span> Branding
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="80" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="font-alt" style="opacity: 1;">80</span></div>
                </div>
                <h6 class="font-alt"><span class="icon-target"></span> Marketing
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="50" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"><span class="font-alt" style="opacity: 1;">50</span></div>
                </div>
                <h6 class="font-alt"><span class="icon-camera"></span> Photography
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="90" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"><span class="font-alt" style="opacity: 1;">90</span></div>
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

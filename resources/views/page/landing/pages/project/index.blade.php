@extends('layouts.app')

@section('title', 'Project')

@section('content')

<div class="main">
        <section class="module bg-dark-60 portfolio-page-header" data-background="assets/images/portfolio/portfolio_header_bg.jpg" style="background-image: url(&quot;assets/images/portfolio/portfolio_header_bg.jpg&quot;);">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Portfolio Single</h2>
                <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
              </div>
            </div>
          </div>
        </section>
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="post-images-slider">
                  
                <div class="flex-viewport" style="overflow: hidden; position: relative; height: 567px;"><ul class="slides" style="width: 1000%; transition-duration: 0.6s; transform: translate3d(-1880px, 0px, 0px);"><li class="clone" aria-hidden="true" style="width: 940px; margin-right: 0px; float: left; display: block;"><img class="center-block" src="assets/images/work-4.jpg" alt="Slider Image" draggable="false"></li>
                    <li class="" data-thumb-alt="" style="width: 940px; margin-right: 0px; float: left; display: block;"><img class="center-block" src="assets/images/work-1.jpg" alt="Slider Image" draggable="false"></li>
                    <li data-thumb-alt="" style="width: 940px; margin-right: 0px; float: left; display: block;" class="flex-active-slide"><img class="center-block" src="assets/images/work-2.jpg" alt="Slider Image" draggable="false"></li>
                    <li data-thumb-alt="" style="width: 940px; margin-right: 0px; float: left; display: block;" class=""><img class="center-block" src="assets/images/work-4.jpg" alt="Slider Image" draggable="false"></li>
                  <li class="clone" aria-hidden="true" style="width: 940px; margin-right: 0px; float: left; display: block;"><img class="center-block" src="assets/images/work-1.jpg" alt="Slider Image" draggable="false"></li></ul></div><ol class="flex-control-nav flex-control-paging"><li><a href="#" class="">1</a></li><li><a href="#" class="flex-active">2</a></li><li><a href="#" class="">3</a></li></ol><ul class="flex-direction-nav"><li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li><li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li></ul></div>
              </div>
            </div>
            <div class="row multi-columns-row">
              <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="alt-features-item">
                  <div class="alt-features-icon"><span class="icon-tools-2"></span></div>
                  <h3 class="alt-features-title font-alt">Development</h3>A wonderful serenity has taken possession of my entire soul like these sweet mornings.
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="alt-features-item">
                  <div class="alt-features-icon"><span class="icon-tools"></span></div>
                  <h3 class="alt-features-title font-alt">Design</h3>A wonderful serenity has taken possession of my entire soul like these sweet mornings.
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="alt-features-item">
                  <div class="alt-features-icon"><span class="icon-camera"></span></div>
                  <h3 class="alt-features-title font-alt">Photography</h3>A wonderful serenity has taken possession of my entire soul like these sweet mornings.
                </div>
              </div>
            </div>
            <hr class="divider-w mt-60 mb-60">
            <div class="row multi-columns-row">
              <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="work-details">
                  <h5 class="work-details-title font-alt">Project Details</h5>
                  <p></p>
                  <ul>
                    <li><strong>Client: </strong><span class="font-serif"><a href="#" target="_blank">SomeCompany</a></span>
                    </li>
                    <li><strong>Date: </strong><span class="font-serif"><a href="#" target="_blank">23 November, 2015</a></span>
                    </li>
                    <li><strong>Online: </strong><span class="font-serif"><a href="#" target="_blank">www.example.com</a></span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-4">
                <p>The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators.</p>
                <p>Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.</p>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-4">
                <p>The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators.</p>
              </div>
            </div>
          </div>
        </section>
        <hr class="divider-w">
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Related Projects</h2>
              </div>
            </div>
            <ul class="works-grid works-grid-gut works-grid-3 works-hover-w" id="works-grid" style="position: relative; height: 194.211px;">
              <li class="work-item illustration webdesign" style="position: absolute; left: 0px; top: 0px;"><a href="portfolio_single_featured_slider2.html">
                  <div class="work-image"><img src="assets/images/portfolio/grid-portfolio1.jpg" alt="Portfolio Item"></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Corporate Identity</h3>
                    <div class="work-descr">Illustration</div>
                  </div></a></li>
              <li class="work-item marketing webdesign" style="position: absolute; left: 315px; top: 0px;"><a href="portfolio_single_featured_video1.html">
                  <div class="work-image"><img src="assets/images/portfolio/grid-portfolio6.jpg" alt="Portfolio Item"></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Paper clip</h3>
                    <div class="work-descr">Marketing</div>
                  </div></a></li>
              <li class="work-item illustration webdesign" style="position: absolute; left: 630px; top: 0px;"><a href="portfolio_single_featured_image2.html">
                  <div class="work-image"><img src="assets/images/portfolio/grid-portfolio8.jpg" alt="Portfolio Item"></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Branding</h3>
                    <div class="work-descr">Illustration</div>
                  </div></a></li>
            </ul>
          </div>
        </section>
      </div>

      @endsection
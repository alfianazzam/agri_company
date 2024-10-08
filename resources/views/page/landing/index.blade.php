@extends('layouts.app')

@section('title', 'Welcome Page')

@section('content')

    <div class="main">
        <section class="module">
            <div class="container">
                <div class="row multi-columns-row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="icon-lightbulb"></span></div>
                            <h3 class="features-title font-alt">Ideas and concepts</h3>
                            <p>Careful attention to detail and clean, well structured code ensures a smooth user experience
                                for all your visitors.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="icon-bike"></span></div>
                            <h3 class="features-title font-alt">Optimised for speed</h3>
                            <p>Careful attention to detail and clean, well structured code ensures a smooth user experience
                                for all your visitors.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="icon-tools"></span></div>
                            <h3 class="features-title font-alt">Designs &amp; interfaces</h3>
                            <p>Careful attention to detail and clean, well structured code ensures a smooth user experience
                                for all your visitors.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="icon-gears"></span></div>
                            <h3 class="features-title font-alt">Highly customizable</h3>
                            <p>Careful attention to detail and clean, well structured code ensures a smooth user experience
                                for all your visitors.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="icon-tools-2"></span></div>
                            <h3 class="features-title font-alt">Coding &amp; development</h3>
                            <p>Careful attention to detail and clean, well structured code ensures a smooth user experience
                                for all your visitors.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="icon-genius"></span></div>
                            <h3 class="features-title font-alt">Features &amp; plugins</h3>
                            <p>Careful attention to detail and clean, well structured code ensures a smooth user experience
                                for all your visitors.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="icon-mobile"></span></div>
                            <h3 class="features-title font-alt">Responsive design</h3>
                            <p>Careful attention to detail and clean, well structured code ensures a smooth user experience
                                for all your visitors.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="icon-lifesaver"></span></div>
                            <h3 class="features-title font-alt">Dedicated support</h3>
                            <p>Careful attention to detail and clean, well structured code ensures a smooth user experience
                                for all your visitors.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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

        <section class="module pb-0" id="works">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h2 class="module-title font-alt">Our Works</h2>
                        <div class="module-subtitle font-serif"></div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="filter font-alt" id="filters">
                            <li><a class="current wow fadeInUp" href="#" data-filter="*">All</a></li>
                            <li><a class="wow fadeInUp" href="#" data-filter=".illustration"
                                    data-wow-delay="0.2s">Illustration</a></li>
                            <li><a class="wow fadeInUp" href="#" data-filter=".marketing"
                                    data-wow-delay="0.4s">Marketing</a></li>
                            <li><a class="wow fadeInUp" href="#" data-filter=".photography"
                                    data-wow-delay="0.6s">Photography</a></li>
                            <li><a class="wow fadeInUp" href="#" data-filter=".webdesign" data-wow-delay="0.6s">Web
                                    Design</a></li>
                        </ul>
                    </div>
                </div>
                <ul class="works-grid works-grid-gut works-grid-3 works-hover-d" id="works-grid">
                    <li class="work-item illustration webdesign"><a href="portfolio_single_featured_image1.html">
                            <div class="work-image"><img src="assets/images/post-1.jpg" alt="Portfolio Item" /></div>
                            <div class="work-caption font-alt">
                                <h3 class="work-title">Corporate Identity</h3>
                                <div class="work-descr">Illustration</div>
                            </div>
                        </a></li>
                    <li class="work-item marketing photography"><a href="portfolio_single_featured_image2.html">
                            <div class="work-image"><img src="assets/images/post-2.jpg" alt="Portfolio Item" /></div>
                            <div class="work-caption font-alt">
                                <h3 class="work-title">Bag MockUp</h3>
                                <div class="work-descr">Marketing</div>
                            </div>
                        </a></li>
                    <li class="work-item illustration photography"><a href="portfolio_single_featured_slider1.html">
                            <div class="work-image"><img src="assets/images/post-3.jpg" alt="Portfolio Item" /></div>
                            <div class="work-caption font-alt">
                                <h3 class="work-title">Disk Cover</h3>
                                <div class="work-descr">Illustration</div>
                            </div>
                        </a></li>
                    <li class="work-item marketing photography"><a href="portfolio_single_featured_slider2.htmll">
                            <div class="work-image"><img src="assets/images/work-1.jpg" alt="Portfolio Item" /></div>
                            <div class="work-caption font-alt">
                                <h3 class="work-title">Business Card</h3>
                                <div class="work-descr">Photography</div>
                            </div>
                        </a></li>
                    <li class="work-item illustration webdesign"><a href="portfolio_single_featured_video1.html">
                            <div class="work-image"><img src="assets/images/work-5.jpg" alt="Portfolio Item" /></div>
                            <div class="work-caption font-alt">
                                <h3 class="work-title">Web Design</h3>
                                <div class="work-descr">Webdesign</div>
                            </div>
                        </a></li>
                    <li class="work-item marketing webdesign"><a href="portfolio_single_featured_video2.html">
                            <div class="work-image"><img src="assets/images/work-6.jpg" alt="Portfolio Item" /></div>
                            <div class="work-caption font-alt">
                                <h3 class="work-title">Paper clip</h3>
                                <div class="work-descr">Marketing</div>
                            </div>
                        </a></li>
                </ul>
            </div>
        </section>
        <section class="module-small bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">
                        <div class="callout-text font-alt">
                            <h3 class="callout-title">Want to see more works?</h3>
                            <p>We are always open to interesting projects.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-2">
                        <div class="callout-btn-box"><a class="btn btn-w btn-round"
                                href="portfolio_boxed_gutter_col_3.html">Lets view portfolio</a></div>
                    </div>
                </div>
            </div>
        </section>


        <section class="module">
          <div class="container">
            <div class="row post-masonry post-columns" style="position: relative; height: 2885.95px;">
              <div class="col-sm-6 col-md-3 col-lg-3" style="position: absolute; left: 0px; top: 0px;">
                <div class="post">
                  <div class="post-thumbnail"><a href="#"><img src="assets/images/post-2.jpg" alt="Blog-post Thumbnail"></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a href="#">Our trip to the Alps</a></h2>
                    <div class="post-meta">By&nbsp;<a href="#">Mark Stone</a>&nbsp;| 23 November | 3 Comments
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  </div>
                  <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3" style="position: absolute; left: 375px; top: 0px;">
                <div class="post">
                  <div class="post-thumbnail"><a href="#"><img src="assets/images/post-3.jpg" alt="Blog-post Thumbnail"></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a href="#">Shore after the tide</a></h2>
                    <div class="post-meta">By&nbsp;<a href="#">Andy River</a>&nbsp;| 11 November | 4 Comments
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  </div>
                  <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3" style="position: absolute; left: 0px; top: 440px;">
                <div class="post">
                  <div class="post-thumbnail"><a href="#"><img src="assets/images/post-1.jpg" alt="Blog-post Thumbnail"></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a href="#">We in New Zealand</a></h2>
                    <div class="post-meta">By&nbsp;<a href="#">Dylan Woods</a>&nbsp;| 5 November | 15 Comments
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  </div>
                  <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3" style="position: absolute; left: 375px; top: 501px;">
                <div class="post">
                  <div class="post-thumbnail"><a href="#"><img src="assets/images/post-3.jpg" alt="Blog-post Thumbnail"></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a href="#">Clock</a></h2>
                    <div class="post-meta">By&nbsp;<a href="#">Andy River</a>&nbsp;| 11 November | 4 Comments
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  </div>
                  <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3" style="position: absolute; left: 0px; top: 941px;">
                <div class="post">
                  <div class="post-thumbnail"><a href="#"><img src="assets/images/post-1.jpg" alt="Blog-post Thumbnail"></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a href="#">Lighthouse to the shore</a></h2>
                    <div class="post-meta">By&nbsp;<a href="#">Dylan Woods</a>&nbsp;| 5 November | 15 Comments
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  </div>
                  <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3" style="position: absolute; left: 375px; top: 941px;">
                <div class="post">
                  <div class="post-thumbnail"><a href="#"><img src="assets/images/post-2.jpg" alt="Blog-post Thumbnail"></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a href="#">Plane in the field</a></h2>
                    <div class="post-meta">By&nbsp;<a href="#">Mark Stone</a>&nbsp;| 23 November | 3 Comments
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  </div>
                  <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3" style="position: absolute; left: 0px; top: 1382px;">
                <div class="post">
                  <div class="post-thumbnail"><a href="#"><img src="assets/images/post-3.jpg" alt="Blog-post Thumbnail"></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a href="#">Our trip to the Alps</a></h2>
                    <div class="post-meta">By&nbsp;<a href="#">Mark Stone</a>&nbsp;| 23 November | 3 Comments
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  </div>
                  <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3" style="position: absolute; left: 375px; top: 1442px;">
                <div class="post">
                  <div class="post-thumbnail"><a href="#"><img src="assets/images/post-1.jpg" alt="Blog-post Thumbnail"></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a href="#">Shore after the tide</a></h2>
                    <div class="post-meta">By&nbsp;<a href="#">Andy River</a>&nbsp;| 11 November | 4 Comments
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  </div>
                  <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3" style="position: absolute; left: 0px; top: 1823px;">
                <div class="post">
                  <div class="post-thumbnail"><a href="#"><img src="assets/images/post-3.jpg" alt="Blog-post Thumbnail"></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a href="#">We in New Zealand</a></h2>
                    <div class="post-meta">By&nbsp;<a href="#">Dylan Woods</a>&nbsp;| 5 November | 15 Comments
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  </div>
                  <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3" style="position: absolute; left: 375px; top: 1944px;">
                <div class="post">
                  <div class="post-thumbnail"><a href="#"><img src="assets/images/post-1.jpg" alt="Blog-post Thumbnail"></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a href="#">Plane in the field</a></h2>
                    <div class="post-meta">By&nbsp;<a href="#">Mark Stone</a>&nbsp;| 23 November | 3 Comments
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  </div>
                  <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3" style="position: absolute; left: 0px; top: 2324px;">
                <div class="post">
                  <div class="post-thumbnail"><a href="#"><img src="assets/images/post-2.jpg" alt="Blog-post Thumbnail"></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a href="#">Clock</a></h2>
                    <div class="post-meta">By&nbsp;<a href="#">Andy River</a>&nbsp;| 11 November | 4 Comments
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  </div>
                  <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3" style="position: absolute; left: 375px; top: 2445px;">
                <div class="post">
                  <div class="post-thumbnail"><a href="#"><img src="assets/images/post-3.jpg" alt="Blog-post Thumbnail"></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a href="#">Lighthouse to the shore</a></h2>
                    <div class="post-meta">By&nbsp;<a href="#">Dylan Woods</a>&nbsp;| 5 November | 15 Comments
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  </div>
                  <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                </div>
              </div>
            </div>
            <div class="pagination font-alt"><a href="#"><i class="fa fa-angle-left"></i></a><a class="active" href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#"><i class="fa fa-angle-right"></i></a></div>
          </div>
        </section>
        
        <section class="module" id="team">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h2 class="module-title font-alt">Meet Our Team</h2>
                        <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my
                            entire soul, like these sweet mornings of spring which I enjoy with my whole heart.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-sm-20 wow fadeInUp col-md-4 col-sm-6 col-xs-12" onclick="wow fadeInUp">
                        <div class="team-item">
                            <div class="team-image"><img src="assets/images/team-3.jpg" alt="Member Photo" />
                                <div class="team-detail">
                                    <h5 class="font-alt">Hi all</h5>
                                    <p class="font-serif">Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                        lacus, a&amp;nbsp;iaculis diam.</p>
                                    <div class="team-social"><a href="#"><i class="fa fa-facebook"></i></a><a
                                            href="#"><i class="fa fa-twitter"></i></a><a href="#"><i
                                                class="fa fa-dribbble"></i></a><a href="#"><i
                                                class="fa fa-skype"></i></a></div>
                                </div>
                            </div>
                            <div class="team-descr font-alt">
                                <div class="team-name">Jim Stone</div>
                                <div class="team-role">Art Director</div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-sm-20 wow fadeInUp col-md-4 col-sm-6 col-xs-12" onclick="wow fadeInUp">
                        <div class="team-item">
                            <div class="team-image"><img src="assets/images/team-2.jpg" alt="Member Photo" />
                                <div class="team-detail">
                                    <h5 class="font-alt">Good day</h5>
                                    <p class="font-serif">Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                        lacus, a&amp;nbsp;iaculis diam.</p>
                                    <div class="team-social"><a href="#"><i class="fa fa-facebook"></i></a><a
                                            href="#"><i class="fa fa-twitter"></i></a><a href="#"><i
                                                class="fa fa-dribbble"></i></a><a href="#"><i
                                                class="fa fa-skype"></i></a></div>
                                </div>
                            </div>
                            <div class="team-descr font-alt">
                                <div class="team-name">Andy River</div>
                                <div class="team-role">Creative director</div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-sm-20 wow fadeInUp col-md-4 col-sm-6 col-xs-12" onclick="wow fadeInUp">
                        <div class="team-item">
                            <div class="team-image"><img src="assets/images/team-4.jpg" alt="Member Photo" />
                                <div class="team-detail">
                                    <h5 class="font-alt">Yes, it's me</h5>
                                    <p class="font-serif">Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                        lacus, a&amp;nbsp;iaculis diam.</p>
                                    <div class="team-social"><a href="#"><i class="fa fa-facebook"></i></a><a
                                            href="#"><i class="fa fa-twitter"></i></a><a href="#"><i
                                                class="fa fa-dribbble"></i></a><a href="#"><i
                                                class="fa fa-skype"></i></a></div>
                                </div>
                            </div>
                            <div class="team-descr font-alt">
                                <div class="team-name">Dylan Woods</div>
                                <div class="team-role">Developer</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr class="divider-w">
        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="font-alt mb-30">Frequently Asked Questions</h4>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title font-alt"><a data-toggle="collapse" data-parent="#accordion"
                                            href="#support1">Support Question 1</a></h4>
                                </div>
                                <div class="panel-collapse collapse in" id="support1">
                                    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high
                                        life accusamus terry richardson ad squid. 3 wolf moon officia aute, non
                                        cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                        single-origin coffee nulla assumenda shoreditch et.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse"
                                            data-parent="#accordion" href="#support2">Support Question 2</a></h4>
                                </div>
                                <div class="panel-collapse collapse" id="support2">
                                    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high
                                        life accusamus terry richardson ad squid. 3 wolf moon officia aute, non
                                        cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                        single-origin coffee nulla assumenda shoreditch et.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse"
                                            data-parent="#accordion" href="#support3">Support Question 3</a></h4>
                                </div>
                                <div class="panel-collapse collapse" id="support3">
                                    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high
                                        life accusamus terry richardson ad squid. 3 wolf moon officia aute, non
                                        cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                        single-origin coffee nulla assumenda shoreditch et.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse"
                                            data-parent="#accordion" href="#support4">Support Question 4</a></h4>
                                </div>
                                <div class="panel-collapse collapse" id="support4">
                                    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high
                                        life accusamus terry richardson ad squid. 3 wolf moon officia aute, non
                                        cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                        single-origin coffee nulla assumenda shoreditch et.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="font-alt mb-30">Our Expertises</h4>
                        <h6 class="font-alt"><span class="icon-tools-2"></span> Development
                        </h6>
                        <div class="progress">
                            <div class="progress-bar pb-dark" aria-valuenow="60" role="progressbar" aria-valuemin="0"
                                aria-valuemax="100"><span class="font-alt"></span></div>
                        </div>
                        <h6 class="font-alt"><span class="icon-strategy"></span> Branding
                        </h6>
                        <div class="progress">
                            <div class="progress-bar pb-dark" aria-valuenow="80" role="progressbar" aria-valuemin="0"
                                aria-valuemax="100"><span class="font-alt"></span></div>
                        </div>
                        <h6 class="font-alt"><span class="icon-target"></span> Marketing
                        </h6>
                        <div class="progress">
                            <div class="progress-bar pb-dark" aria-valuenow="50" role="progressbar" aria-valuemin="0"
                                aria-valuemax="100"><span class="font-alt"></span></div>
                        </div>
                        <h6 class="font-alt"><span class="icon-camera"></span> Photography
                        </h6>
                        <div class="progress">
                            <div class="progress-bar pb-dark" aria-valuenow="90" role="progressbar" aria-valuemin="0"
                                aria-valuemax="100"><span class="font-alt"></span></div>
                        </div>
                        <h6 class="font-alt"><span class="icon-pencil"></span> Designing
                        </h6>
                        <div class="progress">
                            <div class="progress-bar pb-dark" aria-valuenow="70" role="progressbar" aria-valuemin="0"
                                aria-valuemax="100"><span class="font-alt"></span></div>
                        </div>
                        <h6 class="font-alt"><span class="icon-lifesaver"></span> Dedication
                        </h6>
                        <div class="progress">
                            <div class="progress-bar pb-dark" aria-valuenow="100" role="progressbar" aria-valuemin="0"
                                aria-valuemax="100"><span class="font-alt"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="module bg-dark-60 pt-0 pb-0 parallax-bg testimonial" data-background="assets/images/image6.jpg">
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
                                    <blockquote class="testimonial-text font-alt">I am alone, and feel the charm of
                                        existence in this spot, which was created for the bliss of souls like mine.
                                    </blockquote>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <div class="testimonial-author">
                                        <div class="testimonial-caption font-alt">
                                            <div class="testimonial-title">Jack Woods</div>
                                            <div class="testimonial-descr">SomeCompany INC, CEO</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="module-icon"><span class="icon-quote"></span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <blockquote class="testimonial-text font-alt">I should be incapable of drawing
                                        a single stroke at the present moment; and yet I feel that I never was a
                                        greater artist than now.</blockquote>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <div class="testimonial-author">
                                        <div class="testimonial-caption font-alt">
                                            <div class="testimonial-title">Jim Stone</div>
                                            <div class="testimonial-descr">SomeCompany INC, CEO</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="module-icon"><span class="icon-quote"></span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <blockquote class="testimonial-text font-alt">I am so happy, my dear friend, so
                                        absorbed in the exquisite sense of mere tranquil existence, that I neglect
                                        my talents.</blockquote>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <div class="testimonial-author">
                                        <div class="testimonial-caption font-alt">
                                            <div class="testimonial-title">Adele Snow</div>
                                            <div class="testimonial-descr">SomeCompany INC, CEO</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <section class="module" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h2 class="module-title font-alt">Contact us</h2>
                        <div class="module-subtitle font-serif"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <form id="contactForm" role="form" method="post" action="php/contact.php">
                            <div class="form-group">
                                <label class="sr-only" for="name">Name</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    placeholder="Your Name*" required="required"
                                    data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <input class="form-control" type="email" id="email" name="email"
                                    placeholder="Your Email*" required="required"
                                    data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="7" id="message" name="message" placeholder="Your Message*"
                                    required="required" data-validation-required-message="Please enter your message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-block btn-round btn-d" id="cfsubmit"
                                    type="submit">Submit</button>
                            </div>
                        </form>
                        <div class="ajax-response font-alt" id="contactFormResponse"></div>
                    </div>
                    <div class="col-sm-4">
                        <div class="alt-features-item mt-0">
                            <div class="alt-features-icon"><span class="icon-megaphone"></span></div>
                            <h3 class="alt-features-title font-alt">Where to meet</h3>Agro Kreatif Company<br />23 Greate
                            Street<br />Purwakarta, 12345 LS
                        </div>
                        <div class="alt-features-item mt-xs-60">
                            <div class="alt-features-icon"><span class="icon-map"></span></div>
                            <h3 class="alt-features-title font-alt">Say Hello</h3>Email:
                            agrokreatif@example.com<br />Phone: +021 872 635
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@extends('layouts.app')

@section('title', 'Post Detail')

@section('content')
<section class="module-small">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="post">
                    <div class="post-thumbnail">
                        <img src="assets/images/post-1.jpg" alt="Blog Featured Image" class="img-fluid">
                    </div>
                    <div class="post-header font-alt">
                        <h1 class="post-title">Our Trip to the Alps</h1>
                        <div class="post-meta">
                            By <a href="#">Mark Stone</a> | 23 November | 3 Comments | 
                            <a href="#">Photography</a>, 
                            <a href="#">Web Design</a>
                        </div>
                    </div>
                    <div class="post-entry">
                        <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>
                        <p>Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation, and more common words.</p>
                        <blockquote>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </blockquote>
                        <p>If several languages coalesce, the grammar of the resulting language is simpler and more regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental.</p>
                        <ul>
                            <li>The European languages are members of the same family.</li>
                            <li>Their separate existence is a myth.</li>
                            <li>For science, music, sport, etc, Europe uses the same vocabulary.</li>
                        </ul>
                        <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>
                    </div>
                </div>

                <div class="comments mt-4">
                    <h4 class="comment-title font-alt">There are 3 comments</h4>
                    <div class="comment clearfix">
                        <div class="comment-avatar">
                            <img src="assets/images/team-2.jpg" alt="avatar" class="rounded-circle">
                        </div>
                        <div class="comment-content">
                            <div class="comment-author font-alt"><a href="#">John Doe</a></div>
                            <div class="comment-body">
                                <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.</p>
                            </div>
                            <div class="comment-meta font-alt">Today, 14:55 - <a href="#">Reply</a></div>
                        </div>
                    </div>

                    <div class="comment clearfix">
                        <div class="comment-avatar">
                            <img src="assets/images/team-3.jpg" alt="avatar" class="rounded-circle">
                        </div>
                        <div class="comment-content">
                            <div class="comment-author font-alt"><a href="#">Mark Stone</a></div>
                            <div class="comment-body">
                                <p>Europe uses the same vocabulary. The European languages are members of the same family. Their separate existence is a myth.</p>
                            </div>
                            <div class="comment-meta font-alt">Today, 15:34 - <a href="#">Reply</a></div>
                        </div>
                    </div>

                    <div class="comment clearfix">
                        <div class="comment-avatar">
                            <img src="assets/images/team-4.jpg" alt="avatar" class="rounded-circle">
                        </div>
                        <div class="comment-content">
                            <div class="comment-author font-alt"><a href="#">Andy</a></div>
                            <div class="comment-body">
                                <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.</p>
                            </div>
                            <div class="comment-meta font-alt">Today, 14:59 - <a href="#">Reply</a></div>
                        </div>
                    </div>
                </div>

                <div class="comment-form mt-4">
                    <h4 class="comment-form-title font-alt">Add Your Comment</h4>
                    <form method="post">
                        <div class="form-group">
                            <label class="sr-only" for="name">Name</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="email">E-mail</label>
                            <input class="form-control" id="email" type="email" name="email" placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Comment" required></textarea>
                        </div>
                        <button class="btn btn-round btn-d" type="submit">Post Comment</button>
                    </form>
                </div>
            </div>

            <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
                <div class="widget">
                    <form role="form">
                        <div class="search-box">
                            <input class="form-control" type="text" placeholder="Search...">
                            <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="widget">
                    <h5 class="widget-title font-alt">Blog Categories</h5>
                    <ul class="icon-list">
                        <li><a href="#">Photography - 7</a></li>
                        <li><a href="#">Web Design - 3</a></li>
                        <li><a href="#">Illustration - 12</a></li>
                        <li><a href="#">Marketing - 1</a></li>
                        <li><a href="#">WordPress - 16</a></li>
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widget-title font-alt">Popular Posts</h5>
                    <ul class="widget-posts">
                        <li class="clearfix">
                            <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-1.jpg" alt="Post Thumbnail"></a></div>
                            <div class="widget-posts-body">
                                <div class="widget-posts-title"><a href="#">Designer Desk Essentials</a></div>
                                <div class="widget-posts-meta">23 January</div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-2.jpg" alt="Post Thumbnail"></a></div>
                            <div class="widget-posts-body">
                                <div class="widget-posts-title"><a href="#">Realistic Business Card Mockup</a></div>
                                <div class="widget-posts-meta">15 February</div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-1.jpg" alt="Post Thumbnail"></a></div>
                            <div class="widget-posts-body">
                                <div class="widget-posts-title"><a href="#">Eco Bag Mockup</a></div>
                                <div class="widget-posts-meta">21 February</div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-2.jpg" alt="Post Thumbnail"></a></div>
                            <div class="widget-posts-body">
                                <div class="widget-posts-title"><a href="#">Bottle Mockup</a></div>
                                <div class="widget-posts-meta">2 March</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widget-title font-alt">Tags</h5>
                    <div class="tags font-serif">
                        <a href="#" rel="tag">Blog</a>
                        <a href="#" rel="tag">Photo</a>
                        <a href="#" rel="tag">Video</a>
                        <a href="#" rel="tag">Image</a>
                        <a href="#" rel="tag">Minimal</a>
                        <a href="#" rel="tag">Post</a>
                        <a href="#" rel="tag">Theme</a>
                        <a href="#" rel="tag">Ideas</a>
                        <a href="#" rel="tag">Tags</a>
                        <a href="#" rel="tag">Bootstrap</a>
                        <a href="#" rel="tag">Popular</a>
                        <a href="#" rel="tag">English</a>
                    </div>
                </div>
                <div class="widget">
                    <h5 class="widget-title font-alt">Text</h5>
                    <p>The languages only differ in their grammar, their pronunciation, and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators.</p>
                </div>
                <div class="widget">
                    <h5 class="widget-title font-alt">Recent Comments</h5>
                    <ul class="icon-list">
                        <li>Maria on <a href="#">Designer Desk Essentials</a></li>
                        <li>John on <a href="#">Realistic Business Card Mockup</a></li>
                        <li>Andy on <a href="#">Eco Bag Mockup</a></li>
                        <li>Jack on <a href="#">Bottle Mockup</a></li>
                        <li>Mark on <a href="#">Our Trip to the Alps</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

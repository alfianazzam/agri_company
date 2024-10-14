<section class="module pb-0" id="works">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Our Projects</h2>
                <div class="module-subtitle font-serif"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="filter font-alt" id="filters">
                    <li><a class="current wow fadeInUp" href="#" data-filter="*">All</a></li>
                    @php
                        $categories = \App\Models\CategoryGallery::all();
                    @endphp
                    @foreach ($categories as $category)
                        <li><a class="wow fadeInUp" href="#" data-filter=".{{ Str::slug($category->name, '-') }}"
                                data-wow-delay="0.2s">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <ul class="works-grid works-grid-gut works-grid-3 works-hover-d" id="works-grid">
            @php
                $projects = \App\Models\Project::with('category')->get();
            @endphp
            @foreach ($projects as $project)
                <li class="work-item {{ Str::slug($project->category->name, '-') }}">
                    <a href="{{ route('project.detail', $project->id) }}">
                        <div class="work-image">
                            <img src="{{ asset('storage/' . $project->jumbotron_image) }}" alt="{{ $project->jumbotron_title }}">
                        </div>
                        <div class="work-caption font-alt">
                            <h3 class="work-title">{{ $project->jumbotron_title }}</h3>
                            <div class="work-descr">{{ $project->category->name }}</div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>

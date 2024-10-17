 <div class="module-small bg-dark">
     <div class="container">
         <div class="row">
             <div class="col-sm-3">
                 <div class="widget">
                     <h5 class="widget-title font-alt">About {{ $company->name }}</h5>
                     <p>The languages only differ in their grammar, their pronunciation and their most common
                         words.</p>
                     <p>Phone: {{ $company->phone }}</p>Fax: {{ $company->phone }}
                     <p>Email:<a href="{{ $company->email }}">{{ $company->email }}</a></p>
                 </div>
             </div>
             <div class="col-sm-3">
                 <div class="widget">
                     <h5 class="widget-title font-alt">Recent Agenda</h5>
                    @php
                        $agendas = \App\Models\Agenda::all();
                    @endphp

                     <ul class="icon-list">
                        @foreach ($agendas as $agenda)

                        <li>{{ $agenda->location }} <a href="{{ route('poster.detail', $agenda->id) }}">{{ $agenda->title }}</a></li>
                            
                        @endforeach
                     </ul>
                 </div>
             </div>
             <div class="col-sm-3">
<div class="widget">
    <h5 class="widget-title font-alt">Poster Categories</h5>
    <ul class="icon-list">
        @php
        // Mengambil kategori dan menghitung jumlah poster untuk setiap kategori
        $categories = \App\Models\CategoryPoster::withCount('posters')->get();
        @endphp

        @foreach ($categories as $category)
        <li>
            <a href="#">
                {{ $category->name }} - {{ $category->posters_count }}
            </a>
        </li>
        @endforeach
    </ul>
</div>


             </div>
             <div class="col-sm-3">
                 <div class="widget">
    <h5 class="widget-title font-alt">Updated Posters</h5>
    <ul class="widget-posts">
        @php
        // Mengambil poster terbaru
        $recentPosters = \App\Models\Poster::orderBy('created_at', 'desc')->take(3)->get();
        @endphp

        @foreach ($recentPosters as $poster)
        <li class="clearfix">
            <div class="widget-posts-image">
                <a href="{{ route('poster.show', $poster->id) }}">
                    <img src="{{ asset('storage/' . $poster->img_url) }}" alt="{{ $poster->title }} Thumbnail" />
                </a>
            </div>
            <div class="widget-posts-body">
                <div class="widget-posts-title">
                    <a href="{{ route('poster.show', $poster->id) }}">{{ $poster->title }}</a>
                </div>
                <div class="widget-posts-meta">{{ $poster->created_at->format('d F') }}</div>
            </div>
        </li>
        @endforeach
    </ul>
</div>

             </div>
         </div>
     </div>
 </div>

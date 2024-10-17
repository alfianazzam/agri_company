@extends('layouts.app')

@section('content')

<section class="module" id="team">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Meet Our Agriculture Team</h2>
                <div class="module-subtitle font-serif">Our dedicated team is committed to sustainable farming practices, ensuring the health of our crops and the environment.</div>
            </div>
        </div>
        <div class="row">
            @foreach($teamMembers as $member)
                <div class="mb-sm-20 wow fadeInUp col-md-4 col-sm-6 col-xs-12">
                    <div class="team-item">
                        <div class="team-image">
                            <img src="{{ asset('storage/' . $member->image) }}" alt="Member Photo" />
                            <div class="team-detail">
                                <h5 class="font-alt">{{ $member->name }}</h5>
                                <p class="font-serif">{{ $member->description }}</p>
                                <div class="team-social">
                                    @if($member->social_links)
                                        @foreach(json_decode($member->social_links, true) as $platform => $link)
                                            @if($link)
                                                <a href="{{ $link }}" target="_blank">
                                                    <i class="fa fa-{{ $platform }}"></i>
                                                </a>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="team-descr font-alt">
                            <div class="team-name">{{ $member->name }}</div>
                            <div class="team-role">{{ $member->role }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
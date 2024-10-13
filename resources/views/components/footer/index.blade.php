<footer class="footer bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p class="copyright font-alt">&copy; 2024&nbsp;<a href="{{ url('/') }}">{{ $company->name }}</a>, All Rights Reserved</p>
            </div>
            <div class="col-sm-6">
                <div class="footer-social-links">
                    @if($company && !empty($company->social_media))
                        @foreach($company->social_media as $platform => $url)
                            @if(!empty($url))
                                <a href="{{ $url }}" target="_blank" rel="noopener noreferrer">
                                    @if($platform === 'facebook')
                                        <i class="bi bi-facebook"></i>
                                    @elseif($platform === 'instagram')
                                        <i class="bi bi-instagram"></i>
                                    @elseif($platform === 'whatsapp')
                                        <i class="bi bi-whatsapp"></i>
                                    @elseif($platform === 'linkedin')
                                        <i class="bi bi-linkedin"></i>
                                    @elseif($platform === 'twitter')
                                        <i class="bi bi-twitter"></i>
                                    @endif
                                </a>
                            @endif
                        @endforeach
                    @else
                        <p>No social media links available.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</footer>

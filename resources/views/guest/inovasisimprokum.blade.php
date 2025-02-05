@extends('guest.main')

@section('css')
<link rel="stylesheet" href="{{asset('css/guest/inovasisimprokum.css')}}">
@endsection

@section('content')
<section>
    <div class="video-container d-flex flex-column align-items-center justify-content-center">
        <div class="video-player d-flex align-items-center justify-content-center ">
            <iframe width="800" height="450" src="https://www.youtube.com/embed/fNgckjWgJ64?si=4xIMwIUbFhcql0m0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <a class="btn-tutorial" href="https://docs.google.com/presentation/d/1PdYJ76VsEgMGXfXhdazBiZTYPYY6jSE2/edit?usp=sharing&ouid=108673626304482254466&rtpof=true&sd=true">Tutorial SIMPROKUM</a>
    </div>
</section>
@section('js')
<script>
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '500',
            width: '1000',
            videoId: 'M7lc1UVf-VE',
            playerVars: {
                'playsinline': 1
            },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerReady(event) {
        event.target.playVideo();
    }

    var done = false;

    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
            setTimeout(stopVideo, 6000);
            done = true;
        }
    }

    function stopVideo() {
        player.stopVideo();
    }
</script>
@endsection
@endsection
@extends('JDIH.layout.app')
@section('title','Media - JDIH Kota Batu')

@section('css')
<link rel="stylesheet" href="{{ asset('css/JDIH/media1.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="box-header">
        <h2>JDIH</h2>
        <h3>BAGIAN HUKUM SEKRETARIAT DAERAH KOTA BATU</h3>
        <div class="video-player">
            <iframe width="800" height="450" src="https://www.youtube.com/embed/mQ5HhESHkDA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/newhome.js') }}"></script>
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
@extends('user.template.master2')
@section('backlink',route('user.mapel_view',$materi->mapel_id))
@section('titlepage','Materi ')

@section('content')

<div class="listview-title mt-1">Materi</div>

<div id="player" class="mx-auto d-block"></div>


<div class="form-button-group  transparent">
    <button id="next_materi" disabled class="btn btn-sm btn-primary">Next</button>
</div>

@endsection

@push('js')

<script src="http://www.youtube.com/player_api"></script>

<script>
    // create youtube player
    var player;
    var materi = @json($materi);

    function onYouTubePlayerAPIReady() {
        let link_youtube = materi.link_youtube.replace("https://www.youtube.com/watch?v=", "")+"?showinfo=0&"
        
        player = new YT.Player('player', {
            width: '90%',
            videoId: link_youtube,
            playerVars: {
                'autoplay': 0,
                'controls': 1,
                'rel': 0,
                'fs': 0,
                'playsinline': 1,
                'showinfo': 0
            },
            events: {
                onReady: onPlayerReady,
                onStateChange: onPlayerStateChange,
            }
        });
    }

    // autoplay video
    function onPlayerReady(event) {
        event.target.playVideo();
    }

    // when video ends
    function onPlayerStateChange(event) {
        if (event.data === 0) {
            $("#next_materi").prop('disabled',false)
        }
    }
</script>

@endpush
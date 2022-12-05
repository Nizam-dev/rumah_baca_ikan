
    @extends('admin.template.master2')

@section('titlepage','Materi ')

@section('content')

<!-- <div class="listview-title mt-1"></div> -->

<div id="player" class="mx-auto d-block"></div>




@endsection

@push('js')

<script src="http://www.youtube.com/player_api"></script>

<script>
    // create youtube player
    var player;
    var materi = @json($materi);

    $("#next_materi").on('click',()=>{
        let url = $("#next_materi").attr('url');
        window.location.href = url;
    })

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
       
    }
</script>

@endpush
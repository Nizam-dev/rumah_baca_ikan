@extends('user.template.master2')
@section('backlink',route('user.mapel_view',$materi->mapel_id))
@section('titlepage','Materi ')
@push('css')
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<style>
    .lds-ellipsis {
  display: block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ellipsis div {
  position: absolute;
  top: 33px;
  width: 13px;
  height: 13px;
  border-radius: 50%;
  background: #00e9f7;
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.lds-ellipsis div:nth-child(1) {
  left: 8px;
  animation: lds-ellipsis1 0.6s infinite;
}
.lds-ellipsis div:nth-child(2) {
  left: 8px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(3) {
  left: 32px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(4) {
  left: 56px;
  animation: lds-ellipsis3 0.6s infinite;
}
@keyframes lds-ellipsis1 {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes lds-ellipsis3 {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes lds-ellipsis2 {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(24px, 0);
  }
}

</style>
@endpush

@section('content')

<div class="section mt-2">
    <div class="card">
        <div class="card-body">

            <ul class="nav nav-tabs lined" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#video_c" role="tab" id="t_video">
                        <ion-icon name="wallet"></ion-icon>
                        Video
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#pdf_c" id="t_pdf" role="tab">
                        <ion-icon name="card"></ion-icon>
                        PDF
                    </a>
                </li>
            </ul>

            <div class="tab-content mt-2">
                <div class="tab-pane fade show active" id="video_c" role="tabpanel">
                    <div id="player" class="mx-auto d-none"></div>

                </div>
                <div class="tab-pane fade" id="pdf_c" role="tabpanel">

                    <div id="pdview" class="d-none">
                        <canvas id="the-canvas" class="w-100">Tidak Ada</canvas>


                        <div>
                            <button class="btn btn-sm btn-primary" id="prev">Previous</button>
                            <button class="btn btn-sm btn-primary" id="next">Next</button>
                            &nbsp; &nbsp;
                            <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
                        </div>
                    </div>

                    <div id="pdload">
                        <div class="lds-ellipsis mx-auto"><div></div><div></div><div></div><div></div></div>
                        <p class="text-center">PDF Loading...</p>
                        
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>



<!-- Canvas to place the PDF -->

<div class="form-button-group  transparent">
    <button id="next_materi"
        url="{{$next_materi ? route('user.materi',$next_materi->id) : route('user.mapel_view',$materi->mapel_id)}}"
        @if($next_materi) {{$next_materi->history->isEmpty() ? 'disabled' : ''}} @else disabled @endif
        class="btn btn-sm btn-primary">{{ $next_materi ?  'Next Materi' : 'Selesai'}}</button>
</div>



@endsection

@push('js')
<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>

<script src="https://www.youtube.com/player_api"></script>



<script>
    // create youtube player
    let player;
    let materi = @json($materi);

    $("#next_materi").on('click', () => {
        let url = $("#next_materi").attr('url');
        window.location.href = url;
    })

    function onYouTubePlayerAPIReady() {
        let link_youtube = materi.link_youtube.replace("https://www.youtube.com/watch?v=", "") + "?showinfo=0&"

        player = new YT.Player('player', {
            width: '100%',
            videoId: link_youtube,
            playerVars: {
                'autoplay': false,
                'controls': 1,
                'rel': 0,
                'fs': 0,
                'playsinline': 1,
                'showinfo': 0
            },
            events: {
                onReady: onPlayerReady,
                onStateChange: onPlayerStateChange,
                onError: onPlayerError
            }
        });
    }

    function onPlayerError() {
        $("#video_c").empty()
        $("#video_c").append(`
            <p class="text-center">Tidak Ada Materi Video</p>
        `)
        axios.get("{{route('user.history_update',$materi->id)}}")
            .then(res => {
                $("#next_materi").prop('disabled', false)
            })

    }

    // autoplay video
    function onPlayerReady(event) {
        event.target.playVideo();
        $('#player').removeClass('d-none').addClass('d-block')
    }

    // when video ends
    function onPlayerStateChange(event) {
        if (event.data === 0) {
            axios.get("{{route('user.history_update',$materi->id)}}")
                .then(res => {
                    $("#next_materi").prop('disabled', false)
                })
        }
    }
</script>

<script>
    // If absolute URL from the remote server is provided, configure the CORS
    // header on that server.
    let pdf_url = "{{asset('public/pdf')}}" + "/" + materi.pdf;
    if (materi.pdf == null) {
        $("#pdf_c").empty()
        $("#pdf_c").append(`
            <p class="text-center">Tidak Ada Materi PDF</p>
        `)

    } else {


        // Loaded via <script> tag, create shortcut to access PDF.js exports.
        let pdfjsLib = window['pdfjs-dist/build/pdf'];

        // The workerSrc property shall be specified.
        pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

        let pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null,
            scale = 1,
            canvas = document.getElementById('the-canvas'),
            ctx = canvas.getContext('2d');

        /**
         * Get page info from document, resize canvas accordingly, and render page.
         * @param num Page number.
         */
        function renderPage(num) {
            pageRendering = true;
            // Using promise to fetch the page
            pdfDoc.getPage(num).then(function (page) {
                let viewport = page.getViewport({
                    scale: scale
                });
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render PDF page into canvas context
                let renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                };
                let renderTask = page.render(renderContext);

                // Wait for rendering to finish
                renderTask.promise.then(function () {
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        // New page rendering is pending
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });
            });

            // Update page counters
            document.getElementById('page_num').textContent = num;
        }

        /**
         * If another page rendering in progress, waits until the rendering is
         * finised. Otherwise, executes rendering immediately.
         */
        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        }

        /**
         * Displays previous page.
         */
        function onPrevPage() {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
        }
        document.getElementById('prev').addEventListener('click', onPrevPage);

        /**
         * Displays next page.
         */
        function onNextPage() {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
        }
        document.getElementById('next').addEventListener('click', onNextPage);

        /**
         * Asynchronously downloads PDF.
         */
        pdfjsLib.getDocument(pdf_url).promise.then(function (pdfDoc_) {
            pdfDoc = pdfDoc_;
            document.getElementById('page_count').textContent = pdfDoc.numPages;

            $("#pdload").addClass('d-none')
            $("#pdview").removeClass('d-none')

            renderPage(pageNum);
        }).catch(function (error) {
            $("#pdf_c").empty()
            $("#pdf_c").append(`
            <p class="text-center">Tidak Ada Materi PDF</p>
        `)
        })

    }
</script>

@endpush
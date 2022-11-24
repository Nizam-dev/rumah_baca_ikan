<script>
$(document).ready(function() {

 startsummer()   

});

function startsummer(){
       $("[aria-label='Insert Image'] .modal-body").prepend(`
    <div class="row"> 
        <div class="col-md-12">
            <div class="card pilihan">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab-nobd" data-toggle="pill" onclick="gantiima(this)" aria-controls="pills-home-nobd" aria-selected="true">Upload File</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" onclick="gantiimb(this)" aria-controls="pills-profile-nobd" aria-selected="false">From Media</a>
                            </li>
                        </ul>
                        <div class="tab-content d-block mt-2 mb-3" id="pills-without-border-tabContent">
                            <div class="tab-pane uplo fade show active" id="pills-home-nobd" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                <input type="file" class="mt-3" name="image" accept="image/*" onchange="gantiimage(this)" />

                    <button class="btn btn-primary loadingmedia d-none" type="button" disabled="">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mohon Tunggu (Sedang Uploading)... </button>


                            </div>
                            <div class="tab-pane fade medi" id="pills-profile-nobd" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
                                <div class="row medialist"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    `)


$("[aria-label='Insert Audio'] .modal-body").prepend(`
    <div class="row"> 
        <div class="col-md-12">
            <div class="card pilihana">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab-nobd2" data-toggle="pill" onclick="gantiima(this)" aria-controls="pills-home-nobd2" aria-selected="true">Upload Audio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab-nobd2" data-toggle="pill" 
                                onclick="gantiimb(this)"
                                aria-controls="pills-profile-nobd2" aria-selected="false">From Media</a>
                            </li>
                        </ul>

                        <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent2">
                            <div class="tab-pane uplo fade show active" id="pills-home-nobd2" role="tabpanel" aria-labelledby="pills-home-tab-nobd2">
                                <input type="file" class="mt-3" name="audio" accept="audio/*" onchange="uploadaudiofile(this)" />

                                 <button class="btn btn-primary loadingmedia d-none" type="button" disabled="">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mohon Tunggu (Sedang Uploading)... </button>

                            </div>
                            <div class="tab-pane fade medi" id="pills-profile-nobd2" role="tabpanel" aria-labelledby="pills-profile-tab-nobd2">
                                <div class="row mediaaudiolist px-2"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    `)






    getimage()
    getiaudio()
}

function getimage(){
    axios.get("{{url('getimage')}}")
    .then(function(response){
        $('.medialist').empty()
        $.each(response.data, function (id,image) {
            $('.medialist').append(`
                <div class="col-md-3 mx-2 imagemedia card">
                    <i class="fe fe-check text-success d-none"></i>
                    <img src="{{asset('public/media/image')}}`+"/"+image.nama_media+`" style="height:80px;" onclick="getImageUrl(this)">
                </div>`
                )
        })
    })
}

function getiaudio(){
    axios.get("{{url('getaudio')}}")
    .then(function(response){
        $('.mediaaudiolist').empty()
        $.each(response.data, function (id,image) {
            $('.mediaaudiolist').append(`
                <div class="col-md-4 mb-2 audiomedia card" onclick="getAudioUrl(this)">
                    <i class="fe fe-check text-success d-none"></i>
                    <h6>`+image.nama_media+`</h6>
<audio controls="" src="{{asset('public/media/audio')}}`+"/"+image.nama_media+`" class="note-audio-clip"></audio>
                    
                </div>`
                )
        })
    })
}

function gantiima(k){
    $(k).parent().parent().parent().find(".tab-pane.uplo").addClass('show').addClass('active')
    $(k).parent().parent().parent().find(".tab-pane.medi").removeClass('show').removeClass('active')
}

function gantiimb(k){
    $(k).parent().parent().parent().find(".tab-pane.uplo").removeClass('show').removeClass('active')
    $(k).parent().parent().parent().find(".tab-pane.medi").addClass('show').addClass('active')
}

function getImageUrl(url){
    $(".note-group-image-url input").val(url.src)
    $("[aria-label='Insert Image'] .modal-footer input").attr('disabled',false)
    $('.medialist').find('.imagemedia .d-block').addClass('d-none').removeClass('d-block')
    url.parentElement.children[0].classList.remove("d-none")
    url.parentElement.children[0].classList.add("d-block")
}

function getAudioUrl(url){
    $("[aria-label='Insert Audio'] .note-group-image-url input").val($(url).find("audio").attr("src"))
    $("[aria-label='Insert Audio'] .modal-footer input").attr('disabled',false)
    $('.mediaaudiolist').find('.audiomedia .d-block').addClass('d-none').removeClass('d-block')
    $(url).find(".d-none").addClass('d-block').removeClass('d-none')
}


    function gantiimage(niki) {
            var data = new FormData();
            console.log($(niki))
          data.append("image", niki.files[0]);
          $(niki).parent().parent().parent().parent().parent().parent().find(".loadingmedia").removeClass("d-none")
        axios.post("{{url('uploadimage')}}",data,{headers: {'Content-Type': 'multipart/form-data'}})
        .then(function(response){
            $(niki).parent().parent().parent().parent().parent().parent().parent().parent().find(".note-group-image-url input").val('{{url("public/media/image")}}'+'/'+response.data)
            $(niki).parent().parent().parent().parent().parent().parent().parent().parent().parent().find(".modal-footer input").attr('disabled',false)
            $(niki).parent().parent().parent().parent().parent().parent().find(".loadingmedia").addClass("d-none")
            getimage()
        })
    }

    function uploadaudiofile(niku){
        
          var data = new FormData();
          data.append("audio", niku.files[0]);
          $(niku).parent().find(".loadingmedia").removeClass("d-none")
        axios.post("{{url('uploadaudio')}}",data,{headers: {'Content-Type': 'multipart/form-data'}})
        .then(function(response){
            $(niku).parent().parent().parent().parent().parent().parent().parent().find(".note-group-image-url input").val('{{url("public/media/audio")}}'+'/'+response.data)
            $(niku).parent().parent().parent().parent().parent().parent().parent().parent().find(".modal-footer input").attr('disabled',false)
            $(niku).parent().find(".loadingmedia").addClass("d-none")
            getiaudio()

        })
    }


function addlastsum(){
     $(".list-jawaban").find(".jwbn:last-child [aria-label='Insert Image'] .modal-body").prepend(`
    <div class="row"> 
        <div class="col-md-12">
            <div class="card pilihan">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab-nobd" data-toggle="pill" onclick="gantiima(this)" aria-controls="pills-home-nobd" aria-selected="true">Upload File</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" onclick="gantiimb(this)" aria-controls="pills-profile-nobd" aria-selected="false">From Media</a>
                            </li>
                        </ul>
                        <div class="tab-content d-block mt-2 mb-3" id="pills-without-border-tabContent">
                            <div class="tab-pane uplo fade show active" id="pills-home-nobd" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                <input type="file" class="mt-3" name="image" accept="image/*" onchange="gantiimage(this)" />

                    <button class="btn btn-primary loadingmedia d-none" type="button" disabled="">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mohon Tunggu (Sedang Uploading)... </button>


                            </div>
                            <div class="tab-pane fade medi" id="pills-profile-nobd" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
                                <div class="row medialist"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    `)


 $(".list-jawaban").find(".jwbn:last-child [aria-label='Insert Audio'] .modal-body").prepend(`
    <div class="row"> 
        <div class="col-md-12">
            <div class="card pilihana">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab-nobd2" data-toggle="pill" onclick="gantiima(this)" aria-controls="pills-home-nobd2" aria-selected="true">Upload Audio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab-nobd2" data-toggle="pill" 
                                onclick="gantiimb(this)"
                                aria-controls="pills-profile-nobd2" aria-selected="false">From Media</a>
                            </li>
                        </ul>

                        <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent2">
                            <div class="tab-pane uplo fade show active" id="pills-home-nobd2" role="tabpanel" aria-labelledby="pills-home-tab-nobd2">
                                <input type="file" class="mt-3" name="audio" accept="audio/*" onchange="uploadaudiofile(this)" />

                                 <button class="btn btn-primary loadingmedia d-none" type="button" disabled="">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mohon Tunggu (Sedang Uploading)... </button>

                            </div>
                            <div class="tab-pane fade medi" id="pills-profile-nobd2" role="tabpanel" aria-labelledby="pills-profile-tab-nobd2">
                                <div class="row mediaaudiolist"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    `)

 getimage()
    getiaudio()
}




</script>
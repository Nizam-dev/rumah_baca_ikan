@extends('user.template.master2')
@section('backlink',route('user.rbgame'))
@section('titlepage','Quiz')

@section('content')

<div class="listview-title mt-1">
    {{$no_quiz}} Dari {{$banyak_quiz}} Quiz
</div>

<div class="section mt-2">
    <div class="card">
        <div class="card-header">
            Quiz
        </div>
        <div class="card-body">
            <img src="{{asset('public/gambar-game/'.$quiz->gambar)}}" class="w-75 mx-auto d-block" alt="" srcset="">
            {!! $quiz->soal !!}
        </div>
    </div>
</div>


<div class="section mt-2">
    <div class="section-title">Pilihan Jawaban</div>
    <div class="card">
        <div class="card-body p-0">

            <div class="input-list">
                @foreach($quiz->gandaquiz->shuffle() as $pilihan)
                <div class="form-check jawab-{{$pilihan->id}}">
                    <input class="form-check-input" type="radio" name="jawaban" id="pilihan-{{$pilihan->id}}"
                        value="{{$pilihan->id}}">
                    <label class="form-check-label" for="pilihan-{{$pilihan->id}}">
                        {!! $pilihan->jawaban !!}

                    </label>
                </div>
                @endforeach

            </div>

        </div>
    </div>
</div>

<div class="form-button-group  transparent">
    <button id="submit_jawaban" class="btn btn-primary" disabled>
        Simpan Jawaban
    </button>
    <a href="{{route('user.play_game',$quiz->nama_game_id)}}" id="next_quiz" class="btn btn-primary d-none">
        Next
    </a>
</div>


<!-- DialogJawaban -->
<div class="modal fade dialogbox" id="dialog-jawaban" data-bs-backdrop="static" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-icon">
                
            </div>
            <div class="modal-header">
                <h5 class="modal-title"></h5>
            </div>
            <div class="modal-footer">
                <div class="btn-inline">
                    <a href="#" class="btn" data-bs-dismiss="modal">CLOSE</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * DialogJawaban -->

@endsection

@push('js')

<script>
    $("[name='jawaban']").on('change', () => {
        let jawaban = $("[name='jawaban']:checked").val()
        $("#submit_jawaban").prop('disabled', false)
    })

    $("#submit_jawaban").on('click', async function () {
        $("#submit_jawaban").prop('disabled', true)
        $("#submit_jawaban").html(
            `<span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span> Mengecek Jawaban...`
            )

        
        let icon_benar = `<ion-icon name="checkmark-circle"></ion-icon>`
        let icon_salah = `<ion-icon name="close-circle"></ion-icon>`
        let jawaban = $("[name='jawaban']:checked").val()
        $("[name='jawaban']").prop("disabled",true)
        await axios.post("{{route('user.cek_rbgame')}}",{
            id :"{{$quiz->id}}",
            jawaban : jawaban
        }).then(res=>{
            if(res.data.status == 'benar'){
                $("#dialog-jawaban .modal-icon").addClass("text-success")
                $("#dialog-jawaban .modal-icon").html(icon_benar)
                $("#dialog-jawaban .modal-title").html("Jawaban Benar...")
                $(`.jawab-${res.data.jawaban_benar}`).addClass("bg-success")
            }else{
                $("#dialog-jawaban .modal-icon").addClass("text-danger")
                $("#dialog-jawaban .modal-icon").html(icon_salah)
                $("#dialog-jawaban .modal-title").html("Jawaban Salah...")
                $(`.jawab-${res.data.jawaban_benar}`).addClass("bg-success")
                $(`.jawab-${jawaban}`).addClass("bg-danger")
            }
            $("#dialog-jawaban").modal('show')
            $("#submit_jawaban").addClass("d-none")
            if(res.data.next_quiz == false){
                $("#next_quiz").html("Cek Poin")
            }
            $("#next_quiz").removeClass("d-none")
        })

    })
</script>

@endpush
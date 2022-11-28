@extends('admin.template.master')

@section('css')


<style>
    .modal-dialog{
        max-width:1000px;
    }
    .note-group-select-from-files{
        display: none;
    }


    .modal-dialog .modal-footer .btn-primary{
        background: black !important;
    }
    .imagemedia img{
        cursor:pointer;
    }
</style>

@endsection
@section('judul','Soal')

@section('content')

<div class="page-inner containertambahmateri mt--5">
    
    <div class="row">
        <div class="col-md-12  mt-5">
           <div class="card">
              <div class="card-header bg-primary">
                 <h6 class="text-white">Tambah Soal<div class="float-right kembalimateri" style="cursor :pointer;">X</div> </h6>
              </div>
              <div class="card-body">
                 <form method="post" action="{{url('kelolasoal')}}" enctype="multipart/form-data" id="submitdata">
                    @csrf

                    <div class="form-group">
                        <label>Label</label>
                        <input type="text" name="label" class="form-control">
                     </div>

                    <div class="form-group">
                       <label>Skor</label>
                       <input type="text" name="skor" id="nama_materi" class="form-control"/>
                    </div>
                    <div class="form-group">
                       <label>Soal :</label>
                       <textarea class="summernote_dessription" name="soal" id="isi_materi"></textarea>
                    </div>

                      <div class="form-group">
                       <label class="badge badge-success text-white py-2 w-100"
                       style="font-size: 15px;" 
                       >Jawaban (Benar):</label>
                       <textarea class="summernote_dess" required name="jawbenar" id="isi_jawab"></textarea>
                    </div>

                    <div class="list-jawaban">
                        <div class="form-group">
                       <label class="badge badge-primary text-white py-2 w-100"
                       style="font-size: 15px;" 
                       >Jawaban Lain:</label>
                       <textarea class="summernote_jaw mb-3" required name="jaw[]"></textarea>
                    </div>
                    </div>


                    <button class="btn btn-primary" onclick="tambahjawaban()" type="button">
                        <i class="fa fa-plus"></i>
                    </button>

                    <button class="btn btn-danger" onclick="hapusjawaban()" type="button">
                        <i class="fa fa-minus"></i>
                    </button>

                 </form>
                 <div class="form-group text-center">
                    <button onclick="submitMateri()" class="btn btn-info btn-sm">Submit</button>
                 </div>
              </div>
           </div>
      </div>
   </div>

</div>


@endsection
@section('js')


<script>

var jumjawaban = 0

function hapusjawaban() {
    $('.list-jawaban .jwbn:last-child').remove()
    jumjawaban--
}

function tambahjawaban() {
    $('.list-jawaban').append(`
<div class="mb-3 jwbn">
 <textarea class="summernote_jaw" required name="jaw[]"></textarea>
</div>
        `)


      $('.summernote_jaw').summernote({
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video','audio']],
          ['view', ['fullscreen', 'codeview', 'help']],
        ],

})
      jumjawaban++ 

      addlastsum()


}

$(document).ready(function() {

@if(session()->has('message'))
Swal.fire({
  icon: 'success',
  title: "{{session()->get('message')}}",
})
$(".swal2-popup textarea").remove()
$(".swal2-popup .note-editor").remove()
@endif



});

$('#basic-datatables').DataTable({
});

$('#basic-datatables2').DataTable({
});

$('.searchbox-input').keyup( function () {
    $('.materi').removeClass('d-none');
    var filter = $(this).val(); // get the value of the input, which we filter on
    $('.listmateri').find('.materi .card-body .row .col-stats .numbers  p:not(:contains("'+filter+'"))').parent().parent().parent().parent().parent().addClass('d-none');
});

$('#btn-tambahmateri').click(()=>{
    $('.panel-header').removeClass('d-block').addClass('d-none')
    $('.containermateri').removeClass('d-block').addClass('d-none')
    $('.containertambahmateri').removeClass('d-none').addClass('d-block')

})

$('#btn-tambahessay').click(()=>{
    $('.panel-header').removeClass('d-block').addClass('d-none')
    $('.containermateri').removeClass('d-block').addClass('d-none')
    $('.containertambahessay').removeClass('d-none').addClass('d-block')

})



$('.kembalimateri').click(()=>{
    $('.panel-header').removeClass('d-none').addClass('d-block')
    $('.containermateri').removeClass('d-none').addClass('d-block')
    $('.containertambahmateri').removeClass('d-block').addClass('d-none')
    $('.containertambahessay').removeClass('d-block').addClass('d-none')

})

$(document).ready(function() {
    $('textarea').summernote({
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video','audio']],
          ['view', ['fullscreen', 'codeview', 'help']],
        ],

})


})  

function submitEssay(){
    if($('#skoressay').val() == "" || $('#materieesay').val() =="" || $('#labelessay').val() ==""){
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: "Kolom Wajib Diisi Semua",
        })
    }else{
        $("#submitdataessay").submit()
    }
}

function submitMateri(){
    if($('#isi_materi').val() == "" || $('#nama_materi').val() ==""){
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: "Kolom Wajib Diisi Semua",
        })
    }else{
        $("#submitdata").submit()
    }
}

 
</script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.js" integrity="sha512-MNW6IbpNuZZ2VH9ngFhzh6cUt8L/0rSVa60F8L22K1H72ro4Ki3M/816eSDLnhICu7vwH/+/yb8oB3BtBLhMsA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{asset('public/template/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>
@include('admin.template.customsummernote')
@endsection
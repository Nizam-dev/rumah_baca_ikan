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
@section('judul','Edit Informasi ')

@section('content')



<div class="page-inner containertambahmateri mt--5">
    
    <div class="row">
        <div class="col-md-12  mt-5">
           <div class="card">
            
              <div class="card-header bg-primary">
          
                 <h6 class="text-white">Edit Informasi<div class="float-right kembalimateri" style="cursor :pointer;"></div> </h6>
              </div>
              <div class="card-body">
                 <form method="post" action="{{url('quizgame/'.$informasi->id)}}" enctype="multipart/form-data" id="submitdata">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                            <label class="badge badge-success text-white py-2 w-100" style="font-size: 15px;">Gambar Informasi</label>
                            <input type="file" class="form-control input-full w-100" required name="gambar" id="isi_jawab"></textarea>
                        </div>

                        <div class="text-center">
                                    <img class="img" id="loadfotoadd" src="{{$informasi->gambar}}" alt="Foto Thumbnail"
                                        style=" height:30%; width:30%;">                            
                        </div>


                    <div class="form-group">
                       <label>Judul :</label>
                       <input class="form-control" name="judul" id="isi_materi" value="{{$informasi->judul}}">
                    </div>

                    <div class="form-group">
                       <label>Deskripsi :</label>
                       <textarea class="summernote_dessription" name="deskripsi" id="isi_materi">{{$informasi->deskripsi}}</textarea>
                    </div>

            


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

@include('admin.template.customsummernote')
@endsection
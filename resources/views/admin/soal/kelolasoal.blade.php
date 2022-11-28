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



<div class="page-inner containermateri mt--5 d-block">
   
    <div class="row">

      <!--  -->

     <div class="col-md-12 mb-3">
       <div class="px-3">
          <div class="card-header row" style="border: 1px solid black !important;">
              <div class="col-md-12">
                  <button class="btn btn-sm btn-primary float-right" id="btn-tambahmateri">Tambah Soal</button>

                  
                   <a href="{{url('soal')}}" class="btn btn-sm btn-primary mr-3 float-right">Cek Soal</a>
              </div>

          </div>
          
      </div>
     </div>


      <!--  -->
        <div class="col-md-12">
          
          <ul class="nav nav-pills nav-secondary  nav-pills-no-bd nav-pills-icons justify-content-center" id="pills-tab-with-icon" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab-icon" data-toggle="pill" href="#pills-home-icon" role="tab" aria-controls="pills-home-icon" aria-selected="true">
                      <i class="fas fa-user-graduate"></i>
                      Pilihan Ganda
                  </a>
              </li>
      

          </ul>

        </div>

      <!--  -->

      <div class="col-md-12">

          <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
            <div class="tab-pane fade show active" id="pills-home-icon" role="tabpanel" aria-labelledby="pills-home-tab-icon">

              
        <div class="col-md-12">


            <div class="row px-2 py-3 listmateri card mx-1 mt-3">

                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th style="width: 10%">No</th>
                                    <th>Label</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Label Soal</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                
                                <?php $no1=1 ?>
                               @foreach($soal as $v)
                                <tr>
                                    <td>{{$no1++}}</td>
                                    <td>{{$v->soal}}</td>
                                    <td>
                                   
                                    <a href="" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="" class="btn btn-danger" data-target="confirmation-modal">
                                    <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="" class="btn btn-success text-white">
                                    <i class="fa fa-eye"></i>
                                    </a>

                                 
                                    </td>
                                </tr>
                                @endforeach
                            

                            </tbody>
                        </table>
                    </div>
 
            </div>

        </div>

                

            </div>

            

        </div>


      </div>

      <!--  -->


    </div>

</div>

<div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">Apakah Anda Ingin Menghapus Soal?</h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        Tidak
                    </div>
                    <div class="col-6">
                        <a href="#" id="linkhapus" class="btn btn-primary border-radius-100 btn-block confirmation-btn" ><i class="fa fa-check"></i></a>
                        Ya
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-inner containertambahmateri mt--5 d-none">
    
    <div class="row">
        <div class="col-md-12  mt-5">
           <div class="card">
              <div class="card-header bg-primary">
                 <h6 class="text-white">Tambah Soal<div class="float-right kembalimateri" style="cursor :pointer;">X</div> </h6>
              </div>
              <div class="card-body">
                 <form method="post" action="{{url('kelolasoal')}}" enctype="multipart/form-data" id="submitdata">
                    @csrf

                    <!-- <div class="form-group">
                        <label>Label</label>
                        <input type="text" name="label" class="form-control">
                     </div>

                    <div class="form-group">
                       <label>Skor</label>
                       <input type="text" name="skor" id="nama_materi" class="form-control"/>
                    </div> -->

                    <div class="col-md-9 p-0">
                                               <input type="hidden" class="form-control input-full w-100" value="{{$materi->id}}" name="materi_id" id="kelas_id" placeholder="Enter Input">
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



function submitMateri(){
    if($('#isi_materi').val() == "" || $('#isi_jawab').val() ==""){
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
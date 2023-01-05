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
                 <form method="post" action="{{url('admin-slider/'.$Slider->id)}}" enctype="multipart/form-data" id="submitdata">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                            <label class="badge badge-success text-white py-2 w-100" style="font-size: 15px;">Gambar Informasi</label>
                            <input type="file" class="form-control input-full w-100" required name="gambar" id="isi_jawab"></textarea>
                        </div>

                        <div  iv class="text-center">
                                    <img class="img" id="loadfotoadd" src="{{$Slider->gambar}}" alt="Foto Thumbnail"
                                        style=" height:30%; width:30%;">                            
                        </div>

<br>


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


@endsection
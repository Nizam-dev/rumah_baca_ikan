@extends('admin.template.master')
@section('css')


<style>
  .modal-dialog {
    max-width: 1000px;
  }

  .note-group-select-from-files {
    display: none;
  }


  .modal-dialog .modal-footer .btn-primary {
    background: black !important;
  }

  .imagemedia img {
    cursor: pointer;
  }
</style>

@endsection

@section('judul','Data Peminjaman Buku')

@section('content')

<div class="row containermateri">
  <div class="col-lg-12">
    <div class="card">



      <div class="card-body">
        <!-- <a href="{{ url('') }}"><button class="btn btn-success">Tambah Data</button></a><br><br> -->
        <button class="btn btn-sm btn-primary float-right" id="btn-tambahmateri">Tambah Data</button>
        <div class="table-responsive">
          <table id="dataTable" class="table table-striped" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Lama Peminjaman</th>
                <th>Opsi</th>

              </tr>
            </thead>
            <tbody>
              @php $no=1 @endphp
              @foreach($peminjaman as $data)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$data->nama_peminjam }}</td>
                <td>{{$data->judul_buku }}</td>
                <td>{{$data->kategori }}</td>
                <td>{{$data->lama_peminjaman }}</td>


                <td>
                  <a href="{{ url('admin-peminjaman-buku',$data->id) }}"><button class="btn btn-warning btn-sm ">Detail</button></a>

                  <a href="{{ url('admin-peminjaman-buku-edit',$data->id,) }}"><button class="btn btn-primary btn-sm edit" title="Edit">Edit</button></a>

                  <a href="#" data-toggle="modal" onclick="deleteData('{{$data->id}}')" data-target="#DeleteModal">
                    <button class="btn btn-danger btn-sm" title="Hapus">Hapus</button>
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




<div class="page-inner containertambahmateri mt--5 d-none">

  <div class="row">
    <div class="col-md-12  mt-5">
      <div class="card">
        <div class="card-header bg-primary">
          <h6 class="text-white">Tambah Data Peminjam<div class="float-right kembalimateri" style="cursor :pointer;">X</div>
          </h6>
        </div>
        <div class="card-body">
          <form method="post" action="{{url('admin-peminjaman-buku')}}" enctype="multipart/form-data" id="submitdata">
            @csrf


            <div class="row">
              <div class="col-md-6  mt-5">

                <div class="form-group">
                  <label>Nama Peminjam :</label>
                  <input class="form-control" name="nama_peminjam" id="isi_materi">
                </div>
              </div>
              <div class="col-md-6  mt-5">
                <div class="form-group">
                  <label>No HP Peminjam :</label>
                  <input class="form-control" type="number" name="no_hp" id="isi_materi2">
                </div>

              </div>
            </div>
            <div class="row">

              <div class="col-md-6  mt-5">

                <div class="form-group">
                  <label>Alamat Peminjam:</label>
                  <textarea class="form-control" name="alamat" id="isi_materi3"></textarea>
                </div>
              </div>
              <div class="col-md-6  mt-5">
                <div class="form-group">
                  <label>Judul Buku Dipinjam:</label>
                  <textarea class="form-control" name="judul_buku" id="isi_materi4"></textarea>
                </div>

              </div>
            </div>
            <div class="row">
              <div class="col-md-5  mt-5">

                <div class="form-group">
                  <label>Kategori Buku:</label>
                  <input class="form-control" name="kategori" id="isi_materi5">
                </div>
              </div>
              <div class="col-md-4  mt-5">

                <div class="form-group">
                  <label>Kode Referensi :</label>
                  <input class="form-control" name="kode_referensi" id="isi_materi6">
                </div>
              </div>
              <div class="col-md-3  mt-5">

                <div class="form-group">
                  <label>Lama Peminjaman(Bulan):</label>
                  <input type="number"class="form-control" name="lama_peminjaman" id="isi_materi7">
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-md-6  mt-5">

                <div class="form-group">
                  <label>Catatan (Tidak Wajib Diisi):</label>
                  <textarea class="form-control" name="catatan" ></textarea>
                </div>
              </div>
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







<!-- Modal konfirmasi Hapus -->
<div id="DeleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <form action="" id="deleteForm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Data Peminjaman Buku</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <p>Apakah anda yakin ingin menghapus data Peminjaman Buku?</p>
          <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
          <button type="submit" name="" class="btn btn-danger float-right mr-2" data-dismiss="modal" onclick="formSubmit()">Hapus</button>
        </div>
      </div>
    </form>
  </div>
</div>



@endsection

@section('js')
<script type="text/javascript">
  function deleteData(id) {
    var id = id;
    var url = '{{url("admin-peminjaman-buku") }}' + "/" + id;
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
  }

  function formSubmit() {
    $("#deleteForm").submit();
  }


  $('#dataTable').DataTable({});

  $('#btn-tambahmateri').click(() => {
    $('.panel-header').removeClass('d-block').addClass('d-none')
    $('.containermateri').removeClass('d-block').addClass('d-none')
    $('.containertambahmateri').removeClass('d-none').addClass('d-block')

  })


  $('.kembalimateri').click(() => {
    $('.panel-header').removeClass('d-none').addClass('d-block')
    $('.containermateri').removeClass('d-none').addClass('d-block')
    $('.containertambahmateri').removeClass('d-block').addClass('d-none')
    $('.containertambahessay').removeClass('d-block').addClass('d-none')

  })

  function submitMateri() {
    if ($('#isi_materi').val() == ""||$('#isi_materi2').val() == ""||$('#isi_materi3').val() == ""||$('#isi_materi4').val() == ""||$('#isi_materi5').val() == ""
  ||$('#isi_materi6').val() == ""||$('#isi_materi7').val() == "") {
      Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: "Kolom Wajib Diisi Semua",
      })
    } else {
      $("#submitdata").submit()
    }
  }
</script>

@endsection
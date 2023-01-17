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
@section('judul','Edit Data Peminjaman Buku')

@section('content')



<div class="row">
    <a href="{{ url('admin-peminjaman-buku') }}" class="btn btn-primary"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>


<div class="page-inner containertambahmateri mt--5 ">

    <div class="row">
        <div class="col-md-12  mt-5">
            <div class="card">
                <div class="card-header bg-primary">
                    <h6 class="text-white">Edit Data Peminjam<div class="float-right kembalimateri" style="cursor :pointer;"></div>

                    </h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('admin-peminjaman-buku',$data->id)}}" enctype="multipart/form-data" id="submitdata">
                        @csrf
                        @method('put')


                        <div class="row">
                            <div class="col-md-4  mt-5">

                                <div class="form-group">
                                    <label>Nama Peminjam :</label>
                                    <input class="form-control" name="nama_peminjam" id="isi_materi" value="{{$data->nama_peminjam}}">
                                </div>
                            </div>
                            <div class="col-md-4  mt-5">
                                <div class="form-group">
                                    <label>No HP Peminjam :</label>
                                    <input class="form-control" type="number" name="no_hp" id="isi_materi2" value="{{$data->no_hp}}">
                                </div>

                            </div>

                            <div class="col-md-4  mt-5">
                                <div class="form-group">
                                    <label>Status Buku :</label>
                                    <select class="form-control" name="status_buku" id="status_buku">
                                        <option value="dipinjam">Dipinjam</option>
                                        <option value="dikembalikan">Dikembalikan</option>
                                        <option value="hilang">Hilang</option>

                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6  mt-5">

                                <div class="form-group">
                                    <label>Alamat Peminjam:</label>
                                    <textarea class="form-control" name="alamat" id="isi_materi3">{{$data->alamat}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6  mt-5">
                                <div class="form-group">
                                    <label>Judul Buku Dipinjam:</label>
                                    <textarea class="form-control" name="judul_buku" id="isi_materi4">{{$data->judul_buku}}"</textarea>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5  mt-5">

                                <div class="form-group">
                                    <label>Kategori Buku:</label>
                                    <input class="form-control" name="kategori" id="isi_materi5" value="{{$data->kategori}}">
                                </div>
                            </div>
                            <div class="col-md-4  mt-5">

                                <div class="form-group">
                                    <label>Kode Referensi :</label>
                                    <input class="form-control" name="kode_referensi" id="isi_materi6" value="{{$data->kode_referensi}}">
                                </div>
                            </div>
                            <div class="col-md-3  mt-5">

                                <div class="form-group">
                                    <label>Lama Peminjaman(Bulan):</label>
                                    <input type="number" class="form-control" name="lama_peminjaman" id="isi_materi7" value="{{$data->lama_peminjaman}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6  mt-5">

                                <div class="form-group">
                                    <label>Catatan (Tidak Wajib Diisi):</label>
                                    <textarea class="form-control" name="catatan">{{$data->catatan}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-3  mt-5">

                                <div class="form-group">
                                    <label>Tanggal Peminjaman</label>
                                    <input class="form-control" disabled type="text" name="" id="" value="{{date('Y-m-d', strtotime($data->created_at))}}">
                                </div>
                            </div>
                            <div class="col-md-3  mt-5">

                            <div class="form-group">
                                <label>Tanggal Pengembalian</label>
                                <input class="form-control" type="date" name="tanggal_pengembalian" id="isi_materi5" value="{{$data->tanggal_pengembalian}}">
                            </div>
                            </div>
                        </div>


                    </form>
                    <div class="form-group text-center">
                        <button onclick="submitMateri()" class="btn btn-info btn-sm">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




@endsection

@section('js')
<script type="text/javascript">
       document.getElementById('status_buku').value = "{{$data->status_buku}}";
    function submitMateri() {
        if ($('#isi_materi').val() == "" || $('#isi_materi2').val() == "" || $('#isi_materi3').val() == "" || $('#isi_materi4').val() == "" || $('#isi_materi5').val() == "" ||
            $('#isi_materi6').val() == "" || $('#isi_materi7').val() == "") {
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
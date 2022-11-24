@extends('admin.template.master')
@section('judul','Materi')

@section('content')
<div class="page-inner mt--5">

    <div class="row">
        <div class="col-md-12">
        Mapel {{$mapel->mapel}}
            <div class="px-3">
                <div class="card-header row" style="border: 1px solid black !important;">

                    <div class="form-group form-inline col-md-4">
                        <label for="carimapel" class="col-md-3 col-sm-4 col-form-label">Cari</label>
                        <div class="col-md-9 col-sm-8 p-0">
                            <input type="text" class="searchbox-input form-control input-full" name="" id="carimapel">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">Tambah Mapel</button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Mapel</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('mapel')}}" id="buatmapel" method="post">
                                        @csrf
                                        <div class="form-group form-inline">
                                            <label for="namamapel" class="col-md-3 col-form-label">Nama</label>
                                            <div class="col-md-9 p-0">
                                                <input type="text" class="form-control input-full w-100" name="mapel" id="namamapel" placeholder="Masukkan Mata Pelajaran">
                                            </div>
                                        </div>

                                        <div class="text-danger invalidmapel d-none">
                                            Mapel Sudah ada
                                        </div>


                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" onclick="tambahMapel()">
                                        Buat</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="editMapel" role="dialog" aria-labelledby="editMapel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Mapel</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" id="updatemapel" method="post">
                                        @method("patch")
                                        @csrf
                                        <div class="form-group form-inline">
                                            <label for="namamapel" class="col-md-3 col-form-label">Nama</label>
                                            <div class="col-md-9 p-0">
                                                <input type="text" class="form-control input-full" name="mapel" id="editnamamapel" placeholder="Enter Input">
                                            </div>
                                        </div>




                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" onclick="document.getElementById('updatemapel').submit()">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Hapus-->
                    <div class="modal fade" id="hapusmapel" role="dialog" aria-labelledby="editMapel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" id="deletemapel" method="post">
                                        @method("delete")
                                        @csrf
                                    </form>
                                    <span>Apakah Anda Mau menghapus Mapel <span class="map"></span> ?</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-danger" onclick="document.getElementById('deletemapel').submit()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div>

                <div class="row listmapel mt-3">

                @foreach($materi as $v)


                    <div class="mapel card-stats card-round col-sm-12 col-md-3">
                        <div class="card card-body">
                            <div class="float-right py-2 mt--2">
                                <i onclick="hapus('{{$v->id}}','{{$v->mapel}}')" class="fa fa-trash float-right text-danger"></i>
                                <i onclick="hapus('{{$v->id}}','{{$v->mapel}}')" class="fa fa-edit float-right text-primary"></i>

                            </div>
                            <a href="{{url('mapel_materi',$v->id)}}"  class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-info bubble-shadow-large">
                                        <!-- <i class="fa fa-book"></i> -->
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                    <p class="card-category">BAB {{$v->bab}}</p>
                                        <p class="card-category">{{$v->judul}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

@endforeach






                </div>

            </div>
        </div>
    </div>

</div>
@endsection

@section('js')



<script type="text/javascript">
    @if(session()->has('message'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{session()->get('message')}}",
    })
    @endif

    function tambahMapel() {
        $('#buatmapel .input-full').removeClass('is-invalid')
        if ($('#buatmapel .input-full').val() == "") {
            $('#buatmapel .input-full').addClass('is-invalid')
        } else {
            $("#buatmapel").submit()
        }
    }

    function edit(id, mapel) {
        $("#updatemapel #editnamamapel").val(mapel)
        $("#updatemapel").attr("action", "{{url('mapel')}}" + "/" + id)
        $("#editMapel").modal("show")
    }

    function hapus(id, mapel) {
        $("#hapusmapel .map").html(mapel)
        $("#deletemapel").attr("action", "{{url('mapel')}}" + "/" + id)
        $("#hapusmapel").modal("show")
    }

    $('.searchbox-input').keyup(function() {
        $('.mapel').removeClass('d-none');
        var filter = $(this).val(); // get the value of the input, which we filter on
        $('.listmapel').find('.mapel .card-body .row .col-stats .numbers:not(:contains("' + filter + '"))').parent().parent().parent().parent().addClass('d-none');
    })
    $.expr[":"].contains = $.expr.createPseudo(function(arg) {
        return function(elem) {
            return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
        };
    });
</script>



@endsection
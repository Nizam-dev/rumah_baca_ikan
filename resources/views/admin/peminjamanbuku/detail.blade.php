@extends('admin.template.master')



@section('content')
<div class="row">
    <a href="{{ url('admin-peminjaman-buku') }}" class="btn btn-primary"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
<br>
<div class="row">
 <div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <h4 style="color: #141b44">Data Peminjam</h4>
    </div>

      
      <div class="row match-height">
        <!-- Greetings Card starts -->
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card">
            <div class="card-body text-left">


              <div class="text-left">
                <div class="row">

                  <div class="col-lg-6">
                   <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>Nama Peminjam</th>
                        <th>:</th>
                        <td>{{$data->nama_peminjam}}</td>
                      </tr> 

                      <tr>
                        <th>Judul Buku Dipinjam</th>
                        <th>:</th>
                        <td>{{$data->judul_buku}}</td>
                      </tr> 

                      <tr>
                        <th>Alamat Peminjam</th>
                        <th>:</th>
                        <td>{{$data->alamat}}</td>
                      </tr>

                  

                      <tr>
                        <th>No HP Peminjam</th>
                        <th>:</th>
                        <td>{{$data->no_hp}}</td>
                      </tr>

                    </table>
                  </div>
                </div>


                <div class="col-lg-6">
                 <div class="table-responsive">
                  <table class="table table-striped">
                    <tr>
                      <th>Kategori Buku</th>
                      <th>:</th>
                      <td>{{$data->kategori}}</td>
                    </tr> 

                    <tr>
                      <th>Kode Referensi</th>
                      <th>:</th>
                      <td>{{$data->kode_referensi}}</td>
                    </tr> 

                    <tr>
                      <th>Lama Peminjaman(Bulan)</th>
                      <th>:</th>
                      <td>{{$data->lama_peminjaman}}</td>
                    </tr> 

                    <tr>
                      <th>Catatan</th>
                      <th>:</th>
                      <td>{{$data->catatan}}</td>
                    </tr> 

                    


                  </table>
                </div>
              </div>
            </div>

        
         </div>
       </div>
     </div>
   </div>
 </div>



</div>
</div>
</div>
</div>


@endsection



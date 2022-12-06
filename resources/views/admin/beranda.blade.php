@extends('admin.template.master')
@section('judul','Beranda ')

@section('content')


<div class="container-fluid">



    <div class="row">

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Siswa</div>
                         
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$siswa}}</div>
                         
                        
                        
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-users fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Quiz Game</div>
                            
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$game}}</div>
                       
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-games fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Mata Pelajaran</div>
                            
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mapel}}</div>
                         
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-book fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>
@endsection


@section('js')



@endsection
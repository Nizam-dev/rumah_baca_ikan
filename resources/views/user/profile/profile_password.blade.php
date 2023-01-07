@extends('user.template.master2')
@section('titlepage','Ganti Password')
@section('content')


<div class="section mb-5 p-2">
    <form action="{{route('user.ganti_password.update')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-body">

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="no_hp">Masukan Password Baru</label>
                        <input type="password" class="form-control"
                            name="password"
                            id="password" placeholder="***********" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>


            </div>
        </div>



        <div class="form-button-group transparent">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Simpan</button>
        </div>

    </form>
</div>



@endsection

@push('js')

@endpush
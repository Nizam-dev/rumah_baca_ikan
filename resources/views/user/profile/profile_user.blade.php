@extends('user.template.master2')
@section('titlepage','Akun Saya')
@section('content')


<div class="section mb-5 p-2">
    <form action="{{route('user.profile.update')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-body">

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email">Email</label>
                        <input type="email" class="form-control"
                            value="{{auth()->user()->email }}" name="email"
                            id="email" placeholder="Email">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="name">Nama</label>
                        <input type="text" class="form-control"
                            value="{{auth()->user()->name}}" name="name"
                            id="name" placeholder="Nama">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="no_hp">No Hp</label>
                        <input type="text" class="form-control"
                            value="{{ auth()->user()->no_hp }}" name="no_hp"
                            id="no_hp" placeholder="No Hp">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="no_hp">Alamat</label>
                        <textarea name="alamat"  class="form-control">{{ auth()->user()->alamat }}</textarea>
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
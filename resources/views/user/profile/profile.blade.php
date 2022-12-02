@extends('user.template.master2')
@section('titlepage','Kelas')
@section('content')

<div class="section mt-2 text-center">
    @if(!auth()->user()->profile)
    <h6 class="text-danger">Harap Lengkapi Kelas terlebih dahulu!</h6>
    @endif
</div>


<div class="section mb-5 p-2">
    <form action="{{route('user.kelas.update')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-body">

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="jenjang">Jenjang</label>
                        <select name="jenjang" id="jenjang" name="jenjang" class="form-control">
                            @foreach($jenjang as $j)
                            <option value="{{$j->id}}" @if(auth()->user()->profile) {{ auth()->user()->profile->jenjang == $j->id ? 'selected' : ''  }} @endif >{{$j->jenjang}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="kelas">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control">

                        </select>
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

<script>

    $(document).ready(async function (){
        await get_kelas()
        @if(auth()->user()->profile)
         $("#kelas").val(`{{auth()->user()->profile->kelas}}`)
        @endif
    })
    $("#jenjang").on('change', () => {
        get_kelas()
    })

    async function get_kelas() {
        let jenjang = $("#jenjang").val()
        await axios.get(`{{url('get-kelas')}}/${jenjang}`)
            .then(res => {
                $("#kelas").empty()
                res.data.map(data => {
                    $("#kelas").append($('<option>', {
                        value: data.id,
                        text: data.kelas
                    }))
                })
            })
    }
</script>

@endpush
@extends('user.template.master2')
@section('backlink',route('user.beranda'))
@section('titlepage','Konsultasi ')

@section('content')





<div id="pesan_saya">

    @foreach($chats as $chat)

    @if($chat->from == 1)

    <div class="message-item">
        <!-- <img src="{{asset('public/FINAPP/assets/img/sample/avatar/avatar1.jpg')}}" alt="avatar" class="avatar"> -->
        <div class="content">
            <div class="title">Admin</div>
            <div class="bubble">
                {{$chat->message}}
            </div>
            <div class="footer">10:44 AM</div>
        </div>
    </div>

    @elseif($chat->from == auth()->user()->id)

    <div class="message-item user">
        <div class="content">
            <div class="bubble">
                {{$chat->message}}
            </div>
            <div class="footer">10:46 AM</div>
        </div>
    </div>

    @endif

    @endforeach


</div>



<!-- chat footer -->
<div class="chatFooter">
    <a href="#" class="btn btn-icon btn-text-secondary rounded">
        <ion-icon name="person-circle-outline"></ion-icon>
    </a>
    <div class="form-group basic">
        <div class="input-wrapper">
            <input type="text" class="form-control" placeholder="Type a message..." id="input_text">
            <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
            </i>
        </div>
    </div>
    <button type="button" class="btn btn-icon btn-primary rounded" id="btn_kirim_pesan">
        <ion-icon name="arrow-forward-outline"></ion-icon>
    </button>
</div>

@endsection

@push('js')
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>

<script>
    var receiver_id = '1';
    window.scrollTo(0, document.body.scrollHeight);

    var my_id = "{{ auth()->user()->id }}";

    var pusher = new Pusher('b9d94eabe092892ba8d2', {
        cluster: 'ap1',
        forceTLS: true
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function (data) {

        if (my_id == data.to) {
            console.log(data)
            $("#pesan_saya").append(`
            <div class="message-item">
                <!-- <img src="{{asset('public/FINAPP/assets/img/sample/avatar/avatar1.jpg')}}" alt="avatar" class="avatar"> -->
                <div class="content">
                    <div class="title">Admin</div>
                    <div class="bubble">
                        ${data.message.message}
                    </div>
                    <div class="footer">10:44 AM</div>
                </div>
            </div>
            `)
            window.scrollTo(0, document.body.scrollHeight);

        }

    });

    $("#input_text").keyup(function (e) {
        if (e.keyCode == 13) {
            kirim_pesan()
        }
    });

    $("#btn_kirim_pesan").on('click', () => {
        kirim_pesan()
    })

    function kirim_pesan() {
        let message = $("#input_text").val()
        $("#input_text").val('')
        window.scrollTo(0, document.body.scrollHeight);
        $("#pesan_saya").append(`
            <div class="message-item user">
                <div class="content">
                    <div class="bubble">
                        ${message}
                    </div>
                    <div class="footer">10:46 AM</div>
                </div>
            </div>
            `)
        axios.post("{{url('message')}}", {
                receiver_id: receiver_id,
                message: message
            })
            .then(res => {
                console.log('oke')
            })
            .catch(err => {
                console.log(err)
            })

            window.scrollTo(0, document.body.scrollHeight);

    }
</script>

@endpush
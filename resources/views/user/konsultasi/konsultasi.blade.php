@extends('user.template.master2')
@section('backlink',route('user.beranda'))
@section('titlepage','Konsultasi ')

@section('content')


<div class="message-divider">
            Friday, Sep 20, 10:40 AM
        </div>


        <div class="message-item">
            <img src="{{asset('public/FINAPP/assets/img/sample/avatar/avatar1.jpg')}}" alt="avatar" class="avatar">
            <div class="content">
                <div class="title">John</div>
                <div class="bubble">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </div>
                <div class="footer">10:44 AM</div>
            </div>
        </div>

        <div class="message-item user">
            <div class="content">
                <div class="bubble">
                    Aenean volutpat.
                </div>
                <div class="footer">10:46 AM</div>
            </div>
        </div>

        <div class="message-divider">
            Friday, Sep 21, 7:40 PM
        </div>




        <div class="message-item user">
            <div class="content">
                <div class="bubble">
                    Maecenas sollicitudin justo vel posuere eleifend. In eget iaculis mi, vitae suscipit dui. Phasellus
                    a facilisis magna, eget aliquam turpis. Nullam eros neque, varius vitae commodo blandit, placerat
                    quis est.
                </div>
                <div class="footer">10:40 AM</div>
            </div>
        </div>



        <div class="message-item">
            <img src="{{asset('public/FINAPP/assets/img/sample/avatar/avatar1.jpg')}}" alt="avatar" class="avatar">
            <div class="content">
                <div class="title">John</div>
                <div class="bubble">
                    Aenean hendrerit porttitor dolor id elementum. Mauris nec purus pulvinar, fringilla ex eget,
                    ultrices urna.
                </div>
                <div class="footer">10:40 AM</div>
            </div>
        </div>

  <!-- chat footer -->
  <div class="chatFooter">
        <form>
            <a href="#" class="btn btn-icon btn-text-secondary rounded">
                <ion-icon name="person-circle-outline"></ion-icon>
            </a>
            <div class="form-group basic">
                <div class="input-wrapper">
                    <input type="text" class="form-control" placeholder="Type a message...">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>
            <button type="button" class="btn btn-icon btn-primary rounded">
                <ion-icon name="arrow-forward-outline"></ion-icon>
            </button>
        </form>
    </div>

@endsection

@push('js')



@endpush
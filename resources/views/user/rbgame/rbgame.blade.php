@extends('user.template.master')
@section('content')

<div class="section mt-1 mb-5">
    <div class="section-title">RBGame</div>
    <div class="card">
        <div class="card-body pt-0">

            <ul class="nav nav-tabs lined" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#overview2" role="tab">
                        Game
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#cards2" role="tab">
                        Papan Peringkat
                    </a>
                </li>

            </ul>
            <div class="tab-content mt-2">
                <div class="tab-pane fade show active" id="overview2" role="tabpanel">

                    <ul class="listview image-listview">
                        <li>
                            <a href="#" class="item">
                                <img src="{{asset('public/FINAPP/assets/img/sample/avatar/avatar1.jpg')}}" alt="image"
                                    class="image">
                                <div class="in">
                                    <div>Game A</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <img src="{{asset('public/FINAPP/assets/img/sample/avatar/avatar4.jpg')}}" alt="image"
                                    class="image">
                                <div class="in">
                                    <div>Game B</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <img src="{{asset('public/FINAPP/assets/img/sample/avatar/avatar3.jpg')}}" alt="image"
                                    class="image">
                                <div class="in">
                                    <div>Game C</div>
                                    <span class="badge badge-primary">3</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                </div>


                <div class="tab-pane fade" id="cards2" role="tabpanel">

                    <ul class="listview image-listview">
                        <li>
                            <a href="#" class="item">
                                <img src="{{asset('public/FINAPP/assets/img/sample/avatar/avatar1.jpg')}}" alt="image"
                                    class="image">
                                <div class="in">
                                    <div>John Fonseca</div>
                                    <span class="badge badge-warning"><ion-icon name="trophy-outline"></ion-icon></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <img src="{{asset('public/FINAPP/assets/img/sample/avatar/avatar4.jpg')}}" alt="image"
                                    class="image">
                                <div class="in">
                                    <div>Sophie Silverton</div>
                                    <span class="badge badge-warning"><ion-icon name="trophy-outline"></ion-icon></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <img src="{{asset('public/FINAPP/assets/img/sample/avatar/avatar3.jpg')}}" alt="image"
                                    class="image">
                                <div class="in">
                                    <div>Frank Sjögren</div>
                                    <span class="badge badge-warning"><ion-icon name="trophy-outline"></ion-icon></span>
                                </div>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
</div>


@endsection
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
                        
                        @forelse($games as $game)
                        @if(!$game->quiz_game->isEmpty())
                        <li>
                            <a href="{{route('user.play_game',$game->id)}}" class="item">
                                <img src="{{asset('public/images/rbgame.png')}}" alt="image"
                                    class="image">
                                <div class="in">
                                    <div>{{$game->nama_game}}</div>
                                    @if($game->skor != null)
                                    <span class="badge badge-primary">{{$game->skor}}</span>
                                    @endif
                                </div>
                            </a>
                        </li>
                        @endif
                        @empty
                        <p class="text-center mt-5">Tidak Ada Game</p>
                        @endforelse


                    </ul>

                </div>


                <div class="tab-pane fade" id="cards2" role="tabpanel">

                    <ul class="listview image-listview">

                        @foreach($users as $peringkat=>$user)

                        <li>
                            <a href="#" class="item">
                                <img src="{{asset('public/FINAPP/assets/img/sample/avatar/avatar1.jpg')}}" alt="image"
                                    class="image">
                                <div class="in">
                                    <div>{{$user->name}}</div>
                                    {{ $user->skor }} 
                                    @if($peringkat+1 <= 3 && $user->skor != null) 
                                    <span class="badge badge-warning"><ion-icon name="trophy-outline"></ion-icon>{{$peringkat+1}} </span>
                                    @else
                                    <span class="badge badge-secondary">{{$peringkat+1}}</span>
                                    @endif
                                </div>
                            </a>
                        </li>
            

                        @endforeach
                    </ul>

                </div>

            </div>
        </div>
    </div>
</div>


@endsection
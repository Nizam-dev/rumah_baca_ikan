<div class="appBottomMenu">
    <a href="{{route('user.beranda')}}" class="item {{request()->is(['beranda']) ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="pie-chart-outline"></ion-icon>
            <strong>Home</strong>
        </div>
    </a>
    <a href="{{route('user.mapel')}}" class="item {{request()->is(['mapel']) ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="sparkles-outline"></ion-icon>
            <strong>Mapel</strong>
        </div>
    </a>
    <a href="{{route('user.rbgame')}}" class="item {{request()->is(['rbgame']) ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="game-controller-outline"></ion-icon>
            <strong>RBGame</strong>
        </div>
    </a>

    <a href="{{route('user.akun')}}" class="item {{request()->is(['akun']) ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="person-circle-outline"></ion-icon>
            <strong>Akun</strong>
        </div>
    </a>
</div>
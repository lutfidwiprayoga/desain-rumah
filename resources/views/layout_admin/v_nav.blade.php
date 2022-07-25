<ul class="navbar-nav flex-column">
    <li class="nav-divider">
        Menu
    </li>

    @if (auth()->user()->level==1)
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="/home">
            <i class="fas fa-home"></i>Dashboard</a>
        <div id="submenu-1" class="collapse submenu" style="">
            <ul class="nav flex-column">
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('user') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false"
            data-target="#submenu-6" aria-controls="submenu-6"><i
                class="fas fa-users"></i>User</a>
        <div id="submenu-6" class="collapse submenu" style="">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/desainer">Desainer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/konsumen">Konsumen</a>
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('desain') ? 'active' : '' }}" href="/desain" aria-expanded="false">
            <i class="fas fa-fw fa-columns"></i>Desain</a>
    </li>    

    <li class="nav-item">
        <a class="nav-link {{ request()->is('histori') ? 'active' : '' }}" href="/histori" aria-expanded="false">
            <i class="fas fa-f fa-folder"></i>Histori Transaksi</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('histori') ? 'active' : '' }}" href="/validasi-pembayaran" aria-expanded="false">
            <i class=" fas fa-dollar-sign"></i>Validasi Pembayaran</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('monitoring') ? 'active' : '' }}" href="/monitoring" aria-expanded="false">
            <i class=" fas fa-spinner"></i>Monitoring</a>
    </li>

    @elseif(auth()->user()->level==2)
    <li class="nav-item">
        <a class="nav-link {{ request()->is('desains') ? 'active' : '' }}" href="/dashboard-desainer" aria-expanded="false">
            <i class="fas fa-home"></i>Dashboard</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('order') ? 'active' : '' }}" href="/order" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-shopping-bag"></i>Pesanan</a>
        <div id="submenu-2" class="collapse submenu" style="">
            <ul class="nav flex-column">            
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('desainer.riwayat')}}">Riwayat Pesanan</a>
                    </li> 
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('desains') ? 'active' : '' }}" href="/desains" aria-expanded="false">
            <i class="fas fa-plus-circle"></i>Tambah Desain</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('portfolio') ? 'active' : '' }}" href="/desainer/portfolio" aria-expanded="false">
            <i class="fas fa-plus-circle"></i>Portfolio</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('desains') ? 'active' : '' }}" href="/upload-desain" aria-expanded="false">
            <i class="far fa-clock"></i>Progres Desain</a>
    </li>
    
    @elseif(auth()->user()->level==3)
    <li class="nav-item">
        <a class="nav-link {{ request()->is('desain-proses') ? 'active' : '' }}" href="/desain-proses" aria-expanded="false">
            <i class="fas fa-clock"></i>Proses</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('desain-selesai') ? 'active' : '' }}" href="/desain-selesai" aria-expanded="false">
            <i class="fas fa-check"></i>Selesai</a>
    </li>

    @endif
</ul>
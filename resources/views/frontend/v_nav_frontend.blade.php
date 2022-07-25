<div class="nav-item">
    <div class="container">
        <div class="nav-depart">
            <div class="depart-btn">
                <i class="ti-menu"></i>
                <span value="kategori">Kategori</span>
                    @php
                        $kategori = \App\Models\Kategori::get();
                    @endphp
                <ul class="depart-hover">
                    @foreach ($kategori as $kt)
                        <li><a href="{{ url('pemesanan/kategori/'.$kt->id)}}">{{ $kt->nama }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <nav class="nav-menu mobile-menu">
            <ul>
                <li class="{{ Request::is('/') ? 'active' : ''}}"><a href="{{ url('/')}}">Beranda</a></li>
                <li class="{{ Request::is('pemesanan') ? 'active' : ''}}"><a href="/pemesanan">Pemesanan</a></li>
                <li class="{{ Request::is('contact') ? 'active' : ''}}"><a href="/contact">Contact</a></li>
                <li>
                    
                    @guest
                    <a href="#">Login/Register</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <a href="#">{{ auth()->user()->name }}</a>
                        <ul class="dropdown">
                            <li><a href="{{route('profile.get')}}">Profil</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endguest
                    </ul>
                </li>                
            </ul>
        </nav>
    </div>
</div>
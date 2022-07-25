{{-- @extends('frontend.v_pemesanan')

@section('content')

@foreach ($latests as $lt)
        <div class="product-list">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ asset('foto_desain/' . $lt->foto_desain) }}" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="quick-view"><a href="{{ url('pemesanan/desain/'.$lt->id) }}">Detail</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{ $lt->kategori->nama }}</div>
                            <a href="#">
                                <h5>{{ $lt->nama }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ asset('foto_desain/' . $lt->foto_desain) }}" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="quick-view"><a href="{{ url('pemesanan/desain/'.$lt->id) }}">Detail</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{ $lt->kategori->nama }}</div>
                            <a href="#">
                                <h5>{{ $lt->nama }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            <div class="col-lg-4 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ asset('foto_desain/' . $lt->foto_desain) }}" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <<li class="quick-view"><a href="{{ url('pemesanan/desain/'.$lt->id) }}">Detail</a></li>
                            </ul>
                        </div>
                    <div class="pi-text">
                        <div class="catagory-name">{{ $lt->kategori->nama }}</div>
                        <a href="#">
                            <h5>{{ $lt->nama }}</h5>
                        </a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach
@endsection --}}
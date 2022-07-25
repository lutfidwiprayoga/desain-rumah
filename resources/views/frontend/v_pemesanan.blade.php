@extends('frontend.v_index')

@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span>Pemesanan</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                <div class="filter-widget">
                    <h4 class="fw-title">Gaya Bangunan</h4>
                    <ul class="filter-catagories">
                        @php
                            $kategoris = \App\Models\Kategori::orderBy('nama', 'asc')->get();
                        @endphp

                        @foreach ($kategoris as $item)
                            <li>
                                <a href="{{ url('pemesanan/kategori/'.$item->id) }}">{{ $item->nama }} ({{ $item->desains->count() }})</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                {{-- <div class="filter-widget">
                    <h4 class="fw-title">Price</h4>
                    <div class="filter-range-wrap">
                        <div class="range-slider">
                            <div class="price-input">
                                <input type="text" id="minamount">
                                <input type="text" id="maxamount">
                            </div>
                        </div>
                        <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="33" data-max="98">
                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                        <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div></div>
                    </div>
                    <a href="#" class="filter-btn">Filter</a>
                </div> --}}
            </div>

            {{-- sorting produk --}}
            <div class="col-lg-9 order-1 order-lg-2">

                @yield('content')

                {{-- produk list --}}
        <div class="product-list">
            <div class="row">
                @foreach ($latests as $lt)
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ asset('foto_desain/' . $lt->foto_desain) }}" alt="">
                            <ul>
                                <li class="w-icon active">
                                    <form method ="POST" action="{{ url('pemesanan/add-cart/') }}">
                                        @csrf
                                        <input hidden type="text" name="desain_id" value="{{ $lt->id }}">
                                    </form>
                                </li>
                                {{-- <li class="w-icon active"><a href="{{ url('pemesanan/add-cart/' . $lt->id) }}"><i class="icon_bag_alt"></i></a></li> --}}
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
                @endforeach
            </div>
        </div>
        
    </div>
</section>
@endsection
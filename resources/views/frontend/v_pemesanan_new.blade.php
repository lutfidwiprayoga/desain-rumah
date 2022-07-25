@extends('frontend.v_index')

@section('content')

<div class="product-list">
    <div class="row">
        @foreach ($user as $lt)
        <div class="col-md-4">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="{{ asset('foto/' . $lt->foto) }}" alt="">
                    <ul>
                        <li class="w-icon active">
                            {{-- <form method ="GET" action="/pemesanan/info">
                                @csrf
                                <input hidden type="text" name="desain_id" value="">
                            </form> --}}
                        </li>
                        {{-- <li class="w-icon active"><a href="{{ url('pemesanan/add-cart/' . $lt->id) }}"><i class="icon_bag_alt"></i></a></li> --}}
                        <li class="quick-view"><a href="{{ route('info.desainer',$lt->id) }}">Detail</a></li>
                    </ul>
                </div>
                <div class="pi-text">
                    {{-- <div class="catagory-name"></div> --}}
                    <a href="#">
                        <h5>{{ $lt->name }}</h5>
                    </a>
                </div>                        
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
@extends('frontend.v_index')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="pills-regular">
            <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="profile" aria-selected="false">Desain</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="contact" aria-selected="false">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact2-tab" data-toggle="pill" href="#pills-contact2" role="tab" aria-controls="contact2" aria-selected="false">Review</a>
                </li>
            </ul>
                <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>{{$user_desainer->profile}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="product-list">
                                    <div class="row">
                                        @foreach ($produk as $lt)
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
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="row">
                                @foreach ($desainer as $item)
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{url('portfolio/' . $item->portfolio)}}" class="card-img-top">
                                        <div class="card-body">
                                            <p class="card-text">{{$item->caption}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact2-tab">
                            
                        </div>
                </div>
        </div>
    </div>
</div>


@endsection
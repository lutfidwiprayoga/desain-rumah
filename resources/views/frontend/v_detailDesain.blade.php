@extends('frontend.v_index')

@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <a href="/pemesanan">Pemesanan</a>
                    <span>Detail Desain</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="filter-widget">
                    <h4 class="fw-title">Gaya Bangunan</h4>
                    <ul class="filter-catagories">
                        @php
                            $kategoris = \App\Models\Kategori::orderBy('nama', 'asc')->get();
                        @endphp
    
                        @foreach ($kategoris as $kt)
                        <li>
                            <a href="{{ url('pemesanan/kategori/'.$kt->id) }}">{{ $kt->nama }} ({{ $kt->desains->count() }})</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                {{-- <form method="POST" action="{{ url('pemesanan/add-cart/') }}">
                    @csrf --}}
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="{{ asset('foto_desain/' . $dd->foto_desain) }}" alt="{{ $dd->nama }}">
                        </div>
                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                <div class="pt">
                                    <img src="{{ asset('foto_desain/' . $dd->foto_desain) }}" alt="" data-toggle="modal" data-target="#fotoDesain">
                                </div>
                                <div class="pt">
                                    <img src="{{ asset('tampak_samping_kiri/' . $dd->tampak_samping_kiri) }}" data-toggle="modal" data-target="#tampakSampingKiri">
                                </div>
                                <div class="pt">
                                    <img src="{{ asset('tampak_samping_kanan/' . $dd->tampak_samping_kanan) }}" data-toggle="modal" data-target="#tampakSampingKanan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <h3>{{ $dd->nama }}</h3>
                            </div>
                            {{-- <div class="pd-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>(5)</span>
                            </div> --}}
                            <div class="pd-desc">
                                <h5>Starting Price</h5>
                                <h5>Rp.{{ number_format($dd->harga) }}</h5>
                            </div>

                            {{-- custom design --}}                            
                            {{-- <div class="pd-size">
                                <div class="pd-size choose">
                                    <h6>Jendela</h6>
                                    <div class="d-flex flex-row bd-highlight mb-3">
                                        <div>                                
                                            <input type="radio" name="jendela" value="1">
                                            <label for="jendela">1</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="jendela" value="2">
                                            <label for="jendela">2</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="jendela" value="3">
                                            <label for="jendela">3</label>
                                        </div>
                                    </div>
                                </div>                
                            </div>
                            
                            <div class="pd-size">
                                <div class="pd-size choose">
                                    <h6>Pintu</h6>
                                    <div class="d-flex flex-row bd-highlight mb-3">
                                        <div>                                
                                            <input type="radio" name="pintu" value="1">
                                            <label for="pintu">1</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="pintu" value="2">
                                            <label for="pintu">2</label>
                                        </div>
                                    </div>                                                                       
                                </div>                
                            </div>

                            <div class="pd-size">
                                <div class="pd-size choose">
                                    <h6>Kamar Mandi</h6>
                                    <div class="d-flex flex-row bd-highlight mb-3">
                                        <div>                                
                                            <input type="radio"name="kamar_mandi" value="dalam">
                                            <label for="kamar mandi">Dalam</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="kamar_mandi" value="luar">
                                            <label for="kamar mandi">Luar</label>
                                        </div> 
                                    </div>                                                                      
                                </div>                
                            </div> --}}
                            
                            <div class="quantity">
                                    <input hidden type="text" name="desain_id" value="{{ $dd->id }}">
                                <button class="primary-btn pd-cart" data-target="#negosiasi" data-toggle="modal">Place to Bid</button>
                            </div>
                            <ul class="pd-tags">
                                <li><span>Kategori</span>: {{ $dd->kategori->nama }}</li>
                                <li><span>Tipe</span>: {{ $dd->tipe }}</li>                                
                                <li><span>Desainer</span>: {{ $dd->user->name}}</li>
                            </ul>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>

                <div class="product-tab">
                    <div class="tab-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                            </li>                            
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <h5>Deskripsi</h5>
                                            <p>{{ $dd->keterangan }} </p>
                                        </div>
                                        <div class="col-lg-5">
                                            <img src="img/product-single/tab-desc.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Foto -->
<div class="modal fade" id="fotoDesain" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
            <img src="{{ url('foto_desain/' . $dd->foto_desain) }}" width="100%">
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="tampakSampingKiri" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
            <img src="{{ url('tampak_samping_kiri/' . $dd->tampak_samping_kiri) }}" alt="">
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="tampakSampingKanan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
            <img src="{{ url('tampak_samping_kanan/' . $dd->tampak_samping_kanan) }}" alt="">
        </div>
      </div>
    </div>
  </div>
<!--Modal Nego-->
  <div class="modal fade" id="negosiasi" tabindex="-1" aria-labelledby="negosiasiLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{route('tumbas')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="permintaan">Request Anda</label>
                        <textarea name="permintaan" placeholder="" class="form-control" id="permintaan" aria-valuetext="{{old('permintaan')}}"></textarea>
                        <label for="harga">Budget yang dimiliki</label>
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Rp." value="{{old('harga')}}">
                        <input hidden type="text" name="desain_id" value="{{ $dd->id }}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  @endsection
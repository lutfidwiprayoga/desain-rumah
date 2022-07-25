@extends('frontend.v_index')
@section('content')
    <section class="checkout-section spad">
        <div class="container">
            <form action="#" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">                        
                        <h4>Biiling Details</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="fir">Nama Lengkap<span>*</span></label>
                                <input type="text" id="fir" value="{{$carts->user->name}}" readonly>
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Email</label>
                                <input type="text" id="zip" value="{{$carts->user->email}}" readonly>
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Jenis Kelamin</label>
                                <input id="cun-name" value="{{$carts->user->jenis_kelamin}}" readonly>
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Alamat<span>*</span></label>
                                <input type="text" id="cun" value="{{$carts->user->alamat}}" readonly>
                            </div>
                            <div class="col-lg-12">
                                <label for="town">No Hp<span>*</span></label>
                                <input type="text" id="town" value="{{$carts->user->no_hp}}" readonly>
                            </div>                                                        
                        </div>
                    </div>
            </form>        
                    <div class="col-lg-6">                        
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                        {{-- @if($transaksi != null) --}}
                            <form action="/checkout/{{$transaksi->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <ul class="order-table">
                                    <li>Product</li>
                                    <li class="fw-normal">Nama Desain <span>{{$carts->desain->nama}}</span></li>
                                    <li class="fw-normal">Gaya bangunan <span>{{$carts->desain->kategori->nama}}</span></li>
                                    <li class="fw-normal">Tipe Desain <span>{{$carts->desain->tipe}}</span></li>
                                    <li class="total-price">Total <span>Rp. {{number_format($carts->harga)}}</span></li>                                
                                    <li>Upload Bukti Pembayaran</li>
                                    <p>Silahkan Transfer ke No Rekening ini.</p>
                                    <p>No. REK 1801469189 a/n Artech BCA</p>
                                    <li class="fw-normal"><input type="file" name="bukti_pembayaran"></li>
                                </ul>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Bayar Sekarang</button>
                                </div>
                            </form>
                        {{-- @endif --}}
                            </div>
                        </div>
                    </div>
                </div>            
        </div>
    </section>
@endsection

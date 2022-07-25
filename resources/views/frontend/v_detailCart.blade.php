@extends('frontend.v_index')

@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <a href="/pemesanan">Pemesanan</a>
                    <span>Detail Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>                                                                
                                <th>Nama Desain</th>
                                <th>Pintu</th>
                                <th>Jendela</th>
                                <th>Kamar Mandi</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                                <th>Checkout</th>
                            </tr>
                        </thead>   
                        @php
                            $total = 0;    
                        @endphp
                            <tbody> 
                                @foreach ($koclok as $dt)
                                    @php
                                        $total += $dt->harga;
                                    @endphp          
                                    <tr>
                                        {{-- <td class="">
                                            <img src="img/cart-page/product-1.jpg" alt="">
                                        </td> --}}                                        
                                        <td class="">
                                            <h5>{{ $dt->desain->nama }}</h5>
                                        </td>
                                        <td class="">
                                            <h5>{{ $dt->pintu }}</h5>
                                        </td>
                                        <td class="">
                                            <h5>{{ $dt->jendela }}</h5>
                                        </td>
                                        <td class="">
                                            <h5>{{ $dt->kamar_mandi }}</h5>
                                        </td>
                                        <td class="">Rp.{{ number_format($dt->harga) }}</td>                                
                                            {{-- <td class="total-price first-row">Rp.{{ number_format($dt->harga) }}</td> --}}
                                        <td class="close-td first-row">
                                            <a class="cart-delete" href="{{ url('pemesanan/delete-cart/'. $dt->id) }}"><i class="ti-close"></i></a>
                                        </td>
                                            {{-- @foreach($dt->transaksis as $it) --}}
                                        <td>
                                            <a href="{{route('checkout.edit', $dt->id)}}">
                                                <button class="btn btn-outline-dark">Checkout</button>
                                            </a>
                                        </td>
                                            {{-- @endforeach --}}
                                    </tr>                                
                                @endforeach
                            </tbody>
                    </table>
                </div>
                {{-- <div class="row">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="cart-total">Total <span>Rp.{{ number_format($total)}}</span></li>
                            </ul>
                            <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
@endsection
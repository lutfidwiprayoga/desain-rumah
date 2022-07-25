@extends('frontend.v_index')

@section('content')
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>                                
                                <th>Nama Pesanan</th>                                
                                <th>Tanggal Pesan</th>
                                <th>Status Transaksi</th>
                                <th>Bukti Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>   
                        @php
                            $total = 0;    
                        @endphp
                            <tbody> 
                                @foreach ($cart as $dt)
                                    @php
                                        $total += $dt->harga;
                                    @endphp          
                                    <tr>                                        
                                        <td class="">
                                            <h5>{{ $dt->desain->nama }}</h5>
                                        </td>
                                        <td class="">
                                            <h5>{{ date('l, d F Y',strtotime($dt->transaksi->tanggal_pesan ))}}</h5>
                                        </td>
                                        <td class="">
                                            <h5>{{ $dt->transaksi->status_transaksi }}</h5>
                                        </td>
                                        <td class="">
                                            <img src="{{ url('bukti_pembayaran/'. $dt->transaksi->bukti_pembayaran) }}" width="100px" height="100px">
                                        </td>                                        
                                        <td class="close-td first-row">
                                            <a class="btn btn-primary btn-sm" href="{{route('revisi.edit',$dt->id)}}">Lihat Progres</a>
                                        </td>                                        
                                    </tr>                                
                                @endforeach
                            </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
</section>
@endsection
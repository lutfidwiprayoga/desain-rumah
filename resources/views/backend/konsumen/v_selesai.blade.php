@extends('frontend.v_index')
@section('content')

<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table table-striped table-bordered">
                    <table>
                        <thead>
                            <tr>          
                                <th>No</th>                      
                                <th>Nama Desain</th>                                
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Tanggal Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>                           
                            <tbody> 
                                <?php $no = 1; ?>
                                @foreach ($selesai as $se)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $se->desain->nama }}</td>
                                        <td>{{ $se->desain->kategori->nama}}</td>                    
                                        <td>Rp.{{ number_format($se->harga) }}</td>
                                        <td>{{ date('l, d F Y',strtotime($se->transaksi->tanggal_pesan ))}}</td>                    
                                        <td class="text-center">                                                                               
                                            <a href ="{{route('cetak.pdf', $se->id)}}" class="btn btn-sm btn-success">Download</a>                                             
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
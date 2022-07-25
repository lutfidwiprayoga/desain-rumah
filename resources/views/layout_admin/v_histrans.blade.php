@extends('layout_admin.v_template')
@section('content')
<h1>Histori Transaksi</h1>
<div class="card">    
    <div class="card-body">
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">{{ __('Nama Lengkap') }}</label>
                <div class="col-md-6">
                    <input class="form-control" value="{{ $detail->user->name }}" readonly>                    
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">{{ __('Nama Desain') }}</label>
                <div class="col-md-6">
                    <input class="form-control" value="{{ $detail->desain->nama }}" readonly>                   
                </div>
            </div>            

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">{{ __('Harga') }}</label>
                <div class="col-md-6">
                    <input class="form-control" value="Rp. {{number_format($detail->desain->harga) }}" readonly>                    
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">{{ __('Tipe Desain') }}</label>
                <div class="col-md-6">
                    <input class="form-control" value="{{ $detail->desain->tipe }}" readonly>                    
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">{{ __('Status Transaksi') }}</label>
                <div class="col-md-6">
                    <input class="form-control" value="{{ $detail->transaksi->status_transaksi }}" readonly>                   
                </div>
            </div>            

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">{{ __('Tanggal Pesan') }}</label>
                <div class="col-md-6">
                    <input class="form-control" value="{{ date("l , d F Y ", strtotime($detail->transaksi->tanggal_pesan)) }}" readonly>                    
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">{{ __('Bukti Pembayaran') }}</label>
                <div class="col-md-6">
                    <img src="{{url('bukti_pembayaran/' . $detail->transaksi->bukti_pembayaran) }}" width="300px" readonly>                                       
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <a href="/histori" class="btn btn-primary">
                        Kembali
                    </a>
                </div>
            </div>              
    </div>
</div>
@endsection
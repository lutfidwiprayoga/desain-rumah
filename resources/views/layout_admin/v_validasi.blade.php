@extends('layout_admin.v_template')

@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
                <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped table-bordered first dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead align="center">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 5px;">No</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Keterangan: activate to sort column ascending" style="width: 100px;">Status Transaksi</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 100px;">Nama Konsumen</th>                             
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Harga: activate to sort column ascending" style="width: 100px;">Harga</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" style="width: 100px;">Bukti Pembayaran</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 100px;">Aksi</th>
                        </thead>
                        <tbody align="center">
                            <?php $no = 1; ?>
                                @foreach ($cart as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->transaksi->status_transaksi }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>Rp.{{ number_format($data->harga) }}</td>                            
                                    <td><img src="{{ asset('bukti_pembayaran/' . $data->transaksi->bukti_pembayaran)}}" width="150px" data-toggle="modal" data-target="#buktipembayaran{{ $data->id }}"></td>
                                    <td class="text-center"> 
                                        
                                            <a type="button" href="{{route('payment.acc', $data->id)}}" class="btn btn-sm btn-success">
                                                <i class="fas fa-check-circle"></i>
                                            </a>
                                            <a type="button" href="{{route('payment.decline', $data->id)}}" class="btn btn-sm btn-danger">
                                                <i class="fas fa-times-circle"></i>
                                            </a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

{{-- modal --}}
@foreach ($cart as $data)
<div class="modal fade" id="buktipembayaran{{ $data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">        
        <div class="modal-body">
            <img src="{{ url('bukti_pembayaran/' . $data->transaksi->bukti_pembayaran)}}" width="100%">
        </div>        
      </div>
    </div>
  </div>
@endforeach
@endsection
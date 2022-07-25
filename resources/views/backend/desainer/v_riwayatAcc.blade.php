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
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 100px;">Nama Konsumen</th>                             
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 100px;">Kategori</th>                             
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 100px;">Desain Yang Dipilih</th>                             
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Harga: activate to sort column ascending" style="width: 100px;">Harga</th>                                
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 100px;">Status</th>
                        </thead>
                        <tbody align="center">
                            <?php $no = 1; ?>
                            @foreach ($carts as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->desain->kategori->nama}}</td>                    
                                    <td>{{ $item->desain->nama}}</td>                    
                                    <td>Rp.{{ number_format($item->harga) }}</td>                                                                                               
                                    <td class="text-center">                                         
                                            <button class="btn btn-sm btn-success">{{$item->transaksi->status_desainer}}</button>
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
@endsection
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
                        </div>
                        <thead align="center">
                            <tr role="row">
                                <th class="sorting_asc" style="width: 5px;">No</th>                                
                                <th class="sorting" style="width: 100px;">Nama Konsumen</th>                             
                                <th class="sorting" style="width: 100px;">Kategori</th>                             
                                <th class="sorting" style="width: 100px;">Desain Yang Dipilih</th>                             
                                <th class="sorting" style="width: 100px;">Harga</th>                                
                                <th class="sorting" style="width: 100px;">Status</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($cart as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->desain->kategori->nama}}</td>                    
                                    <td>{{ $item->desain->nama}}</td>                    
                                    <td>Rp.{{ number_format($item->harga) }}</td>                                                                                               
                                    <td class="text-center">                                         
                                            <button class="btn btn-sm btn-success">{{$item->transaksi->status_desainer}}</button>
                                            <a href="{{route('progres.upload', $item->id)}}" class="btn btn-sm btn-primary">Progress</a>
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
@endsection
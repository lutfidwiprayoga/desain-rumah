@extends('layout_admin.v_template')
@section('content')
    <h1>Monitoring Progres</h1>
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
                                        <th class="sorting" style="width: 100px;">Nama Desain</th>                             
                                        <th class="sorting" style="width: 100px;">Desainer</th>                             
                                        <th class="sorting" style="width: 100px;">Harga</th>                                
                                        <th class="sorting" style="width: 100px;">Progres</th>
                                    </tr>
                                </thead>
                            <tbody align="center">
                                <?php $no = 1; ?>
                                @foreach ($cart as $ker)                                
                                <tr>                                        
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $ker->user->name }}</td>
                                        <td>{{ $ker->desain->nama}}</td>                    
                                        <td>{{ $ker->desain->user->name}}</td>                    
                                        <td>Rp.{{ number_format($ker->harga) }}</td>                                                           
                                        <td>{{ $ker->transaksi->status_progres }}</td>                                                                                            
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
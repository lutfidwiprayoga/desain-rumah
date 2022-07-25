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
                                    <th class="sorting" style="width: 100px;">Budget Konsumen</th>                                
                                    <th class="sorting" style="width: 100px;">Permintaan</th>
                                    <th class="sorting" style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                        <tbody align="center">
                            <?php $no = 1; ?>
                                <tr>
                                    @if ($carts)
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $carts->user->name }}</td>
                                    <td>{{ $carts->desain->kategori->nama}}</td>                    
                                    <td>{{ $carts->desain->nama}}</td>                    
                                    <td>Rp.{{ number_format($carts->harga) }}</td>                                                         
                                    <td>{{ ($carts->permintaan)}}</td>                                                         
                                    <td class="text-center">                                         
                                            <a type="button" href="{{route('desainer.acc', $carts->id)}}" class="btn btn-sm btn-success">
                                                <i class="fas fa-check-circle"></i>
                                            </a>
                                            {{-- <a type="button" href="{{route('desainer.decline', $carts->id)}}" class="btn btn-sm btn-danger">
                                                <i class="fas fa-times-circle"></i>
                                            </a> --}}
                                    </td>
                                    @endif                
                                </tr>
                        </tbody>
                    </table>   
                </div>                     
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layout_admin.v_template')
@section('content')
    <h1>Tambah Portfolio</h1>
    <a href="/portfolio/add" class="btn btn-primary btn-sm">Tambah</a>
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
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" style="width: 100px;">Caption</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 100px;">Portfolio</th>
                            </thead>
                            <tbody align="center">

                                <?php $no = 1; ?>
                                @foreach ($desainer as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->caption }}</td>                                                                        
                                    <td><img src="{{ asset('portfolio/' . $data->portfolio) }}" width=150px></td>
                                    {{-- <td class="text-center"> 
                                        
                                            <a type="button" href="/desains/edit/{{ $data->id }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type ="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            
                                    </td> --}}
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
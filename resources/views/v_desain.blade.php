@extends('layout_admin.v_template')

@section('content')
    <h1>Desain</h1>
    {{-- <a href="/desain/add" class="btn btn-primary btn-sm">Tambah</a> --}}
    @if (session('pesan'))
    <div class="alert alert-icon">
<button type="button" class="close" data-dismiss="alert" aria-label="close">
<span aria-hidden="true">&times;</span>
</button>
<i class="mdi mdi-check-all"></i>
<strong></strong>{{session('pesan')}}
    </div>
    @endif
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                        </div>
                    </div>
                    <div class="table-responsive">
                        {{-- <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="DataTables_Table_0_length">
                                    <label>Show<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0">
                                    </label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered first dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead align="center">
                                <tr role="row">
                                    <th class="sorting_asc" style="width: 5px;">No</th>                                    
                                    <th class="sorting" style="width: 100px;">Nama</th>
                                    <th class="sorting" style="width: 100px;">Kategori</th>
                                    <th class="sorting" style="width: 100px;">Tipe</th>
                                    <th class="sorting" style="width: 100px;">Harga</th>
                                    <th class="sorting" style="width: 100px;">Keterangan</th>
                                    <th class="sorting" style="width: 100px;">Foto Desain</th>
                                    <th class="sorting" style="width: 100px;">Tampak Kiri</th>
                                    <th class="sorting" style="width: 100px;">Tampak Kanan</th>
                                    <th class="sorting" style="width: 100px;">Desainer</th>                                    
                            </thead>

                            <tbody align="center">
                                <?php $no = 1; ?>
                                @foreach ($desains as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>                                    
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->kategori->nama }}</td>
                                    <td>{{ $data->tipe }}</td>
                                    <td>Rp.{{ number_format($data->harga) }}</td>
                                    <td>{{ $data->keterangan }}</td>
                                    <td><img src="{{ asset('foto_desain/' . $data->foto_desain) }}" width=150px></td>
                                    <td><img src="{{ asset('tampak_samping_kiri/' . $data->tampak_samping_kiri )}}" width="150px"></td>
                                    <td><img src="{{ asset('tampak_samping_kanan/' . $data->tampak_samping_kanan)}}" width="150px"></td>                                    
                                    <td>{{ $data->user->name }}</td>                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Modal --}}
                        {{-- @foreach ($desain as $data)
                        <div class="modal fade" id="delete{{ $data->id }}">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content bg-default">
                                <div class="modal-header">
                                <h4 class="modal-title">Hapus Desain</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <p>
                                    Apakah Anda Ingin Menghapus Desain Ini ?
                                </p>
                                </div>
                                <div class="modal-footer">
                                    <a href="/desain/delete/{{ $data->id }}" class="btn btn-success">Yes</a>    
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach --}}
                        {{-- End Modal --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
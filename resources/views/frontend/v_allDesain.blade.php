@extends('layout_admin.v_template')
@section('content')

<a href="/desains/add" class="btn btn-primary btn-sm">Tambah</a>
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
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered first dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" style="width: 5px;">No</th>
                                    <th class="sorting" style="width: 100px;">ID</th>
                                    <th class="sorting" style="width: 100px;">Nama</th>
                                    <th class="sorting" style="width: 100px;">Kategori</th>
                                    <th class="sorting" style="width: 100px;">Tipe</th>
                                    <th class="sorting" style="width: 100px;">Harga</th>
                                    <th class="sorting" style="width: 100px;">Keterangan</th>
                                    <th class="sorting" style="width: 100px;">Foto Desain</th>
                                    <th class="sorting" style="width: 100px;">Tampak Kiri</th>
                                    <th class="sorting" style="width: 100px;">Tampak Kanan</th>
                                    <th class="sorting" style="width: 100px;">Aksi</th>
                            </thead>
                            <tbody>

                                <?php $no = 1; ?>
                                @foreach ($desains as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->kategori->nama }}</td>
                                    <td>{{ $data->tipe }}</td>
                                    <td>Rp.{{ number_format($data->harga) }}</td>
                                    <td>{{ $data->keterangan }}</td>
                                    <td><img src="{{ asset('foto_desain/' . $data->foto_desain) }}" width=150px></td>
                                    <td><img src="{{ asset('tampak_samping_kiri/' . $data->tampak_samping_kiri )}}" width="150px"></td>
                                    <td><img src="{{ asset('tampak_samping_kanan/' . $data->tampak_samping_kanan)}}" width="150px"></td>
                                    <td class="text-center"> 
                                        
                                            <a type="button" href="/desains/edit/{{ $data->id }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type ="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Modal --}}
                        @foreach ($desains as $data)
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
                                    <form method="POST" action="{{ url('desains/delete', $data->id) }}">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-success">Yes</button>
                                    </form>  
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- End Modal --}}

                    </div>
                </div>                                
            </div>
        </div>
    </div>
@endsection
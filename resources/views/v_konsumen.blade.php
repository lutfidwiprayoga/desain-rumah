@extends('layout_admin.v_template')

@section('content')

    <h1>Konsumen</h1>
    
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead align="center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody align="center">
                                <?php $no = 1; ?>
                                @foreach ($user as $items)
                                <tr>  
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $items->name }}</td>
                                    <td>{{ $items->email }}</td>
                                <td>
                                    <a type="button" href="/konsumen/detail/{$data->id}" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail{{ $items->id }}"><i class="fas fa-info" aria-hidden="true"></i></a>
                                    {{-- <a type="button" href="" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> --}}
                                </td>
                                </tr>
                                @endforeach
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        @foreach ($user as $items)
        <div class="modal fade" id="detail{{ $items->id }}">
            <div class="modal-dialog modal-md">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Profil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <p>
                    <tr>
                        <th width="100px">Nama Desainer :</th>
                        <th width="30px"></th>
                        <th>{{ $items->name}}</th>
                    </tr>
                    <br>

                    <tr>
                        <th width="100px">Email Desainer : </th>
                        <th width="30px"></th>
                        <th>{{ $items->email}}</th>
                    </tr>
                    <br>

                    <tr>
                        <th width="100px">No Handphone : </th>
                        <th width="30px"></th>
                        <th>{{ $items->no_hp}}</th>
                    </tr>
                    <br>

                    <tr>
                        <th width="100px">Alamat : </th>
                        <th width="30px"></th>
                        <th>{{ $items->alamat}}</th>
                    </tr>
                    <br>

                    <tr>
                        <th width="100px">NIK : </th>
                        <th width="30px"></th>
                        <th>{{ $items->nik}}</th>
                    </tr>
                    <br>

                    <tr>
                        <th width="100px">Jenis Kelamin : </th>
                        <th width="30px"></th>
                        <th>{{ $items->jenis_kelamin}}</th>
                    </tr>
                    <br>

                    <tr>
                        <th width="100px">Foto</th>
                        <th width="30px">:</th>
                        <th><img src="{{ asset('foto/' . $items->foto) }}" width=100px></th>
                    </tr>
                </p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
        @endforeach
        {{-- End Modal --}}
@endsection
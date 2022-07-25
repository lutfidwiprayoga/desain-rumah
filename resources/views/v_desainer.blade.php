@extends('layout_admin.v_template')

@section('content')

        <h1>Desainer Artech</h1>

  {{-- <a href="/desainer/add" class="btn btn-primary btn-sm">Tambah</a> --}}

  @if (session('pesan'))
    <div class="alert alert-success" role="alert">
        {{ session('pesan') }}
    </div>
  @endif
  
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><br>
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
                                @foreach ($user as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a type="button" href="/desainer/detail/{$data->id}" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail{{ $item->id }}"><i class="fas fa-info" aria-hidden="true"></i></a>
                                        <a type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $item->id }} "><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Detail --}}
        @foreach ($user as $item)
        <div class="modal fade" id="detail{{ $item->id }}">
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
                          <th>{{ $item->name}}</th>
                      </tr>
                      <br>

                      <tr>
                          <th width="100px">Email Desainer : </th>
                          <th width="30px"></th>
                          <th>{{ $item->email}}</th>
                      </tr>
                      <br>

                      <tr>
                        <th width="100px">No Handphone : </th>
                        <th width="30px"></th>
                        <th>{{ $item->no_hp}}</th>
                      </tr>
                      <br>

                      <tr>
                        <th width="100px">Alamat : </th>
                        <th width="30px"></th>
                        <th>{{ $item->alamat}}</th>
                      </tr>
                      <br>

                      <tr>
                        <th width="100px">NIK : </th>
                        <th width="30px"></th>
                        <th>{{ $item->nik}}</th>
                      </tr>
                      <br>

                      <tr>
                        <th width="100px">Jenis Kelamin : </th>
                        <th width="30px"></th>
                        <th>{{ $item->jenis_kelamin}}</th>
                      </tr>
                      <br>

                      <tr>
                        <th width="100px">Nomor Rekening : </th>
                        <th width="30px"></th>
                        <th>{{ $item->no_rekening}}</th>
                      </tr>
                      <br>

                      <tr>
                          <th width="100px">Foto</th>
                          <th width="30px">:</th>
                          <th><img src="{{ asset('foto/' . $item->foto) }}" width=200px></th>
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
        {{-- End Modal Detail--}}

        {{-- Delete  --}}
        @foreach ($user as $item)
        <div class="modal fade" id="delete{{ $item->id }}">
            <div class="modal-dialog modal-md">
              <div class="modal-content bg-default">
                <div class="modal-header">
                  <h4 class="modal-title">Hapus Profil</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>
                    <h4>Apakah Anda yakin ingin menghapus data ini ?</h4>
                      <tr>
                          <th width="100px">Nama Desainer :</th>
                          <th width="30px"></th>
                          <th>{{ $item->name}}</th>
                      </tr>
                      <br>
                      <tr>
                          <th width="100px">Email Desainer : </th>
                          <th width="30px"></th>
                          <th>{{ $item->email}}</th>
                      </tr>
                      <br>

                      <tr>
                          <th width="100px">Foto</th>
                          <th width="30px">:</th>
                          <th><img src="{{ asset('foto/' . $item->foto) }}" width=100px></th>
                      </tr>
                  </p>
                </div>
                <div class="modal-footer">
                  <form method="POST" action="{{ route('admin.desainer.delete', $item->id)}}">
                    @csrf                    
                    <button type="submit" class="btn btn-primary">Hapus</button>
                  </form>
                  <button type="button" class="btn btn-secondary btn-mod" data-dismiss="modal">Batal</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
@endsection

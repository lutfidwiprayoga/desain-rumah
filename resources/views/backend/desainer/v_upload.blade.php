@extends('layout_admin.v_template')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
    <div class="section-block">
        <h5 class="section-title">Progres Desain</h5>        
    </div>
    <div class="pills-regular">
        <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="home" aria-selected="true">Progres 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="profile" aria-selected="false">Progres 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="contact" aria-selected="false">Progres 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact2-tab" data-toggle="pill" href="#pills-contact2" role="tab" aria-controls="contact2" aria-selected="false">Final Desain</a>
            </li>
        </ul>
            <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <form action="{{route('progres1.update', $cart->id)}}" method="POST" enctype="multipart/form-data">   
                                @csrf
                                @if ($cart->transaksi->status_progres == null)
                                <input type="file" class="form-control" name="progres_1" value="{{old('progres_1')}}">
                                <br>
                                <h5>Komentar</h5>
                                <input class="form-control" value="{{$progres->komentar_1}}" disabled>
                                <br>
                                <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
                                @else
                                <input type="text" class="form-control" name="progres_1" value="{{$progres->progres_1}}" readonly>
                                <br>
                                <h5>Komentar</h5>
                                <input class="form-control" value="{{$progres->komentar_1}}" disabled>
                                <br>
                                @endif
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form action="{{route('progres2.update', $cart->id)}}" method="POST" enctype="multipart/form-data">   
                                @csrf
                                @if ($cart->transaksi->status_progres == 'Mengerjakan Progres 1')
                                <input type="file" class="form-control" name="progres_2" value="{{old('progres_2')}}">
                                <br>
                                <h5>Komentar</h5>
                                <input type="text" class="form-control" value="{{$progres->komentar_2}}" disabled>
                                <br>
                                <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
                                @else
                                <input type="text" class="form-control" name="progres_2" value="{{$progres->progres_2}}" readonly>
                                <br>
                                <h5>Komentar</h5>
                                <input class="form-control" value="{{$progres->komentar_2}}" disabled>
                                <br>
                                @endif
                            </form>
                        </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <form action="{{route('progres3.update', $cart->id)}}" method="POST" enctype="multipart/form-data">   
                            @csrf
                            @if ($cart->transaksi->status_progres == 'Mengerjakan Progres 2')
                            <input type="file" class="form-control" name="progres_3" value="{{old('progres_3')}}">
                            <br>
                            <h5>Komentar</h5>
                            <input type="text" class="form-control" value="{{$progres->komentar_3}}" disabled>
                            <br>
                            <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
                            @else
                            <input type="text" class="form-control" name="progres_3" value="{{$progres->progres_3}}" readonly>
                            <br>
                            <h5>Komentar</h5>
                            <input class="form-control" value="{{$progres->komentar_3}}" disabled>
                            <br>
                            @endif
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact2-tab">
                        <form action="{{route('final.desain', $cart->id)}}" method="POST" enctype="multipart/form-data">   
                            @csrf
                            @if ($cart->transaksi->status_progres == 'Mengerjakan Progres 3')
                            <input type="file" class="form-control" name="final_desain" value="{{old('final_desain')}}">
                            <br>                            
                            <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
                            @else
                            <input type="text" class="form-control" name="final_desain" value="{{$progres->final_desain}}" readonly>
                            @endif
                        </form>
                    </div>
            </div>
    </div>
</div>
@endsection
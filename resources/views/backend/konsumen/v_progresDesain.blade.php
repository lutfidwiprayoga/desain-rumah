@extends('frontend.v_index')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
    <div class="section-block">
        <h5 class="section-title">Progres Desain</h5>        
    </div>
    <div class="pills-regular">
        <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="home" aria-selected="true">Revisi 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="profile" aria-selected="false">Revisi 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="contact" aria-selected="false">Revisi 3</a>
            </li>            
        </ul>
            <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <form action="{{route('revisi.post1',$progres->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <img src="{{url('progres_1/'. $progres->progres_1)}}" class="progres" width="100px" height="100px">
                            <br>
                            <h5>Komentar</h5>
                            <input class="form-control" name="komentar_1">
                            <br>
                            <button type="submit" class="btn btn-primary ">Kirim</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form action="{{route('revisi.post2',$progres->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <img src="{{url('progres_2/'. $progres->progres_2)}}" class="progres" width="100px" height="100px">
                            <br>
                            <h5>Komentar</h5>
                            <input type="text" class="form-control" name="komentar_2">
                            <br>
                            <button type="submit" class="btn btn-primary ">Kirim</button>
                        </form>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <form action="{{route('revisi.post3',$progres->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <img src="{{url('progres_3/'. $progres->progres_3)}}" class="progres" width="1000px" height="1000px">
                            <br>
                            <h5>Komentar</h5>
                            <input type="text" class="form-control" name="komentar_3">
                            <br>
                            <button type="submit" class="btn btn-primary ">Kirim</button>
                        </form>
                        </div>                        
            </div>
    </div>
</div>   
@endsection
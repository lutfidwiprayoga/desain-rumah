@extends('frontend.v_index')

@section('content')
<section class="hero-section">
  <div class="hero-items owl-carousel">
      <div class="single-hero-items set-bg" data-setbg="{{ asset('template_frontend')}}/img/tentang.jpg">
          <div class="container">
          </div>
      </div>
  </div>
</section>
<!-- Hero Section End -->

<section class="about_section layout_padding">
  <div class="side_img">
    <img src="images/side-img.png" alt="">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="img_container">
          <div class="img-box b1">
            <img src="{{ asset('template_frontend')}}/img/register.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              Tentang Griya Artech
            </h2>
            <p>Griya Artech hadir untuk menjadi jembatan desainer dengan konsumen yang membutuhkan jasa untuk
              merancang rumah impian Anda. Disini Anda akan menemukan desainer profesional jadi terdapat jaminan bahwa layanan kami dapat memuaskan Anda.</p>
            <p>Layanan kami menyesuaikan dengan budget Anda sehingga tidak perlu khawatir kekurangan biaya. Konsultasikan perencanaan dengan kami
              secara gratis, kami akan memberikan arahan serta rekomendasi yang sesuai dengan keinginan Anda.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('title')}}/title.png" type="image/title-icon">
    <title>Solusi Rumah Impian Anda</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('template_frontend')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template_frontend')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template_frontend')}}/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template_frontend')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template_frontend')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template_frontend')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template_frontend')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template_frontend')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template_frontend')}}/css/style.css" type="text/css">
</head>

<body>
    
    @inject('cart', 'App\Models\Cart')

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="/">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon">                                
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    @if (auth()->user()!= null)
                                    <span>{{$koclok->count()}}</span>
                                    @endif
                                    
                                </a>
                                
                                <div class="cart-hover">
                                    <div class="select-items">
                                        @if (auth()->user() != null)
                                            @foreach ($koclok as $item)
                                                <table>
                                                    <tbody>
                                                        <tr>                                                            
                                                            <td class="si-text">
                                                                <div class="product-selected">
                                                                    {{-- <p>Rp. {{number_format($item->desain->harga)}}</p>
                                                                    <h6>{{ $item->desain->nama }}</h6> --}}
                                                                </div>
                                                            </td>                                                    
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        {{-- <h5>Rp.{{ number_format($subTotal) }}</h5> --}}
                                    </div>
                                    <div class="select-button">
                                        <a href="{{ url('pemesanan/detail-cart') }}" class="primary-btn view-card">VIEW CART</a>
                                    </div>
                                </div>
                            </li>
                            {{-- <li class="cart-price">Rp.{{ number_format($subTotal) }}</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('frontend.v_nav_frontend')
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    @yield('content')
    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-widget">
                            <h5>Hubungi Kami</h5>
                            <ul>
                                <li>Alamat: Banyuwangi, Jawa Timur, Indonesia</li>                            
                                <li>Email: griya.artech@gmail.com</li>
                                <li>Phone: +62 823-331-696-953</li>
                            </ul>
                        </div>                        
                        {{-- <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-2">
                    <div class="footer-widget">
                        <h5>Informasi</h5>
                        <ul>
                            <li><a href="/">Tentang Kami</a></li>
                            <li><a href="#">Syarat dan Ketentuan</a></li>
                            <li><a href="/contact">Contact</a></li>                          
                        </ul>
                    </div>
                </div>                
                <div class="col-lg-3 offset-lg-1">
                    <div class="newslatter-item">
                        <h5>Saran dan Masukan</h5>
                        <p>Berikan saran dan masukan Anda untuk kami.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Masukkan email">
                            <button type="button">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">                           
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Griya Artech Indonesia
                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('template_frontend')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('template_frontend')}}/js/bootstrap.min.js"></script>
    <script src="{{ asset('template_frontend')}}/js/jquery-ui.min.js"></script>
    <script src="{{ asset('template_frontend')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('template_frontend')}}/js/jquery.zoom.min.js"></script>
    <script src="{{ asset('template_frontend')}}/js/jquery.slicknav.js"></script>
    <script src="{{ asset('template_frontend')}}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('template_frontend')}}/js/main.js"></script>

    {{-- confirm delete --}}

    <script type="text/javascript">
        $(document).ready(function(){
            $('.cart-delete').click(function(e){
                var conf = confirm('Yakin Dihapus?');
                if(conf){

                }else{
                    e.preventDefault();
                }
            })
        })
    </script>
</body>

</html>
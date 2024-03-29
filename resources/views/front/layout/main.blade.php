<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">


    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{ url('assets/img/logo','favicon.ico')}}" />


   </head>

   <body>

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ url('assets/img/logo','logo.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">

               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                                <div class="logo">
                                  <a href="{{url('/')}}"><img src="{{ url('assets/img/logo','logo.png')}}" width="150px" alt=""></a>

                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-8 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{url('/')}}">Página inicial</a></li>
                                            <li><a href="{{url('/produtos')}}">Loja</a></li>

                                            <li><a href="{{url('/sobre')}}">Sobre</a></li>
                                            @auth
                                                <li><a href="{{ url('minhaconta/pedidos') }}">Minha Conta</a></li>
                                                <li class="show-login"><a href="Galeria.html">{{Auth::user()->name}}</a></li>
                                                <ul class="submenu">

                                                    <li><a class="dropdown-item" href="{{ url('minhaconta/pedidos') }}">Minha conta</a></li>
                                                    <li><a class="dropdown-item" href="href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>


                                                </ul>
                                            @endauth

                                            @guest
                                                <li><a href="{{route('login')}}">Login</a></li>
                                                <li><a href="{{route('register')}}">Cadastrar</a></li>
                                            @endguest




                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <div class="col-xl-6 col-lg-3 col-md-3 col-sm-3 fix-card">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between padding-modify">

                                    <li class="d-none d-xl-block">
                                        <div class="form-box f-right " style="min-width: 250px;">
                                            <input type="text" name="Search" placeholder="Busque produtos">
                                            <div class="search-icon">
                                                <i class="fas fa-search special-tag"></i>
                                            </div>
                                        </div>
                                     </li>

                                    <li>
                                        <div class="favorit-items" style="--x:  {{Cart::count()}}">
                                            <a href="{{ route('carrinho.index') }}"><i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </li><li>
                                        <div class="dropdown hide-button">
                                            @auth
                                                <button class="btn header-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" fon>
                                                {{Auth::user()->name}}
                                              </button>
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ url('minhaconta/pedidos') }}">Minha conta</a>
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>

                                              </div>
                                            @endauth
                                            @guest
                                                <li class="d-none d-lg-block"> <a href="{{ route('login') }}" class="btn header-btn">Login</a></li>
                                                <li class="d-none d-lg-block"> <a href="{{ route('register') }}" class="btn header-btn">Registro</a></li>
                                            @endguest
                                          </div>

                                    </li>

                                </ul>
                            </div>

                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>
    @yield('content')
    <footer>
		<!-- Footer Start-->
		<div class="footer-area footer-padding footer-color">
			<div class="container">
				<div class="row d-flex justify-content-between">

				</div>
				<div class="row">
                    <div class="col-xl-3 col-lg-3 col-sm-3">
                        <div style="padding-top: 15px; ">
                            <img src="{{ url('assets/img/logo','logo.png')}}"  height="50px" alt="">
                        </div>

                    </div>
					<div class="col-xl-6 col-lg-6 col-sm-3">
                        <div class="footer-copy-right">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos direitos reservados | APJ
                        </div>


					</div>

                </div>

			</div>
		</div>

		<!-- Footer End-->
	</footer>

     <!-- JS here -->

         <!-- All JS Custom Plugins Link Here here -->
         <script src="{{asset('/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
         <script src="{{asset('/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
         <script src="{{asset('/assets/js/popper.min.js')}}"></script>
         <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
         <script src="{{asset('/assets/js/jquery.slicknav.min.js')}}"></script>
         <script src="{{asset('/assets/js/owl.carousel.min.js')}}"></script>
         <script src="{{asset('/assets/js/slick.min.js')}}"></script>
         <script src="{{asset('/assets/js/wow.min.js')}}"></script>
         <script src="{{asset('/assets/js/animated.headline.js')}}"></script>
         <script src="{{asset('/assets/js/jquery.magnific-popup.js')}}"></script>
         <script src="{{asset('/assets/js/jquery.scrollUp.min.js')}}"></script>
         <script src="{{asset('/assets/js/jquery.sticky.js')}}"></script>
         <script src="{{asset('/assets/js/contact.js')}}"></script>
         <script src="{{asset('/assets/js/jquery.form.js')}}"></script>
         <script src="{{asset('/assets/js/jquery.validate.min.js')}}"></script>
         <script src="{{asset('/assets/js/mail-script.js')}}"></script>
         <script src="{{asset('/assets/js/jquery.ajaxchimp.min.js')}}"></script>
         <script src="{{asset('/assets/js/plugins.js')}}"></script>
         <script src="{{asset('/assets/js/main.js')}}"></script>
         <script src="{{asset('/assets/js/jquery.mask.js')}}"></script>
         <script src="{{asset('/assets/js/jquery-3.5.1.min.js')}}"></script>
         <script src="{{asset('/assets/js/minhacontacripts.js')}}"></script>

     </body>
 </html>

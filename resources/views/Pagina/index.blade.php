<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Aria is a business focused HTML landing page template built with Bootstrap to help you create lead generation websites for companies and their services.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>HEALTH SERVER</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="{{ URL::asset ('Pagina/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset ('Pagina/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ URL::asset ('Pagina/css/swiper.css') }}" rel="stylesheet">
	<link href="{{ URL::asset ('Pagina/css/magnific-popup.css') }}" rel="stylesheet">
	<link href="{{ URL::asset ('Pagina/css/styles.css') }}" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="{{ asset ('Pagina/images/favicon.png') }}">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.html"><img src="{{ asset ('Pagina/images/logo.svg') }}" alt="alternative"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">INICIO<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#intro">SOBRE NOSOTROS</a>
                </li>
                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#" id="#" role="button" aria-haspopup="true" aria-expanded="false">INICIAR SESIÓN</a>
                    <div class="dropdown-menu" aria-labelledby="#">
                        <a class="dropdown-item" href="{{route ('loginmedicos') }}"><span class="item-text">Médico</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="{{route ('vistalogin')}}"><span class="item-text">Paciente</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->
                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#" id="#" role="button" aria-haspopup="true" aria-expanded="false">REGISTRARSE</a>
                    <div class="dropdown-menu" aria-labelledby="#">
                        <a class="dropdown-item" href="{{route ('altamedico')}}"><span class="item-text">Médico</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="{{route ('alta_usuarios')}}"><span class="item-text">Paciente</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->               
            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-container">
                            <h1>HEALTH SERVER <span id="js-rotating">ENCUENTRA EL MEJOR MÉDICO DE TU ZONA.</span></h1>
                            <p class="p-heading p-large">Health Server es un sistema creado para encontrar al médico ideal desde tu hogar con todos los servicios médicos disponibles.</p>
                            
                        </div>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Intro -->
    <div id="intro" class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="text-container">
                        <div class="section-title">SOBRE NOSOTROS</div>
                        <h2>HEALTH SERVER</h2>
                        <p>Health server es un sistema diseñado en tiempos de pandemia y su principal función es el cuidar la salud de nuestros pacientes
                            sin la necesidad de salir de su hogar.</p>
                        <p class="testimonial-text">"TU SALUD ES LO MAS IMPORTANTE PARA NOSOTROS."</p>
                        <div class="testimonial-author">Alexis Morales Bonifacio  - IDGS</div>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7">
                    <div class="image-container">
                        <img class="img-fluid" src="{{ asset ('Pagina/images/medico-intro.jpg') }}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of intro -->


    <!-- Description -->
    <div class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Card -->
                    <div class="card">
                        <span class="fa-stack">
                            <span class="hexagon"></span>
                            <i class="fas fa-binoculars fa-stack-1x"></i>
                        </span>
                        <div class="card-body">
                            <h4 class="card-title">REGISTRATE</h4>
                            <p>Registrate ingresando tus datos para disfrutar de nuestros servicios.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <span class="fa-stack">
                            <span class="hexagon"></span>
                            <i class="fas fa-list-alt fa-stack-1x"></i>
                        </span>
                        <div class="card-body">
                            <h4 class="card-title">BUSCA TU MÉDICO </h4>
                            <p>Encuentra médicos de acuerdo a tu zona y eligue la mejor opción para ti.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <span class="fa-stack">
                            <span class="hexagon"></span>
                            <i class="fas fa-chart-pie fa-stack-1x"></i>
                        </span>
                        <div class="card-body">
                            <h4 class="card-title">AGENDA TU CITA</h4>
                            <p>Agenda tu cita y espera tu confirmación del médico.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of description -->

    <!-- About -->
    <div id="about" class="counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xl-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{ asset ('Pagina/images/medico-imagen.jpg') }}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7 col-xl-6">
                    <div class="text-container">
                        <div class="section-title">NUESTROS SERVICIOS</div>
                        <h2>PERSONAS QUE INTERACTUAN EN NUESTRO SISTEMA</h2>
                                                <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Ten un control de tu salud mas facilmente</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Es importante conocer los médicos que consultas.</div>
                            </li>
                        </ul>

                        <!-- Counter -->
                        <div id="counter">
                            <div class="cell">
                                <div class="counter-value number-count" data-count="231">1</div>
                                <div class="counter-info">Usuarios<br></div>
                            </div>
                            <div class="cell">
                                <div class="counter-value number-count" data-count="121">1</div>
                                <div class="counter-info">Médicos<br></div>
                            </div>
                            <div class="cell">
                                <div class="counter-value number-count" data-count="159">1</div>
                                <div class="counter-info">Buenas<br>Reseñas</div>
                            </div>
                        </div>
                        <!-- end of counter -->

                    </div> <!-- end of text-container -->      
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of counter -->
    <!-- end of about -->


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
              
               
              
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2021 <a href="https://inovatik.com">SMARTSITE</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    	
    <!-- Scripts -->
    <script src="{{ URL:: asset ('Pagina/js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ URL:: asset ('Pagina/js/popper.min.js') }}"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="{{ URL:: asset ('Pagina/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script src="{{ URL:: asset ('Pagina/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ URL:: asset ('Pagina/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ URL:: asset ('Pagina/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{ URL:: asset ('Pagina/js/morphext.min.js') }}"></script> <!-- Morphtext rotating text in the header -->
    <script src="{{ URL:: asset ('Pagina/js/isotope.pkgd.min.js') }}"></script> <!-- Isotope for filter -->
    <script src="{{ URL:: asset ('Pagina/js/validator.min.js') }}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="{{ URL:: asset ('Pagina/js/scripts.js') }}"></script> <!-- Custom scripts -->
</body>
</html>
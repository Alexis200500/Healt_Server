@extends('plantilla')

@section('contenido')

  <!-- Site Icons -->
  <link rel="shortcut icon" href="{{ URL::asset ('Pagina/images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ URL::asset ('Pagina/images/apple-touch-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset ('Pagina/css/bootstrap.min.css') }}">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="{{ URL::asset ('Pagina/css/pogo-slider.min.css') }}">
	<!-- Site CSS -->
    <link rel="stylesheet" href="{{ URL::asset ('Pagina/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href=" {{ URL::asset ('Pagina/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset ('Pagina/css/custom.css') }}">

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-11 ml-auto mr-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                    <?php 
                    $sessionusuario=session('sessionusuario');
                    ?>
                    <center>
                        <h3 class="card-title">Bienvenido <?php echo $sessionusuario?></h3>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
	<!-- Start Team -->
	<div id="team" class="team-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>Nuestros Medicos</h2>
						<p>Conoce nuestros medicos y su especialidad agenda tu cita.</p>
					</div>
				</div>
			</div>

			<div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{ asset ('Pagina/images/img-1.jpg') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Maria Robles</h3>
                            <span class="post">Especialista en médico general</span>
                            <ul class="social">
                            <span class="post">Reserva tu cita medica.</span>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"  width="8" height="8"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{ asset ('Pagina/images/img-2.jpg') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Ricardo Robles Mondragon</h3>
                            <span class="post">Médico en pediatria</span>
                            <ul class="social">
                            <span class="post">Reserva tu cita medica.</span>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"  width="8" height="8"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{ asset ('Pagina/images/img-3.jpg') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Sonia Robles pérez</h3>
                            <span class="post">Médico en pediatria</span>
                            <ul class="social">
                            <span class="post">Reserva tu cita medica.</span>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"  width="8" height="8"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{ asset ('Pagina/images/medico3.jpg') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Sonia Robles pérez</h3>
                            <span class="post">Médico en pediatria</span>
                            <ul class="social">
                            <span class="post">Reserva tu cita medica.</span>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"  width="8" height="8"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{ asset ('Pagina/images/medico2.jpg') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Sonia Robles pérez</h3>
                            <span class="post">Médico en pediatria</span>
                            <ul class="social">
                            <span class="post">Reserva tu cita medica.</span>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"  width="8" height="8"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{ asset ('Pagina/images/medico.jpg') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Sonia Robles pérez</h3>
                            <span class="post">Médico en pediatria</span>
                            <ul class="social">
                            <span class="post">Reserva tu cita medica.</span>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"  width="8" height="8"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

		</div>
	</div>

	<!-- End Team -->


    
	<!-- Start Team -->
	<div id="team" class="team-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>categorias y Especialidades</h2>
						<p>Conoce nuestras categorias que ofrecemos para ti.</p>
					</div>
				</div>
			</div>

			<div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{ asset ('archivos/quirofano.jpg') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Quirofano.</h3>
                            <ul class="social">
                            <span class="post">Reserva tu cita medica.</span>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"  width="8" height="8"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{ asset ('archivos/quirofano.jpg') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Quirofano.</h3>
                            <ul class="social">
                            <span class="post">Reserva tu cita medica.</span>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"  width="8" height="8"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{ asset ('archivos/quirofano.jpg') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Quirofano.</h3>
                            <ul class="social">
                            <span class="post">Reserva tu cita medica.</span>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"  width="8" height="8"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{ asset ('archivos/quirofano.jpg') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Quirofano.</h3>
                            <ul class="social">
                            <span class="post">Reserva tu cita medica.</span>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"  width="8" height="8"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{ asset ('archivos/quirofano.jpg') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Quirofano.</h3>
                            <ul class="social">
                            <span class="post">Reserva tu cita medica.</span>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"  width="8" height="8"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{ asset ('archivos/quirofano.jpg') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Quirofano.</h3>
                            <ul class="social">
                            <span class="post">Reserva tu cita medica.</span>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"  width="8" height="8"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

		</div>
	</div>

	<!-- End Team -->



    <!-- ALL PLUGINS -->
	<script src="{{ URL::asset ('Pagina/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset ('Pagina/js/jquery.pogo-slider.min.js') }}"></script>
	<script src="{{ URL::asset ('Pagina/js/slider-index.js') }}"></script>
	<script src="{{ URL::asset ('Pagina/js/smoothscroll.js') }}"></script>
	<script src="{{ URL::asset ('Pagina/js/TweenMax.min.js') }}"></script>
	<script src="{{ URL::asset ('Pagina/js/main.js') }}"></script>
	<script src="{{ URL::asset ('Pagina/js/owl.carousel.min.js') }}"></script>
	<script src="{{ URL::asset ('Pagina/js/form-validator.min.js') }}"></script>
    <script src="{{ URL::asset ('Pagina/js/contact-form-script.js') }}"></script>
	<script src="{{ URL::asset ('Pagina/js/isotope.min.js') }}"></script>
	<script src="{{ URL::asset ('Pagina/js/images-loded.min.js') }}"></script>
    <script src="{{ URL::asset ('Pagina/js/custom.js') }}"></script>

    <style>
        .team-box
        {
            margin-top:-50px;
        }
        .our-team .pic
        {
          
        }
        .fa 
        {
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            width:30px;
        }
        .team-content{
            margin-top: 10px;
        }
        
    </style>

@stop

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<title>Snapshot</title>
<!--
Snapshot Template
http://www.templatemo.com/tm-493-snapshot

Zoom Slider
https://vegas.jaysalvat.com/

Caption Hover Effects
http://tympanus.net/codrops/2013/06/18/caption-hover-effects/
-->
	<link rel="stylesheet" href="welcome/css/bootstrap.min.css">
	<link rel="stylesheet" href="welcome/css/animate.min.css">
	<link rel="stylesheet" href="welcome/css/font-awesome.min.css">
  	<link rel="stylesheet" href="welcome/css/component.css">
	
    <link rel="stylesheet" href="welcome/css/owl.theme.css">
	<link rel="stylesheet" href="welcome/css/owl.carousel.css">
	<link rel="stylesheet" href="welcome/css/vegas.min.css">
	<link rel="stylesheet" href="welcome/css/style.css">

	<!-- Google web font  -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>
	
</head>
<body id="top" data-spy="scroll" data-offset="50" data-target=".navbar-collapse">


<!-- Preloader section -->

<div class="preloader">
     <div class="sk-spinner sk-spinner-pulse"></div>
</div>


<!-- Navigation section  -->

  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">

      <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
        </button>
        <a href="#top" class="navbar-brand smoothScroll">Snapshot</a>
      </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#top" class="smoothScroll"><span>Home</span></a></li>
            <li><a href="#about" class="smoothScroll"><span>About</span></a></li>
            <li><a href="#gallery" class="smoothScroll"><span>Gallery</span></a></li>
            <li><a href="#contact" class="smoothScroll"><span>Contact</span></a></li>
            <li><a href="{{ route('login') }}" class="smoothScroll"><span>Login</span></a></li>
          </ul>
       </div>

    </div>
  </div>


<!-- Home section -->

<section id="home">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">

      <div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <h1 class="wow fadeInUp" data-wow-delay="0.6s">Let's take a snapshot</h1>
        <p class="wow fadeInUp" data-wow-delay="0.9s">"Snapshot is a website for buying and selling photos and cameras that has been widely used by people."</p>
        <a href="#about" class="smoothScroll btn btn-success btn-lg wow fadeInUp" data-wow-delay="1.2s">Learn more</a>
      </div>

    </div>
  </div>
</section>


<!-- About section -->

<section id="about">
  <div class="container">
    <div class="row">

      @foreach ($background as $bg)
          
      <div class="col-md-9 col-sm-8 wow fadeInUp" data-wow-delay="0.2s">
        <div class="about-thumb">
          <h1>{{ $bg->title }}</h1>
          <p>{{ $bg->deskripsi }}</p>
        </div>
      </div>
      
      <div class="col-md-3 col-sm-4 wow fadeInUp about-img" data-wow-delay="0.6s">
        <img src="{{ asset('storage/images-folder/'.$bg->image) }}" class="img-responsive img-circle" alt="About">
      </div>
      
      <div class="clearfix"></div>
      @endforeach
      
      <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <div class="section-title text-center">
          <h1>Snapshot Team</h1>
          <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
        </div>
      </div>

      @foreach ($team as $tm)
          
      <!-- team carousel -->
      <div id="team-carousel" class="owl-carousel">
        
        <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
          <div class="team-thumb">
          <div class="image-holder">
            <img src="{{ asset('storage/images-folder/'.$tm->images) }}" class="img-responsive img-circle" style="height: 220px; width:220px;" alt="{{ $tm->name }}">
          </div>
          <h2 class="heading">{{ $tm->name }}, {{ $tm->position }}</h2>
          <p class="description">{{ $tm->deskripsi }}</p>
        </div>
      </div>
    </div>
    <!-- end team carousel -->
    
    @endforeach
    </div>
  </div>
</section>


<!-- Gallery section -->

<section id="gallery">
  <div class="container">
    <div class="row">

      <div class="col-md-offset-2 col-md-8 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <div class="section-title">
          <h1>Gallery</h1>
          <p>Nullam scelerisque, quam nec iaculis vulputate, arcu ligula sollicitudin nisl, ac volutpat erat nulla a arcu.</p>
        </div>
      </div>

      <ul class="grid cs-style-4">
        @foreach ($gallery as $gl)
        <li class="col-md-6 col-sm-6">
          <figure>
            <div><img src="{{ asset('storage/images-folder/'.$gl->images) }}" style="height: 315px; width: 500px;" alt="image 1"></div>
            <figcaption>
              <h1>{{ $gl->title }}</h1>
              <small>{{ $gl->deskripsi }}.</small>
              <a href="{{ $gl->url }}">Read More</a>
            </figcaption>
          </figure>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</section>


<!-- Contact section -->

<section id="contact">
  <div class="container">
    <div class="row">

       <div class="col-md-offset-1 col-md-10 col-sm-12">

        <div class="col-lg-offset-1 col-lg-10 section-title wow fadeInUp" data-wow-delay="0.4s">
          <h1>Send a message</h1>
          <p>Nunc suscipit ante in lectus laoreet, nec pharetra diam dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
        </div>

        <form action="#" method="post" class="wow fadeInUp" data-wow-delay="0.8s">
          <div class="col-md-6 col-sm-6">
            <input name="name" type="text" class="form-control" id="name" placeholder="Name">
          </div>
          <div class="col-md-6 col-sm-6">
            <input name="email" type="email" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="col-md-12 col-sm-12">
            <textarea name="message" rows="6" class="form-control" id="message" placeholder="Message"></textarea>
          </div>
          <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
            <input type="submit" class="form-control" value="SEND MESSAGE">
          </div>
        </form>

      </div>

    </div>
  </div>
</section>


<!-- Footer section -->

<footer>
	<div class="container">
    
		<div class="row">

			<div class="col-md-12 col-sm-12">
            
                <ul class="social-icon"> 
                    <li><a href="#" class="fa fa-facebook wow fadeInUp" data-wow-delay="0.2s"></a></li>
                    <li><a href="#" class="fa fa-twitter wow fadeInUp" data-wow-delay="0.4s"></a></li>
                    <li><a href="#" class="fa fa-linkedin wow fadeInUp" data-wow-delay="0.6s"></a></li>
                    <li><a href="#" class="fa fa-instagram wow fadeInUp" data-wow-delay="0.8s"></a></li>
                    <li><a href="#" class="fa fa-google-plus wow fadeInUp" data-wow-delay="1.0s"></a></li>
                </ul>

				<p class="wow fadeInUp"  data-wow-delay="1s" >Copyright &copy; 2024 Snapshot Studio <a href="https://plus.google.com/+templatemo" title="free css templates" target="_blank"></a></p>
                
			</div>
			
		</div>
        
	</div>
</footer>

<!-- Back top -->
<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

<!-- Javascript  -->
<script src="welcome/js/jquery.js"></script>
<script src="welcome/js/bootstrap.min.js"></script>
<script src="welcome/js/vegas.min.js"></script>
<script src="welcome/js/modernizr.custom.js"></script>
<script src="welcome/js/toucheffects.js"></script>
<script src="welcome/js/owl.carousel.min.js"></script>
<script src="welcome/js/smoothscroll.js"></script>
<script src="welcome/js/wow.min.js"></script>
<script src="welcome/js/custom.js"></script>

</body>
</html>
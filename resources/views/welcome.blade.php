<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
              
        <title>IMMS</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
        <link rel="stylesheet" href="./css/lp/bootstrap.min.css">
        <link rel="stylesheet" href="./css/lp/font-awesome.min.css">
        <link rel="stylesheet" href="./css/lp/aos.css">
   
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="./css/lp//tooplate-gymso-style.css">
        

    </head>
    <body class="antialiased">
        

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="index.html">IMMS</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link smoothScroll">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link smoothScroll">Contact</a>
                    </li>
                </ul>

                <ul class="social-icon ml-lg-3">
                    <li><a href="#" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-instagram"></a></li>
                </ul>
                <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif
                            @endif
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </nav>


     <!-- HERO -->
     <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

            <div class="bg-overlay"></div>

               <div class="container">
                    <div class="row">

                         <div class="col-lg-8 col-md-10 mx-auto col-12">
                              <div class="hero-text mt-5 text-center">

                                    <h6 data-aos="fade-up" data-aos-delay="300">Federal Ministry of Humanitarian, Disaster Management and Social Development</h6>

                                    <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">IMs Management System</h1>

                                    <a href="{{ route('login') }}" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">Login</a>

                                    <a href="{{ route('register') }}" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="700">Register</a>
                                   
                              </div>
                         </div>

                    </div>
               </div>
     </section>
     
     <!-- SCRIPTS -->
     <script src="./js/lp/jquery.min.js"></script>
     <script src="./js/lp/bootstrap.min.js"></script>
     <script src="./js/lp/aos.js"></script>
     <script src="./js/lp/smoothscroll.js"></script>
     <script src="./js/lp/custom.js"></script>

    </body>
</html>

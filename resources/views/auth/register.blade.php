<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title>IMs|registration Form</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel='stylesheet prefetch' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>

        <link rel="stylesheet" href="{{asset('regform/css/style.css')}}">

        <link rel="shortcut icon" href="{{asset('regform/favicon.ico')}}" type="image/x-icon">
        <link rel="icon" href="{{asset('regform/favicon.ico')}}" type="image/x-icon">



    </head>

    <body>

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                        
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="main">
            {{-- <h1 class="span12 fs-main-title text-center" ></h1>
            <h2 class="span12 fs-title text-center" style="color: Black">Registration Form</h2> --}}
        </div>
        <!-- MultiStep Form -->
        <div class="row">
            <div class="container">
            <form id="msform" action="submit.php" method="post">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active">Personal Info</li>
                        <li>Contact</li>
                        <li>Address</li>
                        <li>Comment</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Personal Info</h2>
                        <h3 class="fs-subtitle">Tell us about you</h3>
                        <input type="text" name="first_name" placeholder="Your First Name" required=""/>
                        <input type="text" name="middle_name" placeholder="Your Middle Name"/>
                        <input type="text" name="last_name" placeholder="Your Last Name" required=""/>
                        <input type="phone" name="phone" placeholder="Phone" required=""/>
                        <input type="email" name="email" placeholder="Email" required=""/>
                        <button type="button" name="next" class="next action-button">NEXT</button>
                    </fieldset>
                    <fieldset>
                        {{-- <h2 class="fs-title">Contact</h2> --}}
                        <h3 class="fs-subtitle">Provide Contact details</h3>
                        <input type="text" name="first_name" placeholder="Your First Name" required=""/>
                        <input type="text" name="middle_name" placeholder="Your Middle Name"/>
                        <input type="text" name="last_name" placeholder="Your Last Name" required=""/>
                        <input type="phone" name="phone" placeholder="Phone" required=""/>
                        <input type="email" name="email" placeholder="Email" required=""/>
                        <button type="button" name="next" class="next action-button">NEXT</button>
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Address</h2>
                        <h3 class="fs-subtitle">Enter Your Address</h3>
                        <input type="text" name="street" placeholder="Street" required=""/>
                        <input type="text" name="building" placeholder="Building №" required=""/>
                        <input type="text" name="city" placeholder="City" required=""/>
                        <button type="button" name="previous" class="previous action-button-previous">PREVIOUS</button>
                        <button type="button" name="next" class="next action-button">NEXT</button>
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Comment</h2>
                        <h3 class="fs-subtitle">Fill in your comment</h3>
                        <textarea name="comment" placeholder="Comments"></textarea>
                        <button type="button" name="previous" class="previous action-button-previous">PREVIOUS</button>
                        <button type="submit" name="submit" class="submit action-button">SUMBIT</button>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- /.MultiStep Form -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js'></script>


        <script  src="{{ asset('regform/js/index.js')}}"></script>

    </body>

</html>
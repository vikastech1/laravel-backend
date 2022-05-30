<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
         <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.1/build/pure-min.css">

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        <style type="text/css">
            .container{
                    height: 100%;
                    align-content: center;
                    }

                    .card{
                    height: 370px;
                    margin-top: auto;
                    margin-bottom: auto;
                    width: 400px;
                    background-color: rgba(0,0,0,0.5) !important;
                    }

                    .social_icon span{
                    font-size: 60px;
                    margin-left: 10px;
                    color: #FFC312;
                    }

                    .social_icon span:hover{
                    color: white;
                    cursor: pointer;
                    }

                    .card-header h3{
                    color: white;
                    }

                    .social_icon{
                    position: absolute;
                    right: 20px;
                    top: -45px;
                    }

                    .input-group-prepend span{
                    width: 50px;
                    background-color: #FFC312;
                    color: black;
                    border:0 !important;
                    }

                    input:focus{
                    outline: 0 0 0 0  !important;
                    box-shadow: 0 0 0 0 !important;

                    }

                    .remember{
                    color: white;
                    }

                    .remember input
                    {
                    width: 20px;
                    height: 20px;
                    margin-left: 15px;
                    margin-right: 5px;
                    }

                    .login_btn{
                    color: black;
                    background-color: #FFC312;
                    width: 100px;
                    }

                    .login_btn:hover{
                    color: black;
                    background-color: white;
                    }

                    .links{
                    color: white;
                    }

                    .links a{
                    margin-left: 4px;
                    }
                    nav.navbar.navbar-expand-md.navbar-light.bg-white.shadow-sm {
                        margin-bottom: 0px;
                    }
                   footer.py-5.bg-dark {
                        margin-top: 180px;
                    }

        </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="">
                   
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

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                             <li >
                                 <a id="navbarDropdown" class="nav-link " href="http://127.0.0.1:8000/home" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Home
                                </a>
                            </li>
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
                            <li >
                                 <a id="navbarDropdown" class="nav-link " href="http://127.0.0.1:8000/show" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Online Registration
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Welcome Staffs</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Thanks for working with our Company</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="">
           <div class="container-fluid">

                    <!-- Page Heading -->
                   @yield('content')

                </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

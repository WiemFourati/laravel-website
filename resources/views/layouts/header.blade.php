
<!doctype html>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- awesone fonts css-->
    <link href="{{asset('stylefrontoffice/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <!-- owl carousel css-->
    <link rel="stylesheet" href="{{asset('stylefrontoffice/owl-carousel/assets/owl.carousel.min.css')}}" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('stylefrontoffice/css/bootstrap.min.css')}}">
    <!-- custom CSS -->
    <link rel="stylesheet" href="{{asset('stylefrontoffice/css/style.css')}}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('stylefrontoffice/images/index.png')}}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{asset('stylefrontoffice/images/index.png')}}">
	<link rel="icon" type="image/png" href="{{asset('stylefrontoffice/images/index.png')}}" sizes="32x32">
	<link rel="icon" type="image/png" href="{{asset('stylefrontoffice/images/index.png')}}" sizes="16x16">

    <title>ExaDev</title>
    <style>
        hr {
            color : #666666 ;
            font-size : 20 px ;
            margin:   50px 120px  ;
        };

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav">
    <div class="container"><a class="navbar-brand" href="{{asset('/')}}">
    <img src="{{asset('stylefrontoffice/images/index.png')}}" width="130" height="90" class="d-inline-block align-top" alt=""></a>
        <button class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse"><span
                class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span></button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="{{asset('/about')}}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{asset('/services')}}">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{asset('/news')}}">News</a></li>
                <li class="nav-item"><a class="nav-link" href="{{asset('/contact')}}">Contact</a></li>
            </ul>
            <!--<form class="form-inline my-2 my-lg-0"><a href="#"
   class="btn btn-info my-2 my-sm-0 text-uppercase">sign
                up</a>
            </form>-->
                <a href="{{asset('/touslesproduits')}}" class="btn btn-outline-dark my-2 my-sm-0 mr-3 "><i class="fa fa-cart-plus"
                  aria-hidden="true"></i>    Go Shop</a> 
        </div>
    </div>
</nav>
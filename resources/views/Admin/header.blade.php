@include('flash::message') 
<?php 
session_start();
if(!isset($_SESSION["user"])){//is set pour verifier conn du user
    redirect("/Admin");
}?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ExaDev</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('admininterface/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="apple-touch-icon" sizes="57x57" href="{{asset('stylefrontoffice/images/index.png')}}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{asset('stylefrontoffice/images/index.png')}}">
	<link rel="icon" type="image/png" href="{{asset('stylefrontoffice/images/index.png')}}" sizes="32x32">
	<link rel="icon" type="image/png" href="{{asset('stylefrontoffice/images/index.png')}}" sizes="16x16">
  <!-- Custom styles for this template-->
  <link href="{{asset('admininterface/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand <sup>2</sup> -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{asset('/')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ExaDev</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('Admin.index')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>



      
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{asset('/produit')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>produit</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{asset('/client')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Client</span></a>
          <!-- Nav Item - Charts -->
          </li>

      <li class="nav-item">
        <a class="nav-link" href="{{asset('/offre')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>offre</span></a>
      </li>
      

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{asset('/employer')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>employer</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="{{asset('/category')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Category</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"method="get" action="{{route('produit.getSearch')}}">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="nomproduit">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search" >
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{$cmd_number}}</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  nouvelles commandes
                </h6>
                @foreach($commandes as $x)
                <a class="dropdown-item d-flex align-items-center" href="{{asset('/commande')}}">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{$x->nomclient}}</div> wants 
                    {{$x->quantity}} of {{App\produit::findOrFail($x->idproduit)->nomproduit}}
                  </div>
                </a>
                @endforeach
                <a class="dropdown-item text-center small text-gray-500" href="{{asset('/commande')}}">Show All commands</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">{{$message_number}}</span>
              </a>
              <!-- Dropdown - Messages <div class="status-indicator bg-success"></div>-->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                @foreach($messages as $message)
                <a class="dropdown-item d-flex align-items-center" href="{{asset('/inbox')}}">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="{{asset('stylefrontoffice/images/marketing.png')}}" alt="">
                    
                  </div>
                              <div class="font-weight-bold">
                    <div class="text-truncate">{{$message->message}}</div>
                    <div class="small text-gray-500">{{$message->categorie}}</div>
                  </div>
                </a>
                @endforeach
                
                
                
                <a class="dropdown-item text-center small text-gray-500" href="{{asset('/inbox')}}">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin {{Session::get('user')->name}}</span>
                <img class="img-profile rounded-circle" src="{{asset('images/'.Session::get('user')->image_url)}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{asset('/profile')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="{{asset('/profile')}}">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
        
                <div class="dropdown-divider"></div>
                <form action="{{route('Admin.logout')}}" method="post">
                {{ csrf_field() }}
                                  <input class="btn btn-danger" type="submit"  onclick="return confirm('Are you sure to logout?')" value="Logout" />
                              
                               </form>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
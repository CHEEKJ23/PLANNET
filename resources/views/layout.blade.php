<!doctype html>
<html lang="en">
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <style>
      body {
        margin:0;
        padding:0;  
        display:flex;
        flex-direction:column;
        justify-content:space-between;
        min-height:100vh;
        background-color:black;
        max-width: 100%;
        overflow-x: hidden;
        
      }

      main {
        flex:1 0 auto;
      }

      /* .navbar-custom {
        background-color: #6D7993;
      }
      
      .navbar-custom .navbar-nav .nav-link {
        color: #D5D5D5;
      }

      .navbar-custom .nav-item.active .nav-link,
      .navbar-custom .nav-item:focus .nav-link,
      .navbar-custom .nav-item:hover .nav-link {
        color: #ffffff;
      } */

      .navbar-custom {
        background-color: #6D7993;
      }
      
      /* .navbar-custom .navbar-nav .nav-link {
        color: #D5D5D5;
      }

      .navbar-custom .navbar-nav .nav-link.active {
        color: #fff;
      } */

      .nav-link {
        font-size: 16px;   
        color: black;     
      }

      .nav-link:hover {
        color: #ccd0d9;     
      }

      .nav-active {
        color: #fff;
      } 

      /* .navbar-custom .nav-item.active .nav-link,
      .navbar-custom .nav-item:focus .nav-link,
      .navbar-custom .nav-item:hover .nav-link {
        color: #ffffff;
      } */


      footer {
        background: #6D7993;
        margin-top:100px;
        padding-top: 5px;
        color: white;
      }

      .copy {
        font-size: 15px;
        padding: 5px;
        border-top: 2px solid #FFFFFF;
      }

      .copy {
        font-size: 12px;
        padding: 10px;
        border-top: 1px solid #FFFFFF;
      }

      .footer-middle {
        padding-top: 2em;
        color: white;
      }


      /*SOCİAL İCONS*/

      /* footer social icons */

      ul.social-network {
        list-style: none;
        display: inline;
        margin-left: 0 !important;
        padding: 0;
      }

      ul.social-network li {
        display: inline;
        margin: 0 5px;
      }


      /* footer social icons */

      .social-network a.icoFacebook:hover {
        background-color: #3B5998;
      }

      .social-network a.icoLinkedin:hover {
        background-color: #007bb7;
      }

      .social-network a.icoFacebook:hover i,
      .social-network a.icoLinkedin:hover i {
        color: #fff;
      }

      .social-network a.socialIcon:hover,
      .socialHoverClass {
        color: #44BCDD;
      }

      .social-circle li a {
        display: inline-block;
        position: relative;
        margin: 0 auto 0 auto;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        text-align: center;
        width: 30px;
        height: 30px;
        font-size: 15px;
      }

      .social-circle li i {
        margin: 0;
        line-height: 30px;
        text-align: center;
      }

      .social-circle li a:hover i,
      .triggeredHover {
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -ms--transform: rotate(360deg);
        transform: rotate(360deg);
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
        -o-transition: all 0.2s;
        -ms-transition: all 0.2s;
        transition: all 0.2s;
      }

      .social-circle i {
        color: #595959;
        -webkit-transition: all 0.8s;
        -moz-transition: all 0.8s;
        -o-transition: all 0.8s;
        -ms-transition: all 0.8s;
        transition: all 0.8s;
      }

      .social-network a {
        background-color: #F9F9F9;
      }
    </style>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <!--fb icon-->
    <script src="https://kit.fontawesome.com/a0fc59ba0e.js" crossorigin="anonymous"></script>
    <title>PLANNET</title>
  </head>

  <body style="background-color:#e6eeff; font-family: 'Nunito', sans-serif;">
  <nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand" href="/"><img src="/images/plannet2.png" width="140" height="50" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php $page=basename($_SERVER['PHP_SELF']);?>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link <?php if($page == 'calendar'):echo 'nav-active';endif ?>" href="/"><i class="fa-solid fa-house"></i> Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($page == 'todolist'):echo 'nav-active';endif ?>" href="todolist"><i class="fa-solid fa-list"></i> To-Do List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($page == 'dailyExpense'):echo 'nav-active';endif ?>" href="dailyExpense"><i class="fa-solid fa-sack-dollar"></i> Daily Tracker</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($page == 'notebook'):echo 'nav-active';endif ?>" href="/notebook"><i class="fa-solid fa-book-bookmark"></i> Note</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($page == 'eventCountdown'):echo 'nav-active';endif ?>" href="eventCountdown"><i class="fa-solid fa-clock"></i> Event Coutdown</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($page == 'contactUs'):echo 'nav-active';endif ?>" href="contactUs"><i class="fa-solid fa-comment"></i> Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($page == 'aboutUs'):echo 'nav-active';endif ?>" href="aboutUs"><i class="fa-solid fa-circle-info"></i> About Us</a>
      </li>
      <span>@guest
      
  
        @endguest</span>
        <span class="nav-item">@guest
          @if (Route::has('login'))
                  <a class="nav-link" href="{{ route('login') }}">{{ ('Login') }}</a>
          @endif
        </span>
        <span class="nav-item">
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ ('Register') }}</a>
              </li>
          @endif
        </span>
      @else
      <span class="nav-item dropdown"
      >
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa-solid fa-user"></i>
                  {{ Auth::user()->name }}
              </a>
  
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket"></i>
                      {{ __('Logout') }}
                  </a>
                  <a class="dropdown-item" href="/viewReplies"><i class="fa-solid fa-envelope-circle-check"></i> View Feedback Sent</a>
                  <a class="dropdown-item" href="/viewNews"><i class="fa-solid fa-newspaper"></i> View News</a>
                  <a class="dropdown-item" href="/viewProfile"><i class="fa-solid fa-address-card"></i> View Profile</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>

      @endguest
    </span>
   
    </ul>
  </div>
</nav>

@yield('content')    

<footer class="mainfooter" role="contentinfo">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 copy">
        <p class="text-center">&copy; Copyright 2022 - PLANNET.  All rights reserved</p>
        <p class="text-center"><i class="fas fa-envelope"></i> D210061A@sc.edu.my &nbsp;<i class="fas fa-envelope"></i>D210058A@sc.edu.my</p> 
      </div>
  </div>
</footer>

    <!-- Optional JavaScript; choose one of the two! -->
    
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
    
  </body>
</html>
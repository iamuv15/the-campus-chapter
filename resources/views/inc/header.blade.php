<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title') | The Campus Chapter</title>
    @yield('css')
    <link rel="stylesheet" href="{{asset("links/css/profile.css")}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset("FlipClock-master/compiled/flipclock.css")}}">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Spectral">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="{{asset("FlipClock-master/compiled/flipclock.js")}}"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    @section('global-content')
      <div class="global-wrapper">
      <nav>
        <div class="logo-container">
          <a href="/">
            <div class="logo-lg">
              <i class="fa fa-graduation-cap"></i>
              <span><b>The</b>Campus Chapter</span>
            </div>
          </a>
        </div>
        <div class="links-container">
          <ul class="update-links">
            <a href="#" class="nav-profile">
              <li>
                <img src="images/pro1.jpg" class="navigation-profile-icon" alt="">
                <span class="navigation-profile-text">Ujjwal Verma</span>
              </li>
            </a>
            <a href="#" class="nav-notify">
              <li>
                <i class="fa fa-bell-o"></i>
              </li>
            </a>
          </ul>
          <!-- <ul class="static-links">

          </ul> -->
        </div>
      </nav>
      @yield('section-content')
    </div>
    @show
    <script type="text/javascript">var activeUserId = {{ Auth::user()->id }}</script>
    <script type="text/javascript">var token = '{{ Session::token() }}'</script>
    <script src="{{asset('links/js/ajax.js')}}"></script>
  </body>
</html>

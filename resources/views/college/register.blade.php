<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title') | The Campus Chapter</title>
    <link rel="stylesheet" href="@yield('css')">
    <link rel="stylesheet" href="{{asset("links/css/profile.css")}}">
    <link rel="stylesheet" href="{{asset("links/css/register.css")}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset("FlipClock-master/compiled/flipclock.css")}}">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Spectral">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="{{asset("FlipClock-master/compiled/flipclock.js")}}"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
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
      </nav>
      <div class="content">
        <div>
          <h4>We just need a little information to <span>get you started!</span></h4>
        </div>
        <div>
          <form class="" action="{{ route('register.college') }}" method="post">
            <div>
              <label for="">Name of the Institution *</label>
              <input type="text" name="clg_name" value="" placeholder="Enter name of the Institution">
            </div>
            <div>
              <label for="">Abbrivation Used</label>
              <input type="text" name="abbr" value="" placeholder="Enter shorthand to represent your college">
            </div>
            <div>
              <label for="">Name of the applicant *</label>
              <input type="text" name="fname" value="" placeholder="Enter your name here">
              <input type="text" name="mname" value="" placeholder="Enter your name here">
              <input type="text" name="lname" value="" placeholder="Enter your name here">
            </div>
            <!-- <div>
              <label for="">Designation of the applicant *</label>
              <input type="text" name="" value="" placeholder="Enter your designation here">
            </div> -->
            <div>
              <label for="">E-mail of the applicant *</label>
              <input type="text" name="email" value="" placeholder="Enter your e-mail id here">
            </div>
            <div>
              <label for="">Password *</label>
              <input type="password" name="pwd" value="" placeholder="It should be minimum 8 characters long">
            </div>
            <div>
              <label for="">Confirm password *</label>
              <input type="password" name="cnfpwd" value="" placeholder="Re-enter your password">
            </div>
            <div>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              <center><button type="submit" name="button">Create our chapter</button></center>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

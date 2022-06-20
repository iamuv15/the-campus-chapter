<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="{{ route('register/college') }}" method="post">
      <label for="">College Name</label><br>
      <input type="text" name="clg_name" value=""><br>
      <label for="">Abbrivation</label><br>
      <input type="text" name="abbr" value=""><br>
      <label for="">Locality</label><br>
      <input type="text" name="locality" value=""><br>
      <label for="">City</label><br>
      <input type="text" name="city" value=""><br>
      <label for="">State</label><br>
      <input type="text" name="state" value=""><br>
      <label for="">Country</label><br>
      <input type="text" name="country" value=""><br>
      <input type="submit" name="" value="Register">
      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
  </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="{{ route('userinfo') }}" method="post">
      <label for="">Registration Number</label><br>
      <input type="text" name="reg_no" value=""><br>
      <label for="">Roll Number</label><br>
      <input type="text" name="roll_no" value=""><br>
      <label for="">Branch</label><br>
      <input type="text" name="branch" value=""><br>
      <label for="">Batch</label><br>
      <input type="text" name="batch" value=""><br>
      <label for="">Trade</label><br>
      <input type="text" name="trade" value=""><br>
      <label for="">Semester</label><br>
      <input type="text" name="semester" value=""><br>
      <label for="">Contact Number</label><br>
      <input type="text" name="contact_no" value=""><br>
      <label for="">Hostel Number</label><br>
      <input type="text" name="hostel_no" value=""><br>
      <label for="">Room Number</label><br>
      <input type="text" name="room_no" value=""><br>
      <input type="submit" name="" value="Update">
      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
  </body>
</html>

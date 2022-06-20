<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Invite Users</title>
  </head>
  <body>
    <form class="" action="{{ route('invite.user') }}" method="post">
      <label for="college_id">College Id: </label>
      <input type="number" name="college_id" value="1"><br>
      <label for="email">Email: </label>
      <input type="email" name="email" value=""><br>
      <label for="status">Status: </label>
      <input type="number" name="status" value="1"><br>
      <input type="hidden" name="_token" value="{{ Session::token() }}">
      <input type="submit" name="" value="Invite">
    </form>
  </body>
</html>

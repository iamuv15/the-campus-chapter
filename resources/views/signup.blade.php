
<div class="content">
  <form class="" action="{{ route('s') }}" method="post">
    <label for="">First Name</label><br>
    <input type="text" name="fname" value=""><br>
    <label for="">Middle Name</label><br>
    <input type="text" name="mname" value=""><br>
    <label for="">Last Name</label><br>
    <input type="text" name="lname" value=""><br>
    <label for="">Username</label><br>
    <input type="email" name="username" value=""><br>
    <label for="">E-mail</label><br>
    <input type="email" name="email" value=""><br>
    <label for="">Password</label><br>
    <input type="password" name="password" value=""><br>
    <label for="">Confirm Password</label><br>
    <input type="password" name="cnfpwd" value=""><br>
    <input type="hidden" name="clgid" value="1">
    <input type="submit" name="register_new" value="Signup">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
  </form>
</div>

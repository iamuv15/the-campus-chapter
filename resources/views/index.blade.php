@if(Auth::check())
  @include('home')
@else
  <!DOCTYPE html>
  <html lang="en">

    <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>The Campus Chapter</title>

      <!-- Bootstrap Core CSS -->
      <link href="{{ url('/homepage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
      <!-- <link rel="stylesheet" href="/css/app.css"> -->

      <!-- Custom Fonts -->
      <link href="{{ url('/homepage/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
      <link href="{{ url('/homepage/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">

      <!-- Custom CSS -->
      <link href="{{ url('/homepage/css/stylish-portfolio.min.css') }}" rel="stylesheet">
    </head>

    <body id="page-top">
      <!-- Navigation -->
      <!-- <a class="menu-toggle rounded" href="#">
        <i class="fa fa-bars"></i>
      </a>
      <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
          <li class="sidebar-brand">
            <a class="js-scroll-trigger" href="#page-top">Quick Access</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#page-top">Home</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#services">Services</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#portfolio">Portfolio</a>
          </li>
          <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </nav> -->

      <!-- Header -->
      <header class="masthead d-flex">
        <div class="container text-center my-auto">
          <h1 class="mb-1 theme-title">The Campus Chapter</h1>
          <h3 class="mb-5">
            <em>Let's unfold a new chapter!</em>
          </h3>
      		<div class="row login-container">
      			<div class="col-md-12">
      				<!-- <div class="pr-wrap">
      					<div class="pass-reset">
      						<label>
      							Enter the email you signed up with</label>
      						<input type="email" placeholder="Email" />
      						<input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
      					</div>
      				</div> -->
      				<div class="wrap">
      					<!-- <form class="login" action="{{ route('login') }}" method="post">
      					<input type="email" name="email" placeholder="Username" />
      					<input type="password" name="password" placeholder="Password" />
      					<input type="submit" value="Sign In" class="btn btn-primary btn-sm" />
      					<div class="remember-forgot">
      						<div class="row">
      							<div class="col-md-6">
      								<div class="checkbox">
      									<label>
      										<input type="checkbox" />
      										Remember Me
      									</label>
      								</div>
      							</div>
      							<div class="col-md-6 forgot-pass-content">
      								<a href="javascript:void(0)" class="forgot-pass">Forgot Password</a>
      							</div>
      						</div>
      					</div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
      					</form> -->
                <nav class="main-nav">
                	<ul>
                		<li><a class="signin" href="#">Sign in</a></li>
                		<li><a class="signup" href="#">Sign up</a></li>
                	</ul>
                </nav>

                <div class="user-modal">
              		<div class="user-modal-container">
              			<ul class="switcher">
              				<li><a href="">Sign in</a></li>
              				<li><a href="">New account</a></li>
              			</ul>

              			<div id="login">
              				<form class="form" action="{{ route('login') }}" method="post">
              					<p class="fieldset">
              						<label class="image-replace email" for="signin-email">E-mail</label>
              						<input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail" name="email">
              						<span class="error-message">An account with this email address does not exist!</span>
              					</p>

              					<p class="fieldset">
              						<label class="image-replace password" for="signin-password">Password</label>
              						<input class="full-width has-padding has-border" id="signin-password" type="password"  placeholder="Password" name="password">
              						<a href="#0" class="hide-password">Show</a>
              						<span class="error-message">Wrong password! Try again.</span>
              					</p>

              					<!-- <p class="fieldset">
              						<input type="checkbox" id="remember-me" checked>
              						<label for="remember-me">Remember me</label>
              					</p> -->

              					<p class="fieldset">
                          <input type="hidden" name="_token" value="{{ Session::token() }}">
              						<input class="full-width" type="submit" value="Login">
              					</p>
              				</form>

              				<p class="form-bottom-message"><a href="#0">Forgot your password?</a></p>
              				<!-- <a href="#0" class="close-form">Close</a> -->
              			</div>

              			<div id="signup">
              				<form class="form" method="post">
                        <p class="fieldset">Registration on The Campus Chapter is open on invitation basis only. Check your mail for invitation.</p>
                        <a href="{{ asset('register/student/check') }}?collegeId=1&email=verma.ujjwal1@gmail.com&token=VpHABnAxX4h2cZ2hkLga">Register</a>
              					<!-- <p class="fieldset">
              						<label class="image-replace username" for="signup-username">Username</label>
              						<input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
              						<span class="error-message">Your username can only contain numeric and alphabetic symbols!</span>
              					</p> -->

              					<!-- <p class="fieldset">
              						<label class="image-replace email" for="signup-email">E-mail</label>
              						<input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
              						<span class="error-message">Enter a valid email address!</span>
              					</p> -->

              					<!-- <p class="fieldset">
              						<label class="image-replace password" for="signup-password">Password</label>
              						<input class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="Password">
              						<a href="#0" class="hide-password">Show</a>
              						<span class="error-message">Your password has to be at least 6 characters long!</span>
              					</p> -->

              					<!-- <p class="fieldset">
              						<input type="checkbox" id="accept-terms">
              						<label for="accept-terms">I agree to the <a class="accept-terms" href="#0">Terms</a></label>
              					</p> -->

              					<!-- <p class="fieldset">
                          <input type="hidden" name="_token" value="{{ Session::token() }}">
              						<input class="full-width has-padding" type="submit" value="Create account">
              					</p> -->
              				</form>

              				<!-- <a href="#0" class="cd-close-form">Close</a> -->
              			</div>

              			<div id="reset-password">
              				<p class="form-message">Lost your password? Please enter your email address.</br> You will receive a link to create a new password.</p>

              				<form class="form">
              					<p class="fieldset">
              						<label class="image-replace email" for="reset-email">E-mail</label>
              						<input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
              						<span class="error-message">An account with this email does not exist!</span>
              					</p>

              					<p class="fieldset">
                          <input type="hidden" name="_token" value="{{ Session::token() }}">
              						<input class="full-width has-padding" type="submit" value="Reset password">
              					</p>
              				</form>

              				<p class="form-bottom-message"><a href="#0">Back to log-in</a></p>
              			</div>
              			<a href="#0" class="close-form">Close</a>
              		</div>
              	</div>
      				</div>
      			</div>
      		</div>
          <div class="" style="position: relative; top: 150px;">
            <a class="btn btn-primary btn-xl js-scroll-trigger btn-pos" href="#about">Find Out More</a>
          </div>
        </div>
        <div class="overlay"></div>
      </header>

      <!-- Bootstrap core JavaScript -->
      <script src="{{ url('/homepage/vendor/jquery/jquery.min.js') }}"></script>
      <script src="{{ url('/homepage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

      <!-- Plugin JavaScript -->
      <script src="{{ url('/homepage/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

      <!-- Custom scripts for this template -->
      <script src="{{ url('/homepage/js/stylish-portfolio.min.js') }}"></script>
      <script type="text/javascript">
      jQuery(document).ready(function($){
        var $form_modal = $('.user-modal'),
          $form_login = $form_modal.find('#login'),
          $form_signup = $form_modal.find('#signup'),
          $form_forgot_password = $form_modal.find('#reset-password'),
          $form_modal_tab = $('.switcher'),
          $tab_login = $form_modal_tab.children('li').eq(0).children('a'),
          $tab_signup = $form_modal_tab.children('li').eq(1).children('a'),
          $forgot_password_link = $form_login.find('.form-bottom-message a'),
          $back_to_login_link = $form_forgot_password.find('.form-bottom-message a'),
          $main_nav = $('.main-nav');

        //open modal
        $main_nav.on('click', function(event){

          if( $(event.target).is($main_nav) ) {
            // on mobile open the submenu
            $(this).children('ul').toggleClass('is-visible');
          } else {
            // on mobile close submenu
            $main_nav.children('ul').removeClass('is-visible');
            //show modal layer
            $form_modal.addClass('is-visible');
            //show the selected form
            ( $(event.target).is('.signup') ) ? signup_selected() : login_selected();
          }

        });

        //close modal
        $('.user-modal').on('click', function(event){
          if( $(event.target).is($form_modal) || $(event.target).is('.close-form') ) {
            $form_modal.removeClass('is-visible');
          }
        });
        //close modal when clicking the esc keyboard button
        $(document).keyup(function(event){
            if(event.which=='27'){
              $form_modal.removeClass('is-visible');
            }
          });

        //switch from a tab to another
        $form_modal_tab.on('click', function(event) {
          event.preventDefault();
          ( $(event.target).is( $tab_login ) ) ? login_selected() : signup_selected();
        });

        //hide or show password
        $('.hide-password').on('click', function(){
          var $this= $(this),
            $password_field = $this.prev('input');

          ( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
          ( 'Show' == $this.text() ) ? $this.text('Hide') : $this.text('Show');
          //focus and move cursor to the end of input field
          $password_field.putCursorAtEnd();
        });

        //show forgot-password form
        $forgot_password_link.on('click', function(event){
          event.preventDefault();
          forgot_password_selected();
        });

        //back to login from the forgot-password form
        $back_to_login_link.on('click', function(event){
          event.preventDefault();
          login_selected();
        });

        function login_selected(){
          $form_login.addClass('is-selected');
          $form_signup.removeClass('is-selected');
          $form_forgot_password.removeClass('is-selected');
          $tab_login.addClass('selected');
          $tab_signup.removeClass('selected');
        }

        function signup_selected(){
          $form_login.removeClass('is-selected');
          $form_signup.addClass('is-selected');
          $form_forgot_password.removeClass('is-selected');
          $tab_login.removeClass('selected');
          $tab_signup.addClass('selected');
        }

        function forgot_password_selected(){
          $form_login.removeClass('is-selected');
          $form_signup.removeClass('is-selected');
          $form_forgot_password.addClass('is-selected');
        }

        //REMOVE THIS - it's just to show error messages
        // $form_login.find('input[type="submit"]').on('click', function(event){
        //   event.preventDefault();
        //   $form_login.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
        // });
        // $form_signup.find('input[type="submit"]').on('click', function(event){
        //   event.preventDefault();
        //   $form_signup.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
        // });


        //IE9 placeholder fallback
        //credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
        if(!Modernizr.input.placeholder){
          $('[placeholder]').focus(function() {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
              input.val('');
              }
          }).blur(function() {
            var input = $(this);
              if (input.val() == '' || input.val() == input.attr('placeholder')) {
              input.val(input.attr('placeholder'));
              }
          }).blur();
          $('[placeholder]').parents('form').submit(function() {
              $(this).find('[placeholder]').each(function() {
              var input = $(this);
              if (input.val() == input.attr('placeholder')) {
                input.val('');
              }
              })
          });
        }

        });


        //credits https://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
        jQuery.fn.putCursorAtEnd = function() {
        return this.each(function() {
            // If this function exists...
            if (this.setSelectionRange) {
                // ... then use it (Doesn't work in IE)
                // Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
                var len = $(this).val().length * 2;
                this.setSelectionRange(len, len);
            } else {
              // ... otherwise replace the contents with itself
              // (Doesn't work in Google Chrome)
                $(this).val($(this).val());
            }
        });
      };
      </script>

    </body>

  </html>
@endif

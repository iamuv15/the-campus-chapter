@if(strpos($_SERVER['REQUEST_URI'], $user->username) !== false)
<div class="header-container">
  <div class="cover-container">
    <img src="{{asset("images/cov2.jpg")}}" alt="" style="height: inherit; width: inherit;">
    <div class="cover-tinted">
      <div class="cover-info-container">
        <div class="profile-pic">
          <div class="profile-pic-container">
            <img src="{{asset("images/pro1.jpg")}}" alt="Oh! We didn't found it!">
          </div>
        </div>
        <div class="cover-userinfo">
          <p>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</p>
          <p>{{ $user->userInfo->branch }}</p>
        </div>
        @if(strpos($_SERVER['REQUEST_URI'], Auth::User()->username) !== false)
          <a class="change-btn" href="">
            <div class="edit-btn">
              Change Display Picture
            </div>
          </a>
        @endif
      </div>
    </div>
  </div>
</div>
@endif

@if(strpos($_SERVER['REQUEST_URI'], '/club') !== false)
<div class="header-container">
  <div class="cover-container">
    <img src="images/cov2.jpg" alt="" style="height: inherit; width: inherit;">
    <div class="cover-tinted">
      <div class="cover-info-container">
        <div class="profile-pic">
          <div class="profile-pic-container">
            <img src="images/pro1.jpg" alt="Oh! We didn't found it">
          </div>
        </div>
        <div class="cover-userinfo">
          <p>Happy Club</p>
          <p>Category of the Club</p>
          <p>SLIET</p>
        </div>
        <!-- If cover video is there! -->
        <div class="play-btn">
          <i class="fa fa-play-circle-o"></i>
          <!-- Video link goes here! -->
        </div>
        <a class="change-btn" href="">
          <div class="edit-btn">
            Change Cover
          </div>
        </a>
      </div>
      <div class="link-section">
        <a href=""><span style="color: #cccccc;">Chapter</span>
        <span class="caret"></span></a>
        <a href="">Events</a>
        <a href="">Challanges</a>
        <a href="">Gallary</a>
        <!-- <a href="">Albums</a>
        <a href="">Clubs</a> -->
        <a href="">About</a>
      </div>
      <div class="btn-follow">
        <button type="button" name="button" id="btn-follow">Following</button>
        <button type="button" name="button" id="apply-btn">Request</button>
        <!-- <button type="button" name="button" class="ellipsis-h"><i class="fa fa-ellipsis-h"></i></button> -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#btn-follow').mouseover(function(){
    $('#btn-follow').html('Unfollow');
  });
  $('#btn-follow').mouseout(function(){
    $('#btn-follow').html('Following');
  });

  $('#apply-btn').mouseover(function(){
    $('#apply-btn').html('Request for membership');
    // $('#apply-btn').animate({width: "300px"});
  });
  $('#apply-btn').mouseout(function(){
    $('#apply-btn').html('Request');
  });
</script>

@endif

@if(strpos($_SERVER['REQUEST_URI'], 'event') !== false)
<div class="header-container event-page">
  <div class="cover-container">
    <img src="images/cov2.jpg" alt="" style="height: inherit; width: inherit;">
    <div class="cover-tinted">
      <div class="cover-info-container">
        <div class="cover-eventinfo">
          <p class="event-title">Musical Night</p>
          <p class="event-club">Presented by Happy Club,</p>
          <p>ISTE Hall,</p>
          <p>6 PM <span class="event-begin">June 20, 2018</span></p>
        </div>
          <div class="event-timer">
            <div class="clock" style="margin:2em;"></div>
          </div>

      		<script type="text/javascript">
      			var clock;

      			$(document).ready(function() {
      				var date = new Date('2014-01-01 05:02:12 pm');

      				clock = $('.clock').FlipClock(date, {
      					clockFace: 'TwentyFourHourClock'
      				});
      			});
      		</script>
        <a class="change-btn" href="">
          <div class="edit-btn">
            Change Cover
          </div>
        </a>
      </div>
      <div class="link-section">
        <a href=""><span style="color: #cccccc;">Chapter</span>
        <span class="caret"></span></a>
        <a href="">Events</a>
        <a href="">Challanges</a>
        <a href="">Gallary</a>
        <a href="">About</a>
      </div>
      <div class="btn-follow event-response-btns">
        <button type="button" name="button" id="btn-follow">Intrested</button>
        <button type="button" name="button" id="btn-follow">Get Tickets</button>
        <button type="button" name="button" id="apply-btn">Remind me</button>
        <!-- <button type="button" name="button" class="ellipsis-h"><i class="fa fa-ellipsis-h"></i></button> -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#btn-follow').mouseover(function(){
    $('#btn-follow').html('Not Intrested');
  });
  $('#btn-follow').mouseout(function(){
    $('#btn-follow').html('Intrested');
  });

  $('#apply-btn').mouseover(function(){
    $('#apply-btn').html('Add a reminder');
    // $('#apply-btn').animate({width: "300px"});
  });
  $('#apply-btn').mouseout(function(){
    $('#apply-btn').html('Remind me');
  });
</script>

@endif

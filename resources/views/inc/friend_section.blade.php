<style media="screen">
.friends-section{
  height: auto !important;
  width: 100% !important;
  margin-bottom: 20px;
  margin-top: -20px;
  /* border: 1px solid black !important; */
}

.friend-container{
  display: inline-block;
  height: 200px;
  width: 32.485%;
  border-bottom: 1px solid #cccccc;
  position: relative;
  top: 20px;
  margin-top: 10px;
  margin-right: 5px;
}

.friend-cover{
  height: 120px;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
  /* border: 1px solid red; */
}

.friend-cover > img{
  height: inherit;
  width: 100%;
  border-radius: inherit;
}

.pp-friend{
  border-radius: 50%;
  position: relative;
  margin-top: -50px;
  margin-left: 20px;
}

.pp-friend > img{
  position: absolute;
  height: 70px;
  width: 70px;
  border-radius: inherit;
  border: 7px solid white;
}

.friend-intro > span > a{
  position: relative;
  top: 85px;
  margin-left: 20px;
  font-size: 14px;
  color: #27aae1;
  font-weight: 600;
  font-family: "Trebuchet MS";
}

.friend-intro > span > a:hover{
  text-decoration: underline;
}

.friend-intro > .course{
  position: relative;
  top: 75px;
  margin-left: 20px;
  font-size: 14px;
  color: #6d6e71;
  font-family: "Trebuchet MS";
}

.friend-intro > .pull-right{
  position: relative;
  right: 20px;
  font-size: 14px;
  font-family: "Trebuchet MS";
}

.friend-intro > .pull-right > a{
  color: green;
  cursor: pointer;
}

.friend-intro > .pull-right > a:hover{
  color: red;
  cursor: pointer;
}

.stalk-btn{
  color: red !important;
}

.stalk-btn:hover{
  color: green !important;
}
</style>

@if(strpos($_SERVER['REQUEST_URI'], 'friends') !== false)
  <div class="friends-section">
    <div class="friend-container">
      <div class="friend-cover">
        <img src="{{asset("Images/cov2.jpg")}}" alt="">
      </div>
      <div class="pp-friend">
        <img src="{{asset("Images/pro1.jpg")}}" alt="">
      </div>
      <div class="friend-intro">
        <span><a href="">Ujjwal Verma</a></span>
          <span class="pull-right"><a id="friend-btn">Friends</a></span>
        <p class="course">Computer Science Engineering</p>
      </div>
    </div>
  </div>
@endif

@if(strpos($_SERVER['REQUEST_URI'], 'stalking') !== false)
  <div class="friends-section">
    <div class="friend-container">
      <div class="friend-cover">
        <img src="{{asset("Images/cov5.jpg")}}" alt="">
      </div>
      <div class="pp-friend">
        <img src="{{asset("Images/pro2.jpg")}}" alt="">
      </div>
      <div class="friend-intro">
        <span><a href="">Nobody Here</a></span>
          <span class="pull-right"><a class="stalk-btn" id="stalk-btn">Stalking</a></span>
        <p class="course">Computer Science Engineering</p>
      </div>
    </div>
  </div>
@endif

@if(strpos($_SERVER['REQUEST_URI'], 'myclubs') !== false)
  <div class="friends-section">
    <div class="friend-container">
      <div class="friend-cover">
        <img src="{{asset("Images/cov5.jpg")}}" alt="">
      </div>
      <div class="pp-friend">
        <img src="{{asset("Images/pro2.jpg")}}" alt="">
      </div>
      <div class="friend-intro">
        <span><a href="">Nobody Here</a></span>
          <span class="pull-right"><a class="follow-btn" id="follow-btn">Following</a></span>
        <p class="course">Computer Science Engineering</p>
      </div>
    </div>
  </div>
@endif

<script type="text/javascript">
  $('#friend-btn').mouseover(function(){
    $('#friend-btn').html('Unfriend');
  });
  $('#friend-btn').mouseout(function(){
    $('#friend-btn').html('Friends');
  });

  $('#stalk-btn').mouseover(function(){
    $('#stalk-btn').html('Unstalk');
  });
  $('#stalk-btn').mouseout(function(){
    $('#stalk-btn').html('Stalking');
  });

  $('#follow-btn').mouseover(function(){
    $('#follow-btn').html('Unfollow');
  });
  $('#follow-btn').mouseout(function(){
    $('#follow-btn').html('Following');
  });
</script>

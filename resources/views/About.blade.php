@include('inc.header')
@include('inc.cover')

<div class="content user-info">
  <div class="inline-content">
    <div class="navigation-wrapper">
      <ul>
        <i class="fa fa-info-circle">
          <li>Personal Information</li>
        </i>
          <ol class="Personal-information">
            <li>Name</li><span>:</span>
            <li>Registration Number</li><span>:</span>
            <li>Branch</li><span>:</span>
            <li>Batch</li><span>:</span>
            <li>Birthday</li><span>:</span>
            <li>Contact Number</li><span>:</span>
            <li>Hostel Number</li><span>:</span>
            <li>Room Number</li><span>:</span>
          </ol>
        <i class="fa fa-briefcase">
          <li>Work Experience</li>
        </i>
        <br>
        <i class="icon-flash fa fa-heart">
          <li>Hobbies and Intrests</li>
        </i>
          <ol class="inline-list">
            <li>
              <i class="icon-flash fa fa-camera">
                <span class="intrest-title">Photography</span>
              </i>
            </li>
            <li>
              <i class="icon-flash fa fa-video-camera">
                <span class="intrest-title">Direction</span>
              </i>
            </li>
            <li>
              <i class="icon-flash fa fa-microphone">
                <span class="intrest-title">Singing</span>
              </i>
            </li>
            <li>
              <i class="icon-flash fa fa-bicycle">
                <span class="intrest-title">Cycling</span>
              </i>
            </li>
          </ol>
        <i class="fa fa-bullhorn">
          <li>Languages Known</li>
        </i>
          <ol class="inline-list">
            <li>Hindi,</li>
            <li>English,</li>
            <li>Punjabi</li>
          </ol>
      </ul>
    </div>
  </div>
</div>

<!-- <script type="text/javascript">
  // var element = $(this);
  // $('.fa-camera').mouseover(function(){
  //   $("<span class='intrest-title'>Photography</span>").insertAfter(".fa-camera");
  //   var a = $('.fa-camera').html("<span class='intrest-title'>Photography</span>").width();
  //   console.log(a);
  //   $('.fa-camera').css("width", a);
  // });
  $('.intrest-title').mouseover(function(){
    $('.fa-camera').html("<span class='intrest-title'>Photography</span>");
  });
  $('.fa-camera').mouseout(function(){
    $('.intrest-title').remove();
  });
  // $('').mouseout(function(){
  //   $('.fa-camera').html("");
  // });
</script> -->

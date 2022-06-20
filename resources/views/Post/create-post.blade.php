<div class="popup" id="popup">
  <div class="fullscreen-container">
    <form class="public-post-popup"  id="create_post" method="post" action="{{ route('postAjax') }}">
      <div class="post-type-options">
        <a href="" style="border-left: 0px; border-bottom: 0px;">Public</a>
        <a href="">Private</a>
        <span class="close-1">
          <i class="fa fa-close"></i>
        </span>
      </div>
      <div class="post-container-wrapper">
        <div class="post-container">
          <div class="post-container-header">
            <div class="display-pic">
              <img src="images/pro1.jpg" alt="">
            </div>
            <textarea placeholder="What's new?" id="description_id" name="description_name" value="hello"></textarea>

            <script type="text/javascript">
              $('#description_id').on('input', function() {
                this.style.height = '';
                this.style.height = this.scrollHeight + 'px';
              })
              .focus();
            </script>

            <div class="post-elements">
              <div class="post-media">
                <span>
                  <a id="photo" href=""><i class="fa fa-image"></i></a>
                </span>
                <span>
                  <a id="video" href=""><i class="fa fa-video-camera"></i></a>
                </span>
                <span>
                  <a id="askQ" href=""><i class="fa fa-question-circle"></i></a>
                </span>
                <span>
                  <a id="poll" href=""><img src="images/poll.png" style="height: 15px; width: 20px; margin-top: -5px;"></a>
                </span>
              </div>
              <div class="react-post">
                <span class="tooltip">
                  <i class="fa fa-hashtag"></i>
                  <span class="tooltip-text-tags">Trending tags</span>
                </span>
                <span>
                  <i class="fa fa-smile-o"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="post-container-body">
            <div class="trend-box">
              <ul class="trend-list">
                <li class="trend-list-item">
                  <span>HarHarMahadev</span>
                </li>
                <li class="trend-list-item">
                  <span>WahTeraKyaKehna</span>
                </li>
                <li class="trend-list-item">
                  <span>AchaHai</span>
                </li>
                <li class="trend-list-item">
                  <span>YeBahotSahiHai</span>
                </li>
                <li class="trend-list-item">
                  <span>HarHarMahadev</span>
                </li>
                <li class="trend-list-item">
                  <span>KyaBaat</span>
                </li>
                <li class="trend-list-item">
                  <span>HarHar</span>
                </li>
                <li class="trend-list-item">
                  <span>ChailoVerity</span>
                </li>
                <li class="trend-list-item">
                  <span>HtaSawanKiGhata</span>
                </li>
                <li class="trend-list-item">
                  <span>HarHarMahadev</span>
                </li>
                <li class="trend-list-item">
                  <span>KyaBaat</span>
                </li>
                <li class="trend-list-item">
                  <span>HarHar</span>
                </li>
                <li class="trend-list-item">
                  <span>ChailoVerity</span>
                </li>
                <li class="trend-list-item">
                  <span>HtaSawanKiGhata</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="submit-post">
          <input type="hidden" name="_token" value="{{ Session::token() }}">
          <!-- <i class="fa fa-globe"></i> -->
          <button type="submit" name="button">Post</button>
        </div>
      </div>
    </form>

    <div class="poll-box">
      <div class="post-type-options">
        <a href="" style="border-left: 0px; border-bottom: 0px;">Public</a>
        <a href="">Private</a>
        <span class="close-1">
          <i class="fa fa-close"></i>
        </span>
      </div>
      <div class="post-container-wrapper">
        <div class="post-container">
          <div class="post-container-header">
            <div class="display-pic">
              <img src="images/pro1.jpg" alt="">
            </div>
            <textarea placeholder="Ask a question to have a poll!" id="description_id" cols="48" rows="1" name="description_name"></textarea>
            <div class="post-elements">
              <input class="poll-option" type="text" name="" value="" maxlength="25" placeholder="Option 1">
              <input class="poll-option" type="text" name="" value="" maxlength="25" placeholder="Option 2">
            </div>
            <span><i class="fa fa-plus-circle"></i></span>
          </div>
          <div class="post-container-body">

          </div>
        </div>
        <div class="submit-post">
          <select class="duration" name="">
            <option value="1">1 day</option>
            <option value="2"> 1 week</option>
            <option value="3">Custom</option>
          </select>
          <span><button type="button" name="button">Poll</button></span>
          <span><button type="button" name="button" class="cancel-poll">Cancel Poll</button></span>
        </div>
      </div>
    </div>

    <div class="question-box">
      <div class="post-type-options">
        <a href="" style="border-left: 0px; border-bottom: 0px;">Public</a>
        <a href="">Private</a>
        <span class="close-1">
          <i class="fa fa-close"></i>
        </span>
      </div>
      <div class="post-container-wrapper">
        <div class="post-container">
          <div class="post-container-header">
            <div class="display-pic">
              <img src="images/pro1.jpg" alt="">
            </div>
            <textarea placeholder="Ask a question!" id="description_id" cols="48" rows="1" name="description_name"></textarea>
            <div class="post-elements">

            </div>
            <!-- <span><i class="fa fa-plus-circle"></i></span> -->
          </div>
          <div class="post-container-body">

          </div>
        </div>
        <div class="submit-post">
          <span><button type="button" name="button">Ask</button></span>
          <span><button type="button" name="button" class="cancel-ask">Cancel</button></span>
        </div>
      </div>
    </div>
    <div class="private-post-popup">
      <span class="close-2">
        <i class="fa fa-close"></i>
      </span>
    </div>
  </div>
</div>
<div class="ajax-edit"></div>

@section('js_script')
<script type="text/javascript">
  $('#public-post-popup').on('click', function(e){
    e.preventDefault();
    $('.fullscreen-container').css({"background-color": "rgba(0, 0, 0, 0.6)", "z-index": "9999"});
    // $('body').css({"overflow": "hidden"});
    $('.public-post-popup').toggleClass('open-1');
    return false;
  });
  $('.close-1').click(function(){
    $('.fullscreen-container').css({"background-color": "#ecf0f5", "z-index": "-9999"});
    // $('.body').css({"overflow": "auto"});
    $('.public-post-popup').toggleClass('open-1');
  });
</script>
<script type="text/javascript">
  $('#private-post-popup').on('click', function(e){
    e.preventDefault();
    $('.fullscreen-container').css({"background-color": "rgba(0, 0, 0, 0.6)", "z-index": "9999"});
    $('body').css({"overflow": "hidden"});
    $('.private-post-popup').toggleClass('open-2');
    return false;
  });
  $('.close-2').click(function(){
    $('.fullscreen-container').css({"background-color": "#ecf0f5", "z-index": "-9999"});
    $('body').css({"overflow": "auto"});
    $('.private-post-popup').toggleClass('open-2');
  });
</script>
<!-- <script type="text/javascript">
function do_resize(textbox){
  var maxrows=20;
  var txt=textbox.value;
  if($('textarea').css("font-size") == "20px"){
    // console.log('47');
    var cols=textbox.cols;
  } else {
    // console.log('68');
    $('textarea').attr('cols', '63');
    var cols = 62;
  }
  var arraytxt=txt.split('\n');
  var rows=arraytxt.length;

  for (i=0;i<arraytxt.length;i++)
  rows+=parseInt(arraytxt[i].length/cols);

  if (rows>maxrows) textbox.rows=maxrows;
  else textbox.rows=rows;
}
</script> -->
<!-- <script type="text/javascript">
$('textarea').keypress(function() {
  var cs = $(this).val().length;
  if(cs>120){
    $('textarea').css({"font-size": "16px"});
  }
  else{
    $('textarea').css({"font-size": "20px"});
    $('textarea').attr('cols', '48');
  }
});

$('textarea').keydown(function(event){
  var cs = $(this).val().length;
  if(event.keyCode == 8){
    if(cs<120){
      $('textarea').css({"font-size": "18px"});
      $('textarea').attr('cols', '48');
    }
  }
});

// $('textarea').focus(function() {
//   $('.public-post-popup').css({"min-height": "250px"});
//   $('.post-container').css({"min-height": "190px"});
//   $('textarea').css({"min-height": "145px"});
// });
</script> -->
<!-- if poll button is clicked -->
<script type="text/javascript">
  $('#poll').on('click', function(e){
    e.preventDefault();
    $('.poll-box').toggleClass('open-1');
    $('.public-post-popup').toggleClass('open-1');
  });
  $('.cancel-poll').on('click', function(e){
    e.preventDefault();
    $('.poll-box').toggleClass('open-1');
    $('.public-post-popup').toggleClass('open-1');
  });
</script>
<script type="text/javascript">
  $('#askQ').on('click', function(e){
    e.preventDefault();
    $('.question-box').toggleClass('open-1');
    $('.public-post-popup').toggleClass('open-1');
  });
  $('.cancel-ask').on('click', function(e){
    e.preventDefault();
    $('.question-box').toggleClass('open-1');
    $('.public-post-popup').toggleClass('open-1');
  });
</script>
@endsection

@section('post-container')
  <div class="create-post-container">
    <center>
      <!-- <h3>Create a <span>new post</span></h3> -->
      <h3>What are you <span>planning?</span></h3>
      <hr>
      <a href="" style="position: relative" id="public-post-popup">
        <div class="post-type">
          <i class="fa fa-globe"></i>
          <div class="public-post-container">
            <h4>Create a <span>post!</span></h4>
            <span>Pick your audiance!</span>
          </div>
        </div>
      </a>
      <a href="" id="private-post-popup">
        <div class="post-type">
          <i class="fa fa-gavel"></i>
          <div class="private-post-container">
            <h4>Create a <span>Challange!</span></h4>
            <!-- <span>Only you, and the people you share it with, can see this!</span> -->
            <span>Challange your friends to do a task</span>
          </div>
        </div>
      </a>
    </center>
  </div>

  <script type="text/javascript">
    var user_id = {{ Auth::User()->id }};
    var token = '{{ Session::token() }}';
  </script>
  <script type="text/javascript">
    $('.react-post-icon').mouseover(function(){
      $('.post-tinted').css("display", "block");
    });
    $('.post-tinted').mouseover(function(){
      $('.post-tinted').css("display", "block");
    });
    $('.post-tinted').mouseout(function(){
      $('.post-tinted').css("display", "none");
    });
  </script>
  @yield('js_script')

@endsection

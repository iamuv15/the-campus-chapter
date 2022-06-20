<div class="popup" id="popup">
  <div class="fullscreen-container">
    <form class="public-post-edit-popup"  id="create_post" method="post" action="{{ route('postAjax') }}">
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
            <textarea placeholder="What's new?" id="description-edit" name="description_name">{!! $post_content !!}</textarea>

            <script type="text/javascript">
              $('#description-edit').on('focus', function(){
                this.style.height = $('#description-edit').height();
                this.style.height = this.scrollHeight + 'px';
                console.log($('#description-edit').height());
              });

              $('#description-edit').on('input', function() {
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
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(e){
    // e.preventDefault();
    $('.fullscreen-container').css({"background-color": "rgba(0, 0, 0, 0.6)", "z-index": "9999"});
    // $('body').css({"overflow": "hidden"});
    $('.public-post-edit-popup').toggleClass('open-1');
    return false;
  });
  $('.close-1').click(function(){
    $('.fullscreen-container').css({"background-color": "#ecf0f5", "z-index": "-9999"});
    // $('.body').css({"overflow": "auto"});
    $('.public-post-edit-popup').toggleClass('open-1');
  });
</script>

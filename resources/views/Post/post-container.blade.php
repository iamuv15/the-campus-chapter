@section('basic-post-type')

@foreach($posts as $post)
  <!-- {{$post->user->likes }} Likes on all the posts by the authenticated user -->
  <!-- {{$post->likes }} Likes on all the posts -->
  <!-- {{ Auth::User()->id }} -->
  <!-- {{ $post->user->comments }} comments on all the posts by authenticated user-->
  <!-- {{ $post->comments }} comments on all the posts-->
  <!-- <span>&#x1F9D1</span> -->
  <div class="post-box">
    <div class="basic-post-container">
      <div class="basic-post-container-header">
        <div class="profile-pic">
          <img src="images/pro1.jpg" alt="" style="height: inherit; width: inherit; border-radius: inherit;">
        </div>
        <div class="user-description">
          @if($post->user->invites->status == 3)
            <a href="{{ DB::table('register_colleges')->where('college_id', '=', $post->user->college_id)->value('abbrivation') }}">{{ DB::table('register_colleges')->where('college_id', '=', $post->user->college_id)->value('college_name') }}</a>
            <i class="fa fa-university" title="Posted by {{ $post->user->first_name }} {{ $post->user->middle_name }} {{ $post->user->last_name }}"></i>
          @elseif($post->user->invites->status == 4)
            <a href="{{ $post->user->username }}" style="font-size: 14px;">{{ $post->user->first_name }} {{ $post->user->middle_name }} {{ $post->user->last_name }}</a>
            <i class="fa fa-graduation-cap" title="Member of the campus chapter"></i>
          @elseif($post->user->invites->status == 2)
            <a href="{{ $post->user->username }}" style="font-size: 14px;">{{ $post->user->first_name }} {{ $post->user->middle_name }} {{ $post->user->last_name }}</a>
            <i class="fa fa-bullhorn" title="Placement Representative"></i>
          @else
          <a href="{{ $post->user->username }}" style="font-size: 14px;">{{ $post->user->first_name }} {{ $post->user->middle_name }} {{ $post->user->last_name }}</a>
          @endif
          <p style="font-size: 11px; color: #999; font-weight: 400;">Shared Publically - {{ $post->user->created_at->format('M d, Y') }}</p>
        </div>
        <div id="post-popup-box-{{ $post->post_id }}" class="pull-right caret-down">
          <span><i class="fa fa-angle-down"></i></span>
        </div>
        <div class="caret-popup" id="popup-id-{{ $post->post_id }}">
          <form class="tooltip">
            <ul class="post-popup-menu">
              <li class="post-popup-list-item">
                <i class="fa fa-edit"></i>
                <a href="javascript:void(0)" id="edit">Edit</a>
              </li>
              <li class="post-popup-list-item">
                <i class="fa fa-trash"></i>
                <span>Delete</span>
              </li>
              <li class="post-popup-list-item">
                <i class="fa fa-flag-checkered"></i>
                <span>Report</span>
              </li>
            </ul>
          </form>
        </div>
      </div>
      <script type="text/javascript">
        $('#post-popup-box-' + {{ $post->post_id }}).on('click', function(){
          var that = $(this);
          var id = that.attr('id');
          $('#popup-id-'+ {{ $post->post_id }}).toggleClass('show-1');

        });
      </script>
      <div class="basic-post-container-body post-type-status">
        <!-- <div class="post-type-1">
          <img src="images/cov5.jpg" alt="" style="height: inherit; width: 100%;">
          <div class="status">
            <p>Just Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
           // New react-box for commenting, liking, saving and pinning
          <div class="react-box">
            <div class="react-btn" id="like-btn-{{ $post->post_id }}">
              <span>Liked</span>
              <div class="react-post-icon">
                <i class="fa fa-thumbs-up"></i>
              </div>
            </div>
            <div class="react-btn" id="comment-btn-{{ $post->post_id }}">
              <span>Commented&nbsp;</span>
              <div class="react-post-icon">
                <i class="fa fa-comments"></i>
              </div>
            </div>
            <div class="react-btn" id="pin-btn-{{ $post->post_id }}">
              <span>Pinned</span>
              <div class="react-post-icon">
                <i class="fa fa-thumb-tack"></i>
              </div>
            </div>
            <div class="react-btn" id="save-btn-{{ $post->post_id }}">
              <span>Saved</span>
              <div class="react-post-icon">
                <i class="fa fa-bookmark"></i>
              </div>
            </div>
          </div>

          // Old react box for commenting, liking, saving and pinning
          <div class="react-post-icon"><i class="fa fa-thumbs-up"></i></div>
          <div class="post-tinted">
            <div id="like" class="react-circle" title="Like the post">
              <i class="fa fa-thumbs-up"></i>
            </div>
              <ul class="react-options">
                <li id="save" class="rotate" title="Save the post">
                  <div class="react-circle">
                    <i class="fa fa-bookmark"></i>
                  </div>
                </li>
                <li id="pin" class="rotate" title="Pin the post to your profile">
                  <div class="react-circle">
                    <i class="fa fa-thumb-tack"></i>
                  </div>
                </li>
                <li id="report" class="rotate" title="Report post">
                  <div class="react-circle">
                    <i class="fa fa-flag-checkered"></i>
                  </div>
                </li>
                <li id="comment" class="rotate" title="Comment on the post">
                  <div class="react-circle">
                    <i class="fa fa-comments"></i>
                  </div>
                </li>
              </ul>
          </div>
        </div> -->
        <div class="post-type-2">
          <div class="status post-id-{{ $post->post_id }}">
            <p>{{ $post->post_message }}</p>
          </div>
          <form action="{{ route('react') }}" method="post" class="react-box">
            <div class="react-btn" id="like-btn-{{ $post->post_id }}">
              <span>Liked</span>
              <div class="react-post-icon">
                <i class="fa fa-thumbs-up"></i>
              </div>
            </div>

            @foreach($post->likes as $yo)
              @if($yo->post_id == $post->post_id  && $yo->user_id == Auth::User()->id)
                <script type="text/javascript">
                  $('#like-btn-{{ $post->post_id }}').toggleClass('change-btn');
                  $('#like-btn-{{ $post->post_id }} > span').toggleClass('show');
                </script>
              @endif
            @endforeach
            <!-- <div class="react-btn" id="comment-btn-{{ $post->post_id }}">
              <span>Commented&nbsp;</span>
              <div class="react-post-icon">
                <i class="fa fa-comments"></i>
              </div>
            </div> -->
            <!-- @foreach($post->comments as $userComment)
              @if($userComment->user_id == Auth::User()->id)
                <script type="text/javascript">
                  $('#comment-btn-{{ $post->post_id }}').addClass('change-btn');
                  $('#comment-btn-{{ $post->post_id }} > span').addClass('show');
                </script>
                <?php // break; ?>
              @else
              <script type="text/javascript">
                $('#comment-btn-{{ $post->post_id }}').removeClass('change-btn');
                $('#comment-btn-{{ $post->post_id }} > span').removeClass('show');
              </script>
              @endif
            @endforeach -->
            <div class="react-btn" id="save-btn-{{ $post->post_id }}">
              <span>Saved</span>
              <div class="react-post-icon">
                <i class="fa fa-bookmark"></i>
              </div>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
          </form>
        </div>
      </div>
      <div class="response-stats">
        <span><span class="like-count">{{ $post->likes->count() }}</span> Likes - {{ $post->comments->count() }} Comments</span>
      </div>
      <!-- <div class="basic-post-response-btns">
        <ul>
          <a href=""><li><span><i class="fa fa-thumbs-up"></i><span>Like</span></span></li></a>
          <a href=""><li><span><i class="fa fa-paper-plane"></i><span>Direct Message</spa class="center"n></span></li></a>
          <a href=""><li><span><i class="fa fa-thumb-tack"></i><span>Pin</span></span></li></a>
        </ul>
      </div> -->
    </div>
    <div class="basic-post-comment-box">
      <div class="profile-pic">
        <img src="images/pro1.jpg" alt="" style="height: inherit; width: inherit; border-radius: inherit;">
      </div>
      <form action="{{ route('react') }}" class="comment-field" method="post"  data-id="{{ $post->post_id }}">
        <input type="text" placeholder="Write a comment...">
        <input type="hidden" name="_token" value="{{ Session::token() }}">
      </form>
    </div>
    @if($post->comments->count() !== 0)
      <div class="comment-display-area">
        <ul class="comment-list">
          @foreach($post->comments->sortByDesc('id')->take(2) as $userComment)
            <li class="comment-list-item">
              <div class="comment-content">
                <div class="user-dp">
                  <img src="images/pro1.jpg" alt="" style="height: inherit; width: inherit; border-radius: inherit;">
                </div>
                <div class="user-desc">
                  <a href="{{ $userComment->user['username'] }}">
                    {{ $userComment->user['first_name'] }} {{ $userComment->user['middle_name'] }} {{ $userComment->user['last_name'] }}
                  </a>
                </div>
                <div class="user-comment">
                  <p>{{$userComment->comment}}</p>
                </div>
              </div>
              <div class="comment-react-box">
                <a href="#">Like</a>
                <a href="#">Reply</a>
                <a href="#">Report</a>
              </div>
            </li>
          @endforeach
        </ul>
        @foreach($post->comments->take(1) as $userComment)
          @if($post->comments->count() > 2)
            <a href="" class="fetch-more" data-next-set="ajax/post/comments/{{ $userComment->post_id }}">Load More</a>
          @endif
        @endforeach
      </div>
    @endif
    <script type="text/javascript">
      $(document).ready(function(){
        var i = 0;
        var status = $('.post-id-' + {{ $post->post_id }} + ' > p').text();
          var hashtag = $('.post-id-' + {{ $post->post_id }} + ' > p').text().match(/#\w*\s*/gi);

        if(hashtag){
          while(i !== hashtag.length){
            var hash = hashtag[i];
            var elem = $(".post-id-" + {{ $post->post_id }} + " > p:contains("+hashtag[i]+")");
            elem.text(elem.text().replace(hashtag[i], "<a href='' id='" + hashtag[i] + "' class='tag-link'>" + hashtag[i] + "</a>"));
            var show = elem.text();
            i++;
          }
        }
        $('.post-id-' + {{ $post->post_id }} + ' > p').html(show);
      });
    </script>

    <script type="text/javascript">
      var token = '{{ Session::token() }}';

      $('#popup-id-{{ $post->post_id }}').find('.post-popup-list-item > #edit').on('click', function(e){
        e.preventDefault();
        var post_content = $('.post-id-{{ $post->post_id }} > p').text();
        // post_content = JSON.parse(post_content.replace(/&quot;/g,'"'));
        console.log(post_content);
        $.ajax({
          url: 'post/edit/{post_id}/{post_content}',
          method: 'GET',
          data: {'post_id': {{ $post->post_id }}, 'post_content': post_content},
          success: function(res){
            $('.ajax-edit').html(res);
            // console.log(res);
          }
        });
        return false;
      });
    </script>
  </div>

@endforeach

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
<!-- @ yield('js_script') -->

@endsection

@yield('basic-post-type')

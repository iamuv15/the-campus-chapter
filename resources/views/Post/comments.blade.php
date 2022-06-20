@foreach($comments as $userComment)
  <li class="comment-list-item">
    <div class="comment-content">
      <div class="user-dp">
        <img src="images/pro1.jpg" alt="" style="height: inherit; width: inherit; border-radius: inherit;">
      </div>
      <div class="user-desc">
        <a href="{{ $userComment->user_id }}">
          <?php $user = DB::table('users')->where('id', '=', $userComment->user_id)->first() ?>
          {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}
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

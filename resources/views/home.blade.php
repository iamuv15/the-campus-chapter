@extends('inc.header')

@section('title', 'Home')
@section('css')
  <link rel="stylesheet" href="{{asset('links/css/home.css')}}">
@endsection
@section('section-content')
  @parent
  @include('post.create-post')

      <!-- Home page design -->


      <div class="content-wrapper">
        <div class="inner-content-wrapper">
          <div class="left-section">
            <div class="user-wigid-list">
              <ul>
                  @if($authUser->status == 3)
                  <a data-type="{{ $authUser->invites->status }}" href="{{ DB::table('register_colleges')->where('college_id', '=', $authUser->college_id)->value('abbrivation') }}" data-type="{{ $authUser->status }}">
                    <li class="profile-card">
                      <img class="profile-pic" src="images/pro1.jpg" alt="">
                      <span class="profile-name">
                        {{ DB::table('register_colleges')->where('college_id', '=', $authUser->college_id)->value('college_name') }}
                      </span>
                    </li>
                  </a>
                  @else
                  <a data-type="{{ $authUser->invites->status }}" href="{{ $authUser->username }}">
                    <li>
                      <img class="profile-pic" src="images/pro1.jpg" alt="" src="images/pro1.jpg" alt="">
                      <span>
                        {{ $authUser->first_name }} {{ $authUser->middle_name }} {{ $authUser->last_name }}
                      </span>
                    </li>
                  </a>
                  @endif
                <a href="#">
                  <li class="active">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Newsfeed</span>
                  </li>
                </a>
                <a href="#">
                  <li>
                    <i class="fa fa-calendar"></i>
                    <span>Upcoming Events</span>
                  </li>
                </a>
                <form action="{{ route('logout') }}" method="post">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                  <button type="submit">Logout</button>
                </form>
              </ul>
            </div>
          </div>

          <div class="newsfeed-section">
            @if($authUser->invites->status == 3 || $authUser->invites->status == 4)
              <div class="post-section">
                @yield('post-container')
              </div>
            @endif
            <div class="newsfeed" data-next-page="{{ $posts->nextPageUrl() }}">
              @include('post.post-container')
            </div>
            <p class="alert-user hide">No more left to show</p>
            <div class="timeline-wrapper">
              <div class="timeline-item">
                  <div class="animated-background">
                      <div class="background-masker header-picture"></div>
                      <div class="round-background"></div>
                      <div class="background-masker header-top"></div>
                      <div class="background-masker header-left"></div>
                      <div class="background-masker header-right"></div>
                      <div class="background-masker header-bottom"></div>
                      <div class="background-masker subheader-left"></div>
                      <div class="background-masker subheader-right"></div>
                      <div class="background-masker subheader-bottom"></div>
                      <div class="background-masker content-top"></div>
                      <div class="background-masker content-first-end"></div>
                      <div class="background-masker content-second-line"></div>
                      <div class="background-masker content-second-end"></div>
                      <div class="background-masker content-third-line"></div>
                      <div class="background-masker content-third-end"></div>
                  </div>
              </div>
            </div>
          </div>
          <!-- <div class="transparent"></div> -->
          <div class="right-section">
            <!-- Challenges div -->
            <div class="challenges-section">
              <h4>My challenges</h4>
              <ul class="challenges-list">
                <li class="challenges-list-item">
                  <div class="ch-icon">
                    <i class="fa fa-gavel"></i>
                  </div>
                  <div class="ch-info">
                    <span>A normal debate challenge has an even bigger title because of a stupid person trying to degrade the look of the website!</span>
                    <div>
                      <span class="ch-date">July 27, 2018 at</span>
                      <span class="ch-time">6 PM</span>
                    </div>
                  </div>
                </li>
                <a href="#">
                  <div class="ch-join">
                    <p>Start Debate <i class="fa fa-arrow-right"></i></p>
                  </div>
                </a>
                <li class="challenges-list-item">
                  <div class="ch-icon">
                    <i class="fa fa-bicycle"></i>
                  </div>
                  <div class="ch-info">
                    <span>A normal cycling challenge</span>
                    <div>
                      <span class="ch-date">July 27, 2018 at</span>
                      <span class="ch-time">6 PM</span>
                    </div>
                  </div>
                </li>
                <a href="#">
                  <div class="ch-join">
                    <p>Start Cycling <i class="fa fa-arrow-right"></i></p>
                  </div>
                </a>
                <li class="challenges-list-item">
                  <div class="ch-icon">
                    <i class="fa fa-bicycle"></i>
                  </div>
                  <div class="ch-info">
                    <span>A normal cycling challenge has a bigger title</span>
                    <div>
                      <span class="ch-date">July 27, 2018 at</span>
                      <span class="ch-time">6 PM</span>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <!-- Challanges div ends -->
            <!-- Reminders div -->
            <div class="reminders-section">
              <h4>My Reminders</h4>
              <ul class="reminders-list">
                <li class="reminders-list-item">
                  <div class="rm-icon">
                    <i class="fa fa-gavel"></i>
                  </div>
                  <div class="rm-info">
                    <span>A normal debate challenge has an even bigger title because of a stupid person trying to degrade the look of the website!</span>
                    <div>
                      <span class="rm-date">July 27, 2018 at</span>
                      <span class="rm-time">6 PM</span>
                    </div>
                  </div>
                </li>
                <li class="reminders-list-item">
                  <div class="rm-icon">
                    <i class="fa fa-bicycle"></i>
                  </div>
                  <div class="rm-info">
                    <span>A normal cycling challenge</span>
                    <div>
                      <span class="rm-date">July 27, 2018 at</span>
                      <span class="rm-time">6 PM</span>
                    </div>
                  </div>
                </li>
                <li class="reminders-list-item">
                  <div class="rm-icon">
                    <i class="fa fa-bicycle"></i>
                  </div>
                  <div class="rm-info">
                    <span>A normal cycling challenge has a bigger title</span>
                    <div>
                      <span class="rm-date">July 27, 2018 at</span>
                      <span class="rm-time">6 PM</span>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <!-- Reminders div ends -->
          </div>
        </div>
      </div>
@endsection

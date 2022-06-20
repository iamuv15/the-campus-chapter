@extends('inc.header')

@section('section-content')
  @parent

<div class="header-container">
  <div class="cover-container">
    <img src="{{ asset('images/cov2.jpg') }}" alt="" style="height: inherit; width: inherit;">
    <div class="cover-tinted">
      <div class="cover-info-container">
        <div class="profile-pic">
          <div class="profile-pic-container">
            <img src="{{ asset('images/pro1.jpg') }}" alt="Oh! We didn't found it">
          </div>
        </div>
        <div class="cover-userinfo">
          <p>Happy Club</p>
          <p>Category of the Club</p>
          <p>SLIET</p>
        </div>
        <a class="change-btn" href="">
          <div class="edit-btn">
            Change Cover
          </div>
        </a>
      </div>
      <div class="link-section">
        <a href="{{ asset('college') }}"><span style="color: #cccccc;">Chapter</span>
          <!-- <span class="caret"></span> -->
        </a>
        <a href="{{ asset('college/job_profile') }}">Job Profiles</a>
        <a href="{{ asset('college/manage') }}">Manage</a>
      </div>
      <div class="btn-follow">
        <!-- <button type="button" name="button" id="btn-follow">Visit Website</button> -->
        <button type="button" name="button" id="apply-btn">Visit Website</button>
        <!-- <button type="button" name="button" class="ellipsis-h"><i class="fa fa-ellipsis-h"></i></button> -->
      </div>
    </div>
  </div>
</div>

<div class="content user-info">
  <div class="navigation-wrapper manage-wrapper">
    <ul>
      <a href="" id="info">
        <i class="fa fa-info-circle active">
          <li>Companies Linked</li>
        </i>
      </a>
      <a href="" id="personal-statement">
        <i class="fa fa-briefcase">
          <li>Jobs Listed</li>
        </i>
      </a>
      <a href="" id="education">
        <i class="fa fa-briefcase">
          <li>Manage PRs</li>
        </i>
      </a>
      <a href="" id="achievements">
        <i class="fa fa-briefcase">
          <li>Change Password</li>
        </i>
      </a>
    </ul>
    <div class="info-display active" id="personal-info">
      <div class="header">
        <h4>Companies Linked</h4>
      </div>
      <div class="body">
        <ul>
          <li>
            <i class="material-icons">account_balance</i>
            <div>
              <span class="title">Company Name is bigger than normal</span>
              <p>1 Job posted</p>
            </div>
          </li>
          <li>
            <i class="material-icons">account_balance</i>
            <div>
              <span class="title">Company Name</span>
              <p>1 Job posted</p>
            </div>
          </li>
          <li>
            <i class="material-icons">account_balance</i>
            <div>
              <span class="title">Company Name</span>
              <p>1 Job posted</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="info-display" id="personal-statement">
      <div class="header">
        <h4>Jobs Listed</h4>
      </div>
      <div class="job-profile">
        <div class="job-title">
          <h4>Name of the Company</h4>
        </div>
        <div class="job-description">
          <table>
            <tbody>
              <tr>
                <td>Job Profile</td>
                <td>:</td>
                <td>Technical</td>
              </tr>
              <tr>
                <td>Skills Required</td>
                <td>:</td>
                <td>Web Development</td>
              </tr>
              <tr>
                <td>Annual Package</td>
                <td>:</td>
                <td>6 LPA CTC</td>
              </tr>
              <tr>
                <td>Apply By</td>
                <td>:</td>
                <td>20 August, 2018</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="job-footer">
          <a href="company/job_posting">Apply</a>
        </div>
      </div>
      <div class="job-profile">
        <div class="job-title">
          <h4>Name of the Company</h4>
        </div>
        <div class="job-description">
          <table>
            <tbody>
              <tr>
                <td>Job Profile</td>
                <td>:</td>
                <td>Technical</td>
              </tr>
              <tr>
                <td>Skills Required</td>
                <td>:</td>
                <td>Web Development</td>
              </tr>
              <tr>
                <td>Annual Package</td>
                <td>:</td>
                <td>6 LPA CTC</td>
              </tr>
              <tr>
                <td>Apply By</td>
                <td>:</td>
                <td>20 August, 2018</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="job-footer">
          <a href="company/job_posting">Apply</a>
        </div>
      </div>
    </div>
    <div class="info-display" id="education">
      <div class="header">
        <h4>Manage PRs</h4>
      </div>
      <div class="body">
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
                <span class="pull-right"><a id="friend-btn">Active PR</a></span>
              <p class="course">Computer Science Engineering</p>
            </div>
          </div>
          <div class="friend-container">
            <div class="friend-cover">
              <img src="{{asset("Images/cov2.jpg")}}" alt="">
            </div>
            <div class="pp-friend">
              <img src="{{asset("Images/pro1.jpg")}}" alt="">
            </div>
            <div class="friend-intro">
              <span><a href="">Ujjwal Verma</a></span>
                <span class="pull-right"><a id="friend-btn">Active PR</a></span>
              <p class="course">Computer Science Engineering</p>
            </div>
          </div>
          <div class="friend-container">
            <div class="friend-cover">
              <img src="{{asset("Images/cov2.jpg")}}" alt="">
            </div>
            <div class="pp-friend">
              <img src="{{asset("Images/pro1.jpg")}}" alt="">
            </div>
            <div class="friend-intro">
              <span><a href="">Ujjwal Verma</a></span>
                <span class="pull-right"><a id="friend-btn">Active PR</a></span>
              <p class="course">Computer Science Engineering</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="info-display" id="achievements">
      <div class="header">
        <h4>Change Password</h4>
      </div>
      <div class="body">
        <form class="" action="index.html" method="post">
          <label for="current_password">Current Password</label>
          <input type="password" id="current_password" name="" value=""><br>
          <label for="new_password">New Password</label>
          <input type="password" id="new_password" name="" value=""><br>
          <label for="confirm_password">Confirm Password</label>
          <input type="password" id="confirm_password" name="" value="">
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('#friend-btn').mouseover(function(){
  $('#friend-btn').html('Remove');
});
$('#friend-btn').mouseout(function(){
  $('#friend-btn').html('Active PR');
});
</script>

@endsection

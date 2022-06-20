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

@if(strpos($_SERVER['REQUEST_URI'], '/job_profile') !== false)
  <div class="content">
  <div class="header">
    <h3>Job Profiles</h3>
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
        <a href="/job_posting">Apply</a>
      </div>
    </div>
    <div class="job-profile">
      <div class="job-title">
        <h4>A big company name which can extend to another line</h4>
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
              <td>Android Development</td>
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
        <a href="">Apply</a>
      </div>
    </div>
    <div class="job-profile">
      <div class="job-title">
        <h4>A random Company Name</h4>
      </div>
      <div class="job-description">
        <table>
          <tbody>
            <tr>
              <td>Job Profile</td>
              <td>:</td>
              <td>Management</td>
            </tr>
            <tr>
              <td>Skills Required</td>
              <td>:</td>
              <td>Public Relations</td>
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
        <a href="">Apply</a>
      </div>
    </div>
  </div>
</div>
@elseif(strpos($_SERVER['REQUEST_URI'], '/manage') !== false)
  @include('inc.post-container')
  @include('college.manage')
@else
  <div class="content">
    @yield('basic-post-type')
  </div>
@endif

@endsection

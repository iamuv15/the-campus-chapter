

@extends('inc.header')

@section('section-content')

@if(strpos($_SERVER['REQUEST_URI'], $user->username) !== false)
@section('title', $user->username)
@include('inc.cover')
<div class="content user-info">
  <div class="inline-content">
    <div class="navigation-wrapper">
      <ul>
        <a href="" id="info">
          <i class="fa fa-info-circle active">
            <li>Personal Information</li>
          </i>
        </a>
        <a href="" id="personal-statement">
          <i class="fa fa-briefcase">
            <li>Personal Statement</li>
          </i>
        </a>
        <a href="" id="education">
          <i class="fa fa-briefcase">
            <li>Education</li>
          </i>
        </a>
        <a href="" id="achievements">
          <i class="fa fa-briefcase">
            <li>Achievements</li>
          </i>
        </a>
        <a href="" id="work-exp">
          <i class="fa fa-briefcase">
            <li>Work Experience</li>
          </i>
        </a>
        <a href="" id="skills">
          <i class="icon-flash fa fa-heart">
            <li>Skills</li>
          </i>
        </a>
        <a href="" id="interests">
          <i class="icon-flash fa fa-heart">
            <li>Hobbies and interests</li>
          </i>
        </a>
        <a href="" id="languages">
          <i class="fa fa-bullhorn">
            <li>Languages Known</li>
          </i>
        </a>
        <a href="" id="contact">
          <i class="fa fa-phone">
            <li>Contact Information</li>
          </i>
        </a>
      </ul>
      <div class="info-display" id="personal-info">
        <div class="header">
          <h4>Personal Information</h4>
        </div>
        <div class="body">
          <table>
            <tbody>
              <tr>
                <td class="title">Name</td>
                <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
              </tr>
              <tr>
                <td class="title">Registration Number</td>
                <td>{{ $user->userInfo->registration_number }}</td>
              </tr>
              <tr>
                <td class="title">Branch</td>
                <td>
                  @foreach($user->courses as $course)
                    {{ $course->course_name }}
                  @endforeach
                </td>
              </tr>
              <tr>
                <td class="title">Batch</td>
                <td>{{ $user->userInfo->batch }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="info-display" id="personal-statement">
        <div class="header">
          <h4>Personal Statement</h4>
          <i class="fa fa-pencil pull-right" onclick="on()"></i>
        </div>
        <div class="body">
          <p>{{ $user->personalStatements->personal_statement }}</p>
          <div>
            <p>This will be present on your resume head. Write attractive statement and be concise</p>
          </div>
        </div>
      </div>
      <div class="info-display" id="education">
        <div class="header">
          <h4>Education Information</h4>
          <i class="fa fa-plus pull-right" onclick="on()"></i>
        </div>
        <div class="body">
          <table>

            @foreach($user->education_profiles as $education_profile)

            <tbody class="education">
              <tr>
                <td>{{ $education_profile->education_profile }}</td>
                <td class="th">Year Passed</td>
                <td class="th">Marks Obtained</td>
                <td>
                  <i class="fa fa-pencil" onclick="on()"></i>
                </td>
              </tr>
              <tr class="tbl-border">
                <td class="title">{{ $education_profile->pivot->institution_name }}</td>
                <td class="title">{{ $education_profile->pivot->year }}</td>
                <td class="title">{{ $education_profile->pivot->marks }}</td>
                <td>
                  <i class="fa fa-trash" onclick="on()"></i>
                </td>
              </tr>
            </tbody>

            @endforeach
            <!-- <tbody class="education">
              <tr>
                <td>Senior Secondary Schooling (XII)</td>
                <td class="th">Year Passed</td>
                <td class="th">Marks Obtained</td>
                <td>
                  <i class="fa fa-pencil" onclick="on()"></i>
                </td>
              </tr>
              <tr class="tbl-border">
                <td class="title">Step By Step High School, Jaipur</td>
                <td class="title">2012</td>
                <td class="title">82%</td>
                <td>
                  <i class="fa fa-trash" onclick="on()"></i>
                </td>
              </tr>
            </tbody>
            <tbody class="education">
              <tr>
                <td>Graduation</td>
                <td class="th">Year Passed</td>
                <td class="th">Marks Obtained</td>
                <td>
                  <i class="fa fa-pencil" onclick="on()"></i>
                </td>
              </tr>
              <tr class="tbl-border">
                <td class="title">Sant Longowal Institute of Engineering and Technology, Sangrur</td>
                <td class="title">2012</td>
                <td class="title">82%</td>
                <td>
                  <i class="fa fa-trash" onclick="on()"></i>
                </td>
              </tr>
            </tbody> -->
          </table>
        </div>
      </div>
      <div class="info-display" id="achievements">
        <div class="header">
          <h4>Achievements</h4>
          <i class="fa fa-plus pull-right" onclick="on()"></i>
        </div>
        <div class="body">
          <table>
            @foreach($user->achievements as $achievement)
              @foreach($achievement->dates as $date)
                <tbody class="education">
                  <tr>
                    <td>{{ $achievement->title }}</td>
                    <td class="th">Date achieved</td>
                    <td>
                      <i class="fa fa-pencil" onclick="on()"></i>
                    </td>
                  </tr>
                  <tr class="tbl-border">
                    <td class="title">{{ $achievement->describe }}</td>
                    <td class="title">{{ $date->month }} {{ $date->year }}</td>
                    <td>
                      <i class="fa fa-trash" onclick="on()"></i>
                    </td>
                  </tr>
                </tbody>
              @endforeach
            @endforeach
          </table>
        </div>
      </div>
      <div class="info-display" id="work-exp">
        <div class="header">
          <h4>Work Experience</h4>
          <i class="fa fa-plus pull-right" onclick="on()"></i>
        </div>
        <div class="body">
          <table>
            @foreach($user->workExperiences as $workExperience)

            <tbody class="education">
              <tr>
                <td>{{ $workExperience->company_name }}</td>
                <td class="th">Tanure</td>
                <td>
                  <i class="fa fa-pencil" onclick="on()"></i>
                </td>
                <!-- <td class="th"></td> -->
              </tr>
              <tr class="tbl-border">
                <td class="title">{{ $workExperience->job_description }}</td>
                <?php
                  $start_date = DB::table('new_dates')->where('id', '=', $workExperience->start_date)->get();
                  $end_date = DB::table('new_dates')->where('id', '=', $workExperience->end_date)->get();
                ?>

                <td class="title th">
                  @foreach($start_date as $start)
                    {{ $start->month }} {{ $start->year }}
                  @endforeach

                  -

                  @if(is_null($workExperience->end_date))
                    Present
                    @else
                    @foreach($end_date as $end)
                      {{ $end->month }} {{ $end->year }}
                    @endforeach
                  @endif

                </td>

                <td>
                  <i class="fa fa-trash" onclick="on()"></i>
                </td>
                <!-- <td class="title"></td> -->
              </tr>
            </tbody>

            @endforeach
          </table>
        </div>
      </div>
      <div class="info-display" id="skills">
        <div class="header">
          <h4>Technical Skills</h4>
          <i class="fa fa-plus pull-right" onclick="on()"></i>
          <i class="fa fa-pencil pull-right" onclick="on()"></i>
        </div>
        <div class="body">
          <ol>
            @foreach($user->skills as $skill)
              <li id="{{ $skill->id }}">{{ $skill->skills }}</li>
            @endforeach
          </ol>
        </div>
      </div>
      <div class="info-display" id="interests">
        <div class="header">
          <h4>Interests</h4>
          <i class="fa fa-plus pull-right" onclick="on()"></i>
          <i class="fa fa-pencil pull-right" onclick="on()"></i>
        </div>
        <div class="body">
          <ol>
            <!-- <li>photography</li>
            <li>singing</li>
            <li>reading</li>
            <li>outdoor games</li>
            <li>pc games</li>
            <li>listening music</li>
            <li>acting</li>
            <li>direction</li> -->
            @foreach($user->interests as $interest)
              <li id="{{ $interest->id }}">{{ $interest->interests }}</li>
            @endforeach
          </ol>
        </div>
      </div>
      <div class="info-display" id="languages">
        <div class="header">
          <h4>Languages Known</h4>
          <i class="fa fa-plus pull-right" onclick="on()"></i>
          <i class="fa fa-pencil pull-right" onclick="on()"></i>
        </div>
        <div class="body">
          <ol>
            @foreach($user->languages_known as $language)
              <li id="{{ $language->id }}">{{ $language->languages_known }}</li>
            @endforeach
          </ol>
        </div>
      </div>
      <div class="info-display active" id="contact">
        <div class="header">
          <h4>Contact Information</h4>
          <i class="fa fa-pencil pull-right" onclick="on()"></i>
        </div>
        <div class="body">
          <table>
            <tbody>
              <tr>
                <td class="title">Contact Number</td>
                <td>{{ $user->userInfo->contact_number }}</td>
              </tr>
              <tr>
                <td class="title">E-mail</td>
                @foreach($user->alternateEmails as $alternateEmail)
                  <td>{{ $alternateEmail->email }}</td>
                @endforeach
              </tr>
              <tr>
                <td class="title">Links</td>
                @foreach($user->importantLinks as $importantLink)
                  <td><a href="http://www.{{ $importantLink->important_links }}">{{ $importantLink->important_links }}</a></td>
                @endforeach
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="popup-form">
  <!-- <div class="info-display" id="personal-info">
    <div class="header">
      <h4>Personal Information</h4>
      <i class="fa fa-close pull-right" onclick="off()"></i>
    </div>
    <form class="" action="index.html" method="post">
      <div class="body">
        <div>
          <h4 class="title">Name</h4>
          <input type="text" value="Ujjwal Verma">
        </div>
        <div>
          <h4 class="title">Registration Number</h4>
          <input type="text" value="GCS/SL/15/4004">
        </div>
        <div>
          <h4 class="title">Branch</h4>
          <select class="" name="">
            <option value="">Computer Science and Engineering</option>
            <option value="">Electrical Engineering</option>
            <option value="">Mechanical Engineering</option>
            <option value="">Electronics Engineering</option>
            <option value="">Food Engineering</option>
            <option value="">Chemical Engineering</option>
          </select>
        </div>
        <div>
          <h4 class="title">Branch</h4>
          <select class="" name="">
            <option value="">2k15</option>
            <option value="">2k16</option>
            <option value="">2k17</option>
            <option value="">2k18</option>
          </select>
        </div>
      </div>
      <div class="footer">
        <button type="button" name="button">Update Changes</button>
      </div>
    </form>
  </div> -->
  <div class="info-display" id="personal-statement">
    <div class="header">
      <h4>Personal Statement</h4>
      <i class="fa fa-close pull-right" onclick="off()"></i>
    </div>
    <form class="personal_statement" action="{{ $user->username }}/update" method="post">
      <div class="body">
        <div>
          <textarea name="name">{{ $user->personalStatements->personal_statement }}</textarea>
        </div>
        <div>
          <p>This will be present on your resume head. Write attractive statement and be concise</p>
        </div>
      </div>
      <div class="footer">
        <button type="submit" name="button">Update Changes</button>
      </div>
    </form>
  </div>
  <div class="info-display single-edit" id="education">
    <div class="header">
      <h4>Education Information</h4>
      <i class="fa fa-close pull-right" onclick="off()"></i>
    </div>
    <form id="education" action="{{ $user->username }}/update/education" method="post">
      <div class="body">
        <div>
          <h4>Education Profile *</h4>
          <select class="education_profile" name="education_profile">
            <option value="">Educational Profile</option>
            <?php
              $education_profiles = DB::table('education_profiles')->get();
            ?>
            @foreach($education_profiles as $education_profile)
              <option value="{{ $education_profile->education_profile }}">{{ $education_profile->education_profile }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <h4>Name of the Institution *</h4>
          <textarea name="name" placeholder="Enter name of the school or college"></textarea>
        </div>
        <div>
          <h4>Marks Obtained *</h4>
          <input class="input-marks" type="number" name="input_marks" value="" placeholder="Enter average CGPA or equivalent percentage">
        </div>
        <div>
          <h4>Year Passed *</h4>
          <!-- <select class="month" name="month">
            <option value="">Month</option>
            <option value="">January</option>
            <option value="">Feburary</option>
            <option value="">March</option>
            <option value="">April</option>
            <option value="">May</option>
            <option value="">June</option>
            <option value="">July</option>
            <option value="">August</option>
            <option value="">September</option>
            <option value="">October</option>
            <option value="">November</option>
            <option value="">December</option>
          </select> -->
          <select class="year" name="Year">
            <option value="">Year</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
          </select>
        </div>
      </div>
      <div class="footer">
        <button type="submit" name="button">Save Changes</button>
      </div>
    </form>
  </div>
  <div class="info-display single-edit" id="achievements">
    <div class="header">
      <h4>Achievements</h4>
      <i class="fa fa-close pull-right" onclick="off()"></i>
    </div>
    <form id="achievement" action="{{ $user->username }}/update/achievements" method="post">
      <div class="body">
        <div>
          <h4>Achievement Title *</h4>
          <input type="text" name="title" value="" placeholder="Achievement title here">
        </div>
        <div>
          <h4>Describe *</h4>
          <textarea name="name" placeholder="Mention about the certificates earned by you to stand out!"></textarea>
        </div>
        <div>
          <h4>Date Achieved *</h4>
          <select class="" name="month">
            <option value="">Month</option>
            <option value="January">January</option>
            <option value="Feburary">Feburary</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
          </select>
          <select class="" name="Year">
            <option value="">Year</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
          </select>
        </div>
      </div>
      <div class="footer">
        <button type="submit" name="button">Save Changes</button>
      </div>
    </form>
  </div>
  <div class="info-display single-edit" id="work-exp">
    <div class="header">
      <h4>Work Experience</h4>
      <i class="fa fa-close pull-right" onclick="off()"></i>
    </div>
    <form id="work-exp" action="{{ $user->username }}/update/work_experience" method="post">
      <div class="body">
        <div>
          <h4>Company Name *</h4>
          <input type="text" name="name" value="" placeholder="Enter Company name here">
        </div>
        <div>
          <h4>Job description *</h4>
          <textarea name="describe" placeholder="Provide details of task performed"></textarea>
        </div>
        <div>
          <h4>From *</h4>
          <select class="" name="start_month">
            <option value="">Month</option>
            <option value="January">January</option>
            <option value="Feburary">Feburary</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
          </select>
          <select class="" name="start_Year">
            <option value="">Year</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
          </select>
        </div>
        <div class="to">
          <h4>To *</h4>
          <select class="" name="end_month">
            <option value="">Month</option>
            <option value="January">January</option>
            <option value="Feburary">Feburary</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
          </select>
          <select class="" name="end_Year">
            <option value="">Year</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
          </select>
        </div>
        <div>
          <h4>
            <input type="checkbox" name="" value="" id="check-wrk">
            <label for="check-wrk">I'm currently working here</label>
          </h4>
        </div>
      </div>
      <div class="footer">
    </form>
      <button type="submit" name="button">Save Changes</button>
    </div>
  </div>
  <div class="info-display" id="skills">
    <div class="header">
      <h4>Technical Skills</h4>
      <i class="fa fa-close pull-right" onclick="off()"></i>
    </div>
    <form id="skills" action="{{ $user->username }}/add/skills" method="post">
      <div class="body">
        <div>
          <textarea name="name"></textarea>
        </div>
        <div class="drop-down-container" style="display: none; border-bottom: 1px solid #367fa9;">
          <ol>

          </ol>
        </div>
        <!-- <div class="skill-set">
          <ol>
            <?php
              $result = DB::table('skills')->limit(2)->get();
            ?>
            @foreach($result as $skill)
              <li class="skill-set-item" id="{{ $skill->id }}">{{ $skill->skills }}</li>
            @endforeach
          </ol>
        </div> -->
        <div class="items-added">
          <ol>

          </ol>
        </div>
      </div>
      <div class="footer">
        <button type="submit" name="button">Update Changes</button>
      </div>
    </form>
  </div>
  <div class="info-display" id="interests">
    <div class="header">
      <h4>Interests</h4>
      <i class="fa fa-close pull-right" onclick="off()"></i>
    </div>
    <form id="interests" action="{{ $user->username }}/add/interests" method="post">
      <div class="body">
        <div>
          <textarea name="name"></textarea>
        </div>
        <!-- <div>
          <ol>
            <li>photography</li>
            <li>singing</li>
            <li>reading</li>
            <li>outdoor games</li>
            <li>pc games</li>
            <li>listening music</li>
            <li>acting</li>
            <li>direction</li>
          </ol>
        </div> -->

        <div class="drop-down-container" style="display: none; border-bottom: 1px solid #367fa9;">
          <ol>

          </ol>
        </div>

        <div class="items-added">
          <ol>

          </ol>
        </div>

      </div>
      <div class="footer">
        <button type="submit" name="button">Update Changes</button>
      </div>
    </form>
  </div>
  <div class="info-display" id="languages">
    <div class="header">
      <h4>Languages Known</h4>
      <i class="fa fa-close pull-right" onclick="off()"></i>
    </div>
    <form id="languages" action="{{ $user->username }}/add/languages" method="post">
      <div class="body">
        <div>
          <textarea name="name"></textarea>
        </div>
        <!-- <div>
          <ol>
            <li>hindi</li>
            <li>english</li>
            <li>punjabi</li>
          </ol>
        </div> -->

        <div class="drop-down-container" style="display: none; border-bottom: 1px solid #367fa9;">
          <ol>

          </ol>
        </div>

        <div class="items-added">
          <ol>

          </ol>
        </div>

      </div>
      <div class="footer">
        <button type="submit" name="button">Update Changes</button>
      </div>
    </form>
  </div>
  <div class="info-display" id="contact">
    <div class="header">
      <h4>Contact Information</h4>
      <i class="fa fa-close pull-right" onclick="off()"></i>
    </div>
    <form id="contact" action="{{ $user->username }}/update/contact" method="post">
      <div class="body">
        <div>
          <h4>Contact Number</h4>
          <input type="number" name="contact_number" value="">
        </div>
        <div>
          <h4>E-mail</h4>
          <input type="text" name="email" value="">
        </div>
        <div>
          <h4>Links</h4>
          <input type="text" name="link" value="">
        </div>
      </div>
      <div class="footer">
        <button type="submit" name="button">Update Changes</button>
      </div>
    </form>
  </div>
  <div class="info-display" id="delete">
    <div class="header">
      <h4>Confirm Selection</h4>
      <i class="fa fa-close pull-right" onclick="off()"></i>
    </div>
    <form class="" action="index.html" method="post">
      <div class="body">
        <div>
          <h4>Are you sure you want to delete?</h4>
        </div>
      </div>
      <div class="footer">
        <button type="button" name="button">Cancel</button>
        <button type="button" name="button">Delete</button>
      </div>
    </form>
  </div>
</div>
<div id="overlay" onclick="off()"></div>

<script>

$('.popup-form > .info-display > form > .body > div > ol > li').on('mouseover', function(){
  $(this).css("padding", "5px 11.4px");
});

$('.popup-form > .info-display > form > .body > div > ol > li').on('mouseout', function(){
  $(this).css("padding", "5px 20px");
});

$('textarea').on('input', function() {
  this.style.height = '';
  this.style.height = this.scrollHeight + 'px';
})
.focus();

$('.single-edit > .body > div > h4 > input').on('click', function(){
  if($('.single-edit > .body > div > h4 > input').is(':checked')){
    $('.single-edit > .body > .to').addClass('hide');
  } else {
    $('.single-edit > .body > .to').removeClass('hide');
  }
});

$('.popup-form > div > div > .header > .fa-close').on('click', function(){
  $('.popup-form > div').removeClass('active');
  $('.popup-form').removeClass('active');
});

$('.info-display > .header > .fa-plus').on('click', function(){
  var that = $(this);
  var id = that.parent().parent().attr('id');
  $('.popup-form').addClass('active');
  $('.popup-form > #'+id).addClass('active');
});

$('.info-display > .header > .fa-pencil').on('click', function(){
  var that = $(this);
  var id = that.parent().parent().attr('id');
  $('.popup-form').addClass('active');
  $('.popup-form > #'+id).addClass('active');
});

$('.info-display > .body > table > tbody > tr > td > .fa-pencil').on('click', function(){
  var that = $(this);
  var id = that.parent().parent().parent().parent().parent().parent().attr('id');
  $('.popup-form').addClass('active');
  $('.popup-form > #'+id).addClass('active');
});

$('.info-display > .body > table > tbody > tr > td > .fa-trash').on('click', function(){
  var that = $(this);
  var id = 'delete';
  $('.popup-form').addClass('active');
  $('.popup-form > #'+id).addClass('active');
});

function on() {
    document.getElementById("overlay").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
    $('.popup-form > div').removeClass('active');
    $('.popup-form').removeClass('active');
}
</script>

@endif


@endsection

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Register | The Campus Chapter</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('register/css/style.css') }}">
</head>

<body>

  <div class="info">
  <h1><span>The</span>Campus Chapter</h1>
  <span>
    Setting up your chapter!
  </span>
</div>

<!-- Modal -info -->

<form class="steps" accept-charset="UTF-8" enctype="multipart/form-data" novalidate="" action="{{ route('user.register', ['college_id='.$college_id, 'email='.$email]) }}" method="POST">
  <ul id="progressbar">
    <li class="active">Basic Information</li>
    <li>Professional Information</li>
    <li>Contact Information</li>
  </ul>

  <!-- USER INFORMATION FIELD SET -->
  <fieldset>
    <h2 class="fs-title">Basic Information</h2>
    <h3 class="fs-subtitle">We just need some basic information!</h3>
    <!-- Begin What's Your Name Field -->
        <div class="hs_firstname field hs-form-field">

          <label for="firstname">What's your Name? *</label><br>

          <input id="firstname" name="fname" required="required" type="text" value="" placeholder="First Name" data-rule-required="true" data-msg-required="Please include your First name" class="inline-input">
          <input id="middlename" name="mname" type="text" value="" placeholder="Middle Name" class="inline-input">
          <input id="lastname" name="lname" required="required" type="text" value="" placeholder="Last Name" data-rule-required="true" data-msg-required="Please include your Last name" class="inline-input">
          <span class="error1" style="display: none;">
              <i class="error-log fa fa-exclamation-triangle"></i>
          </span>
        </div>
    <!-- End What's Your Name Field -->

    <!-- Begin What's Your Username Field -->
        <div class="hs_firstname field hs-form-field">

          <label for="username">Set a unique username *</label><br>

          <input id="username" name="username" required="required" type="text" value="" placeholder="Username" data-rule-required="true" data-msg-required="Please include your Username">
          <span class="error1" style="display: none;">
              <i class="error-log fa fa-exclamation-triangle"></i>
          </span>
        </div>
    <!-- End What's Your Username Field -->

    <!-- Begin What's Your Date of Birth Field -->
        <div class="hs_dob field hs-form-field">

          <label for="dob">What's your Date of Birth? *</label><br>

          <select class="inline-input" name="date">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select>

          <select class="inline-input" name="month">
            <option value="January">January</option>
            <option value="February">February</option>
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

          <select class="inline-input" name="year">
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
            <option value="1989">1989</option>
            <option value="1988">1988</option>
            <option value="1987">1987</option>
            <option value="1986">1986</option>
            <option value="1985">1985</option>
            <option value="1984">1984</option>
            <option value="1983">1983</option>
            <option value="1982">1982</option>
            <option value="1981">1981</option>
            <option value="1980">1980</option>
            <option value="1979">1979</option>
            <option value="1978">1978</option>
            <option value="1977">1977</option>
            <option value="1976">1976</option>
            <option value="1975">1975</option>
            <option value="1974">1974</option>
            <option value="1973">1973</option>
            <option value="1972">1972</option>
            <option value="1971">1971</option>
            <option value="1970">1970</option>
            <option value="1969">1969</option>
            <option value="1968">1968</option>
            <option value="1967">1967</option>
            <option value="1966">1966</option>
            <option value="1965">1965</option>
            <option value="1964">1964</option>
            <option value="1963">1963</option>
            <option value="1962">1962</option>
            <option value="1961">1961</option>
            <option value="1960">1960</option>
            <option value="1959">1959</option>
            <option value="1958">1958</option>
            <option value="1957">1957</option>
            <option value="1956">1956</option>
            <option value="1955">1955</option>
            <option value="1954">1954</option>
            <option value="1953">1953</option>
            <option value="1952">1952</option>
            <option value="1951">1951</option>
            <option value="1950">1950</option>
          </select>
          <span class="error1" style="display: none;">
              <i class="error-log fa fa-exclamation-triangle"></i>
          </span>
        </div>
    <!-- End What's Your Date of Birth Field -->

    <!-- Begin What's Your Gender Field -->
        <div class="hs_gender field hs-form-field">

          <label for="gender">What's your Gender? *</label>

          <p>
            <input type="radio" id="test1" name="male">
            <label for="test1">Male</label>
          </p>
          <p>
            <input type="radio" id="test2" name="female">
            <label for="test2">Female</label>
          </p>
          <span class="error1" style="display: none;">
              <i class="error-log fa fa-exclamation-triangle"></i>
          </span>
        </div>
    <!-- End What's Your Gender Field -->

    <!-- Begin What's Your Password Field -->
        <div class="hs_firstname field hs-form-field">

          <label for="password">Set a Password *</label><br>

          <input id="password" name="password" required="required" type="password" value="" placeholder="Password" data-rule-required="true" data-msg-required="Please include your Password">
          <span class="error1" style="display: none;">
              <i class="error-log fa fa-exclamation-triangle"></i>
          </span>
        </div>
    <!-- End What's Your Password Field -->

    <!-- Begin What's Your Password Field -->
        <div class="hs_firstname field hs-form-field">

          <label for="cnfpassword">Confirm Password *</label><br>

          <input id="cnfpassword" name="cnfpwd" required="required" type="password" value="" placeholder="Confirm Password" data-rule-required="true" data-msg-required="Please confirm your password">
          <span class="error1" style="display: none;">
              <i class="error-log fa fa-exclamation-triangle"></i>
          </span>
        </div>
    <!-- End What's Your Password Field -->

    <input type="button" data-page="1" name="next" class="next action-button" value="Next" />
  </fieldset>



  <!-- PROFESSIONAL INFORMATION FIELD SET -->
  <fieldset>
    <h2 class="fs-title">Professional Information</h2>
    <h3 class="fs-subtitle">Let's set your Professional details on your chapter!</h3>
      <!-- Begin Registration Number Field -->
        <div class="form-item webform-component webform-component-textfield hs_registration_number field hs-form-field" id="webform-component-acquisition--amount-1">

          <label for="registration_number">What is your Registration Number? *</label>

          <input id="registration_number" class="form-text hs-input" name="registration_number" required="required" type="text" value="" placeholder="" data-rule-required="true" data-msg-required="Please enter a Registration Number">
          <span class="error1" style="display: none;">
              <i class="error-log fa fa-exclamation-triangle"></i>
          </span>
        </div>
      <!-- End Registration Number Field -->

      <!-- Begin course Field -->
        <div class="form-item webform-component webform-component-textfield hs_roll_number field hs-form-field" id="webform-component-acquisition--amount-1">

          <label for="program_enrolled">Which Program have you enrolled? *</label>
          <select class="program_enrolled" name="program_enrolled">
            <option value="">Select Program</option>
            @foreach($college->programs as $program)
              <option value="{{ $program->id }}">{{ $program->program_name }}</option>
            @endforeach
          </select>

          <span class="error1" style="display: none;">
              <i class="error-log fa fa-exclamation-triangle"></i>
          </span>
        </div>
      <!-- End course Field -->

      <!-- Begin Branch Name Branch Name Field -->
        <div class="form-item webform-component webform-component-textfield hs_branch field hs-form-field" id="webform-component-acquisition--amount-1">

          <label for="course">What is your Branch Name? *</label>
          <select class="course" name="course">
            <option value="">Select Branch</option>

          </select>

          <span class="error1" style="display: none;">
              <i class="error-log fa fa-exclamation-triangle"></i>
          </span>
        </div>
      <!-- End Branch Name Branch Name Field -->

      <!-- Begin Batch Field -->
        <div class="form-item webform-component webform-component-textfield hs_batch field hs-form-field" id="webform-component-acquisition--amount-1">

          <label for="batch">Which Batch are you in? *</label>
          <select class="" name="batch">
            <option value="">Select Batch</option>
            <option value="">2k15</option>
          </select>

          <span class="error1" style="display: none;">
              <i class="error-log fa fa-exclamation-triangle"></i>
          </span>
        </div>
      <!-- End Batch Field -->

      <!-- Begin Trade Field -->
        <div class="form-item webform-component webform-component-textfield hs_trade field hs-form-field" id="webform-component-acquisition--amount-1">

          <label for="trade">In which semester are you? *</label>

          <input id="semester" class="form-text hs-input" name="semester" required="required" type="number" value="" placeholder="" data-rule-required="true" data-msg-required="Please enter a Registration Number">
          <span class="error1" style="display: none;">
              <i class="error-log fa fa-exclamation-triangle"></i>
          </span>
        </div>
      <!-- End Trade Field -->

    <input type="button" data-page="2" name="previous" class="previous action-button" value="Previous" />
    <input type="button" data-page="2" name="next" class="next action-button" value="Next" />
  </fieldset>



  <!-- CONTACT INFORMATION FIELD SET -->
  <fieldset>
    <h2 class="fs-title">Contact Information</h2>
    <h3 class="fs-subtitle">Make it easy for people to contact you!</h3>

    <!-- Begin contact Number Field -->
      <div class="form-item webform-component webform-component-textfield hs_branch field hs-form-field" id="webform-component-acquisition--amount-1">

        <label for="contact_number">What is your Contact Number? *</label>

        <input id="contact_number" class="form-text hs-input" name="contact_number" type="number">
        <span class="error1" style="display: none;">
            <i class="error-log fa fa-exclamation-triangle"></i>
        </span>
      </div>
    <!-- End contact Number Field -->
    <input type="button" data-page="3" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" data-page="3" name="register_new" class="next action-button" value="Next" />
  </fieldset>


  <fieldset>
    <h2 class="fs-title">It's on the way!</h2>
    <h3 class="fs-subtitle">Redirecting you to your chapter!</h3>
  </fieldset>

<input type="hidden" name="_token" value="{{ Session::token() }}">

</form>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js'></script>
<script  src="{{ asset('register/js/index.js') }}"></script>
<script  src="{{ asset('links/js/index.js') }}"></script>
<script>var college_id = '{{ $college->college_id }}'</script>

</body>

</html>

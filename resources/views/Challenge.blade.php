@include('inc.header')
@include('inc.cover')

<div class="content">
  <div class="no-challenge show">
    <h1>There is no open Challenge created by you.</h1>
    <div class="heading">
      <p><i class="fa fa-gavel"></i></p>
    </div>
    <div class="create-btn">
      <center>
        <button class="create-task" type="button" name="button">Create a challenge</button>
      </center>
    </div>
  </div>
  <div class="create-challenge show">
    <div class="header-title">
      <h2>Create a
        <span>
          <select class="task-select" name="">
            <option value="challenge">Challenge</option>
            <option value="debate">Debate</option>
          </select>
        </span>
      </h2>
    </div>
    <div class="form-container">
      <form class="" action="" method="post">
        <label for="task">Task Name</label>
        <input type="text" id="task" name="" placeholder="Task you want them to perform">
        <label for="task-description">Describe the task</label>
        <input type="text" id="task-description" name="" placeholder="Describe your task clearly!">
        <label for="task-audiance">Task Audiance</label>
        <select class="audiance-select" name="">
          <option value="Public">Public</option>
          <option value="Friends">Friends</option>
          <option value="Private">Private</option>
        </select>
        <div class="private">
          <label for="private-task">Add selected Friends</label>
          <input type="text" id="private-task" name="" placeholder="Add selected friends">
        </div>
      </form>
    </div>
    <div class="footer create-btn">
      <center>
        <button type="button" name="button">Create a Challenge</button>
      </center>
    </div>
  </div>
  <div class="create-debate">
    <div class="header-title">
      <h2>Create a
        <span>
          <select class="task-select" name="">
            <option value="challenge">Challenge</option>
            <option value="debate" selected>Debate</option>
          </select>
        </span>
      </h2>
    </div>
    <div class="form-container">
      <form class="" action="" method="post">
        <label for="debate">Debate Topic</label>
        <input type="text" id="debate" name="" placeholder="Recent or hot topics to have debate on!">
        <label for="debate-description">Describe the debate topic</label>
        <input type="text" id="debate-description" name="" placeholder="Describe your debate topic clearly!">
        <label for="debate-audiance">Debate Audiance</label>
        <select class="audiance-select" name="">
          <option value="Public">Public</option>
          <option value="Friends">Friends</option>
          <option value="Private">Private</option>
        </select>
        <div class="private">
          <label for="private-debate">Add selected Friends</label>
          <input type="text" id="private-debate" name="" placeholder="Add selected friends">
        </div>
      </form>
    </div>
    <div class="footer create-btn">
      <center>
        <button type="button" name="button">Create a Debate</button>
      </center>
    </div>
  </div>
  <!-- <div class="no-challenge show">
    <h1>Create your first challenge!</h1>
    <div class="heading">
      <p><i class="fa fa-gavel"></i></p>
    </div>
    <div class="create-btn">
      <center>
        <button class="create-task" type="button" name="button">Create a challenge</button>
      </center>
    </div>
  </div> -->
</div>


<!-- jquery code for making toggling of private field  -->
<script type="text/javascript">
  $('.audiance-select').click(function(){
    var a = $('.audiance-select > option:selected').val();
    if(a == 'Private'){
      $('.private').css('display', 'block');
    } else {
      $('.private').css('display', 'none');
    }
  });
</script>

<!-- jquery code for toggle between challenge and debate form -->
<script type="text/javascript">
  $('.task-select').click(function(){
    var a = $('.task-select > option:selected').val();
    console.log(a);
    if(a == 'debate'){
      $('.create-debate').toggleClass('show');
      $('.create-challenge').toggleClass('show');
    } else {
      $('.create-debate').toggleClass('show');
      $('.create-challenge').toggleClass('show');
    }
  });
</script>
<script type="text/javascript">
  if($('.no-challenge').is(":visible")){
    $('.create-challenge').toggleClass('show');
  }
  $('.create-task').click(function(){
    $('.no-challenge').toggleClass('show');
    $('.create-challenge').toggleClass('show');
  });
</script>


<!-- <script type="text/javascript">
  $('.no-challenge > .create-btn > center > button').mouseover(function (){
    $('.no-challenge > .heading > p').css('color', '#663300');
  });
  $('.no-challenge > .create-btn > center > button').mouseout(function (){
    $('.no-challenge > .heading > p').css('color', '#367fa9');
  });
</script> -->

<!-- sidebar -->
<section class="control-sidebar">
  <nav>
    <ul class="sidebar-categories">
      <li class="active" id="sidebar-active-tab"><a href="#"><i class="fa fa-paper-plane"></i></a></li>
      <li id="sidebar-home"><a href=""><i class="fa fa-home"></i></a></li>
      <li id="sidebar-settings"><a href=""><i class="fa fa-gears"></i></a></li>
    </ul>
  </nav>

  <!-- Messaging area -->
  <div class="sidebar-tab-content">
    <div class="a sidebar-active-tab show">
      <div class="search-bar">
        <input type="text" name="" value="" placeholder="Search...">
        <div class="search-bar-icon">
          <a href="#"><center><i class="fa fa-search"></i></center></a>
        </div>
      </div>
      <div class="active-user-list">
        <span>Active Users</span>
        <hr>
        <ul>



          <!-- <a id="" href="#">
            <li>
              <div class="active-user-image">
                  <img id="active-flash" src="{{asset("images/pro1.jpg")}}" alt="Oh! We didn't found it!">
              </div>
              <span id="active-flash-text">Ujjwal Verma</span>
              <p class="user-online-icon"></p>
            </li>
          </a> -->


        </ul>
      </div>
    </div>
    <!-- Messaging area ends -->

    <!-- sidebar-home tab -->
    <div class="a sidebar-home">
      <div class="home-options">
        <span>Quick Links</span>
        <hr>
        <ul>
          <a href="#">
            <li>
                <div class="icon-container bg-red">
                  <i class="fa fa-shopping-cart"></i>
                </div>
              <span>Online Shop</span>
            </li>
          </a>
          <a href="#">
            <li>
                <div class="icon-container bg-aqua">
                  <i class="fa fa-calendar"></i>
                </div>
              <span>Upcoming Events</span>
            </li>
          </a>
          <a href="#">
            <li>
                <div class="icon-container bg-purple">
                  <i class="fa fa-users"></i>
                </div>
              <span>My Clubs</span>
            </li>
          </a>
          <a href="#">
            <li>
                <div class="icon-container bg-green">
                  <i class="fa fa-flag"></i>
                </div>
              <span>Create Club</span>
            </li>
          </a>
          <a href="#">
            <li>
                <div class="icon-container bg-orange">
                  <i class="fa fa-gavel"></i>
                </div>
              <span>Challenges</span>
            </li>
          </a>
        </ul>
      </div>
    </div>
    <!-- sidebar-home tab ends -->

    <!-- sidebar-settings tab -->
    <div class="a sidebar-settings">

    </div>
  </div>
  <!-- sidebar-settings tab ends -->

</section>

<!-- jquery sidebar -->
<script type="text/javascript">
  $('.control-sidebar > nav > ul > li').on('click', function(e){
    e.preventDefault();
    $('.control-sidebar > nav > ul > li').removeClass('active');
    $(this).toggleClass('active');
    // alert('clicked');
    var a = $(this).attr('id');
    console.log(a);
    $('.sidebar-tab-content > .a').removeClass('show');
    $('.sidebar-tab-content > '+ '.'+a).addClass('show');
  });
</script>
<script type="text/javascript">
  $('.control-sidebar > .sidebar-tab-content > .sidebar-active-tab > .search-bar > input').focusin(function(){
    $('.search-bar-icon').css({'background-color': 'white'});
  });
  $('.control-sidebar > .sidebar-tab-content > .sidebar-active-tab > .search-bar > input').focusout(function(){
    $('.search-bar-icon').css({'background-color': '#2e4052'});
  });

  $('.control-sidebar > .sidebar-tab-content > .sidebar-active-tab > .search-bar > input').focusin(function(){
    $('.control-sidebar > .sidebar-tab-content > .sidebar-active-tab > .search-bar > .search-bar-icon > a > center > .fa-search').css({'color': 'black'});
  });
  $('.control-sidebar > .sidebar-tab-content > .sidebar-active-tab > .search-bar > input').focusout(function(){
    $('.control-sidebar > .sidebar-tab-content > .sidebar-active-tab > .search-bar > .search-bar-icon > a > center > .fa-search').css({'color': 'white'});
  });
</script>
<!-- jquery sidebar ends -->

<!-- sidebar ends -->

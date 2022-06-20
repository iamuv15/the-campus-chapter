@extends('inc.header')
@section('css')
  <link rel="stylesheet" href="{{asset('links/css/register.css')}}">
  <link rel="stylesheet" href="{{asset('links/css/college.css')}}">
@endsection

@section('section-content')
  @parent

  <div class="content">
    <div>
      <h4>You are just one step away from <span>getting started!</span></h4>
    </div>
    <div>
      <form class="college-setup" action="" method="post">
        <div>
          <fieldset>
            <legend>Programmes offered</legend>
            <div class="clg_prog">
              <div id='dsa'>
                <label for="">
                  <p>Program </p>
                  <span>1</span>
                  <i class="fa fa-trash pull-right"></i>
                </label>
                <input type="text" name="" value="" placeholder="Name of program, eg: Bachelor of Engineering (B.E.)">
                <textarea name="" value="" placeholder="Courses offered, eg: Computer Science Engineering (CSE), Electrical Engineering (EE)"></textarea>
              </div>
            </div>
            <button type="button" name="button" class="pull-right">Add More programs</button>
          </fieldset>
          <fieldset>
            <legend>Contact Information</legend>
            <div>
              <div>
                <label for="">City</label>
                <input type="text" name="" value="" placeholder="City/District/Town">
              </div>
              <div>
                <label for="">State</label>
                <input type="text" name="" value="" placeholder="State/Union Territory">
              </div>
              <div>
                <label for="">Contact Number</label>
                <input type="number" name="" value="" placeholder="Contact Number">
              </div>
            </div>
          </fieldset>
        </div>
        <div>
          <center><button type="button" name="button">Create our chapter</button></center>
        </div>
      </form>
    </div>
  </div>

  <script type="text/javascript">
    $('.college-setup > div > fieldset > button').on('click', function(){
      var that = $(this);

      that.prev().children().last().children('input').on('keyup', function(){
        that.prev().children().last().children('input').css('border-bottom', '2px solid #367fa9');
      });

      that.prev().children().last().children('textarea').on('keyup', function(){
        that.prev().children().last().children('textarea').css('border-bottom', '2px solid #367fa9');
      });

      if(that.prev().children().last().children('input').val() == '' && that.prev().children().last().children('textarea').val() == ''){
        that.prev().children().last().children('input').css('border-bottom', '2px solid red');
        that.prev().children().last().children('textarea').css('border-bottom', '2px solid red');
      }
      else if(that.prev().children().last().children('input').val() == ''){
        that.prev().children().last().children('input').css('border-bottom', '2px solid red');
      }
      else if(that.prev().children().last().children('textarea').val() == ''){
        that.prev().children().last().children('textarea').css('border-bottom', '2px solid red');
      }
      else{
        var i = parseInt(that.prev().children().last().children().children().next().text());
        // alert(i);

        if(isNaN(i)){
          i = 0;
        }

        $('<div>', {
          'html': $('<label>', {
          'html': $('<p>',{
            'html': 'Program '
          }).add($('<span>', {
            'html': ' ' + (i+1)
          })).add($('<i>', {
            'class': 'fa fa-trash pull-right'
          }))
        }).add($('<input>', {
          'type': 'text',
          'placeholder': 'Name of program, eg: Bachelor of Engineering (B.E.)'
        })).add($('<textarea>', {
          'placeholder': 'Courses offered, eg: Computer Science Engineering (CSE), Electrical Engineering (EE)'
        }))
        }).appendTo('.college-setup > div > fieldset > .clg_prog');
      }

    });

    $('.college-setup > div > fieldset > div').on('click', ' div > label > .fa-trash', function(){
      var that = $(this);
      that.parent().parent().remove();
    });

  </script>

@endsection

$('fieldset > div > input').on('input', function(){
  var that = $(this),
      active = that.attr('name');

      if(active === 'firstname'){
        var check = that.val();
        // console.log(check);

        var valid = /[a-z]$/;

        if(!check.match(valid)){
          that.parent().children().last().css('display', 'block');
          that.parent().children().last().html('<i class="error-log fa fa-exclamation-triangle"></i> It is not a valid entry!');
        }
        else{
          that.parent().children().last().css('display', 'none');
          that.parent().children().last().html('');
        }
      }
});

$('form input').on('keypress', function(e){
  if(e.which == 13){
    return false;
  }
});

$(document).ready(function(){
  $('.program_enrolled').on('change', function(){
    $('.course > option').each(function(){
      if($(this).val() !== ''){
        $(this).remove();
      }
    });
    var selected_option = $(this).val();
    if(selected_option !== ''){

      $.ajax({
        url: 'student/course',
        method: 'get',
        data: {'selected_option': selected_option, 'college_id': college_id},
        success: function(res){
          // console.log(res);

          var res = JSON.parse(res);

          var i = parseInt(res.length - 1);

          while(i >= 0){
            $('.course').append($('<option>', {
              'value': res[i].course_id,
              'html': res[i].course_name
            }));
            i--;
          }
        }
      });

    }
  });
})

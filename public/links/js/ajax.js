 // create post
$('#create_post').on('submit', function(){
  var that = $(this),
      url = that.attr('action'),
      type = that.attr('method'),
      data = {};

  var post_content = $('#description_id').val();

  that.find('[name]').each(function(index, value){
    var that = $(this),
        name = that.attr('name'),
        value = that.val();
    data[name] = value;
  });
  // console.log(url);
  $.ajax({
    url: url,
    type: 'POST',
    data: data,
    success: function(r){

      $('.post-status').html('Successfully submitted!');

      $.ajax({
        url: '/newpost/user',
        method: 'get',
        success: function(res){

          console.log(res);

          var href = $('.user-wigid-list > ul > a').attr('href'),
              username = $('.user-wigid-list > ul > a > li > .profile-pic').next().text(),
              status = $('.user-wigid-list > ul > a').attr('data-type'),
              post_id = res;

          if(status == 2){
            status_class = 'fa fa-bullhorn';
            status_title = 'Placement Representative';
          }
          else if(status == 3){
            status_class = 'fa fa-university';
            status_title = 'Posted by';
          }
          else if(status == 4){
            status_class = 'fa fa-graduation-cap';
            status_title = 'Member of the Campus Chapter';
          }

          $('<div>', {
            'class': 'basic-post-container',
            'html': $('<div>', {
              'class': 'basic-post-container-header',
              'html': $('<div>', {
                'class': 'profile-pic',
                'html': $('<img>', {
                  'src': 'images/pro1.jpg',
                  'style': 'height: inherit; width: inherit; border-radius: inherit;'
                })
              }).add($('<div>', {
                'class': 'user-description',
                'html': $('<a>', {
                  'href': href,
                  'html': username
                }).add($('<i>', {
                  'class': status_class,
                  'title': status_title
                })).add($('<p>', {
                  'class': 'font-size: 11px; color: #999; font-weight: 400;',
                  'html': 'Shared Publically - few seconds ago'
                }))
              })).add($('<div>', {
                'id': 'post-popup-box-postid',
                'class': 'pull-right caret-down',
                'html': $('<span>', {
                  'html': $('<i>', {
                    'class': 'fa fa-angle-down'
                  })
                })
              })).add($('<div>', {
                'class': 'caret-popup',
                'id': 'popup-id-'+post_id, // add postid here
                'html': $('<form>', {
                  'class': 'tooltip',
                  'html': $('<ul>', {
                    'class': 'post-popup-menu',
                    'html': $('<li>', {
                      'class': 'post-popup-list-item',
                      'html': $('<i>', {
                        'class': 'fa fa-edit'
                      }).add($('<a>', {
                        'href': '',
                        'id': 'edit',
                        'html': 'Edit'
                      }))
                    }).add($('<li>', {
                      'class': 'post-popup-list-item',
                      'html': $('<i>', {
                        'class': 'fa fa-trash'
                      }).add($('<a>', {
                        'href': '',
                        'id': 'delete',
                        'html': 'Delete'
                      })).add($('<li>', {
                        'class': 'post-popup-list-item',
                        'html': $('<i>', {
                          'class': 'fa fa-flag-checkered'
                        }).add($('<a>', {
                          'href': '',
                          'id': 'report',
                          'html': 'Report'
                        }))
                      }))
                    }))
                  })
                })
              }))
            }).add($('<div>', {
              'class': 'basic-post-container-body post-type-status',
              'html': $('<div>', {
                'class': 'post-type-2',
                'html': $('<div>', {
                  'class': 'status post-id-'+post_id, // add postid here
                  'html': $('<p>', {
                    'html': post_content // add post here
                  })
                }).add($('<form>', {
                  'action': '', // put action url here
                  'method': 'post',
                  'class': 'react-box',
                  'html': $('<div>', {
                    'class': 'react-btn',
                    'id': 'like-btn-'+post_id, // add post id here
                    'html': $('<span>', {
                      'html': 'Liked'
                    }).add($('<div>', {
                      'class': 'react-post-icon',
                      'html': $('<i>', {
                        'class': 'fa fa-thumbs-up'
                      })
                    }))
                  }).add($('<div>', {
                    'class': 'react-btn',
                    'id': 'save-btn-'+post_id, // add postid here
                    'html': $('<span>', {
                      'html': 'Saved'
                    }).add($('<div>', {
                      'class': 'react-post-icon',
                      'html': $('<i>', {
                        'class': 'fa fa-bookmark'
                      })
                    }))
                  })).add($('<input>', {
                    'type': 'hidden',
                    'name': '_token',
                    'value': token
                  }))
                }))
              })
            })).add($('<div>', {
              'class': 'response-stats',
              'html': $('<span>', {
                'html': $('<span>', {
                  'class': 'like-count',
                  'html': '0 Likes - 0 Comments'
                })
              })
            }))
          }).add($('<div>', {
            'class': 'basic-post-comment-box',
            'html': $('<div>', {
              'class': 'profile-pic',
              'html': $('<img>', {
                'src': 'images/pro1.jpg',
                'style': 'height: inherit; width: inherit; border-radius: inherit;'
              })
            }).add($('<form>', {
              'action': '', // add a url
              'class': 'comment-field',
              'method': 'post',
              'data-id': post_id, // add postid here
              'html': $('<input>', {
                'type': 'text',
                'placeholder': 'Write a comment...'
              }).add($('<input>', {
                'type': 'hidden',
                'name': '_token',
                'value': token
              }))
            }))
          })).prependTo('.newsfeed');

        }
      });
    },
    fail: function(){
      $('.post-status').html('Something went wrong!');
    }
  });
  // remove the popup after setting value of textbox to null
  return false;
});

var page = 1;
$('.fetch-more').on('click', function(e){
  e.preventDefault();
  var that = $(this);
  // var post_id = that.parent().parent().prev().children().last().data('id');
  page++;

  console.log(that.data('next-set'));

  $.ajax({
    url: that.data('next-set'),
    method: 'get',
    data: {page: page},
    success: function(r){
      // console.log(that.parent().children().last().prev());
      that.prev().append(r.comments);
      if(r.next_page == null){
        that.remove();
      }
    }
  });
});

// return post

$(document).on('ready', function(){

  $(window).scroll(fetchPosts);

  function fetchPosts(){
    var page = $('.newsfeed').data('next-page');
    console.log(page);

    if(page !== null){

      clearTimeout($.data(this, "scrollCheck"));

      $.data(this, "scrollCheck", setTimeout(function () {
        var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 400;
        console.log(scroll_position_for_posts_load);

        if(scroll_position_for_posts_load >= $(document).height()){
          $.get(page, function(data){
            $('.newsfeed').append(data.posts);
            // alert(data.posts);
            // alert(data.next_page);
            $('.newsfeed').data('next-page', data.next_page);
            // $('.newsfeed').children().last().append('<p>load more!</p>');
          });
        }
      }, 350))
    }
    else{
      $('.timeline-wrapper').remove();
      $('.alert-user').removeClass('hide');
    }
  }

});

$('.react-btn').on('click', function(){

  var that = $(this);
  var id = that.attr('id');
  var a = $('.response-stats > span > span').text();

  $('#' + id).toggleClass('change-btn');
  $('#' + id + '> span').toggleClass('show');
});

// var that = $(this),
//     data = {};
//
// that.find('[class]').each(function(index, value){
//  var that = $(this),
//      cls = that.attr('class'),
//      value = that.attr('class');
//      data[cls] = value;
//  if(data[cls] === 'like'){
//    $('.like').toggleClass('change-btn');
//    $('.like > span').toggleClass('show');
//  }
// });

// var that = $(this),
//     data = {};
//
// that.find('[class]').each(function(index, value){
//   var that = $(this),
//       cls = that.attr('class'),
//       value = that.attr('class');
//       data[cls] = value;
//   if(data[cls] === 'react-post-icon'){
//     that.toggleClass('change-btn');
//     // $('.react-box > span').html('Liked');
//     $('.react-box > .like > span').toggleClass('show');
//
//     $('.show').click(function(){
//       that.toggleClass('change-btn');
//       // $('.react-box > span').html('');
//       $('.react-box > .like > span').toggleClass('show');
//     });
//
//     if($('.like').hasClass('change-btn')){
//       var a = $('.response-stats > span > span').text();
//       a = parseInt(a) + 1;
//       $('.response-stats > span > span').html(a);
//     } else {
//       var a = $('.response-stats > span > span').text();
//       a = parseInt(a) - 1;
//       $('.response-stats > span > span').html(a);
//     }
//   }
// });

/**
*   trending list item pick textbox
*/
$('.trend-list-item > span').on('click', function(){
  var that = $(this);

  var trend_item = that.text();
  var textarea = $('#description_id').val();
  $('#description_id').val(textarea + ' ' + '#' + trend_item).focus();
});

// i = 1;
// var array = ['WahTeraKyaKehna', 'ChailoVerity'];
// while(i !== -1){
//   var hashtag = '#'+array[i];
//   // if(elem = $(".status > p:contains(check)")){
//   //   elem.text(elem.text().replace(hashtag, "<a href='#'>" + hashtag + "</a>"));
//   //   alert('hi');
//   // }
//   alert(hashtag);
//   i--;
// }

$('.react-btn').on('click', function(){
  var that = $(this),
      url = $('form.react-box').attr('action');
      btn_clicked = that.attr('id');
      btn_clicked = btn_clicked.split('-');
      like_count = parseInt(that.parent().parent().parent().next().children().children().html());

  var post_id = btn_clicked[2],
  btn_clicked = btn_clicked[0];

  if(btn_clicked == 'like'){

    if(that.children().attr('class') == 'show'){
      that.parent().parent().parent().next().children().children().html(like_count + 1);
    }
    else{
      that.parent().parent().parent().next().children().children().html((like_count - 1));
    }


    $.ajax({
      url: url + '/like/'+user_id+'/'+post_id,
      method: "POST",
      data: {'post_id': post_id, 'user_id': user_id, '_token': token},
      success: function(){
        console.log('success!');
      }
    });
  }
  else if(btn_clicked == 'save'){

    // $.ajax({
    //   url: url + '/comment/'+user_id+'/'+post_id+'/'+comment,
    //   method: "POST",
    //   data: {'post_id': post_id, 'user_id': user_id, 'comment': comment '_token': token},
    //   success: function(){
    //     console.log('success!');
    //   }
    // });

    console.log('working!');

  }

  return false;
});

$('.newsfeed').on('keypress', 'form.comment-field > input', function(e){
  if(e.which == 13){
    var that = $(this),
        comment = that.val(),
        url = $('form.comment-field').attr('action'),
        post_id = that.parent().attr('data-id'),
        btn_clicked = 'comment';

    $.ajax({
      url: url + '/comment/'+user_id+'/'+post_id+'/'+comment,
      method: "POST",
      data: { 'comment': comment, 'user_id': user_id, 'post_id': post_id, '_token': token,},
      success: function(r){
        console.log('successfully commented!');
        if(that.parent().parent().next().attr('class') == null){
          $('<div', {
            'class': 'comment-display-area',
            'html': $('<ul>', {
              'class': 'comment-list',
              'html': $('<li>', {
                'class': 'comment-list-item',
                'html': $('<div>', {
                  'class': 'comment-content',
                  'html': $('<div>', {
                    'class': 'user-dp',
                    'html': $('<img>', {
                      'src': 'images/pro1.jpg',
                      'style': 'height: inherit; width: inherit; border-radius: inherit;'
                    })
                  }).add($('<div>', {
                    'class': 'user-desc',
                    'html': $('<a>', {
                      'href': '',
                      'html': 'Change this name'
                    })
                  })).add($('<div>', {
                    'class': 'user-comment',
                    'html': $('<p>', {
                      'html': comment
                    })
                  }))
                }).add('<div>',{
                  'class': 'comment-react-box',
                  'html': ($('<a>', {
                    'href': '#',
                    'html': 'Like '
                  })).add($('<a>', {
                    'href': '#',
                    'html': 'Reply '
                  })).add($('<a>', {
                    'href': '#',
                    'html': 'Report '
                  }))
                })
              })
            })
          }).appendTo(that.parent().parent().parent());
          alert(that.parent().parent().parent().children().next().attr('class'));
        }
        else{
          $('<li>', {
            'class': 'comment-list-item',
            'html': $('<div>', {
              'class': 'comment-content',
              'html': $('<div>', {
                'class': 'user-dp',
                'html': $('<img>', {
                  'src': 'images/pro1.jpg',
                  'style': 'height: inherit; width: inherit; border-radius: inherit;'
                })
              }).add($('<div>', {
                'class': 'user-desc',
                'html': $('<a>', {
                  'href': '',
                  'html': 'Change this name'
                })
              })).add($('<div>', {
                'class': 'user-comment',
                'html': $('<p>', {
                  'html': comment
                })
              }))
            }).add('<div>',{
              'class': 'comment-react-box',
              'html': ($('<a>', {
                'href': '#',
                'html': 'Like '
              })).add($('<a>', {
                'href': '#',
                'html': 'Reply '
              })).add($('<a>', {
                'href': '#',
                'html': 'Report '
              }))
            })
          }).prependTo(that.parent().parent().next().children().first());
        }
      }
    });
    that.val('');
    return false;
  }
});

// $(document).ready(function(){
//   $.ajax({
//     url: 'http://tcc.devp/checkstatus/'+activeUserId,
//     method: 'POST',
//     data: {'id': activeUserId, '_token': token},
//     success: function(res){
//       console.log(res);
//     }
//   });
//
//   $.ajax({
//     url: 'http://tcc.devp/checkstatus/usersonline/'+activeUserId,
//     method: 'GET',
//     dataType: 'json',
//     data: {'id': activeUserId},
//     success: function(res){
//       $.each(res, function(key, value){
//         console.log(res[key].id);
//
//
//         $('<a href="#">',{
//           'html': $('<li>',{
//             'html' : $('<div>', {
//               'class': 'active-user-image',
//               'html': $('<img src="">')
//             }).add($('<span>',{
//               'id' : 'active-flash-text',
//               'html' : 'Ujjwal'
//             })).add($('p', {
//               'class': 'user-online-icon'
//             }))
//             })
//         })
//
//
//         $('<a href="#">',{
//           'html': $('<li>',{
//             'html' : $('<div>').text('Some text')
//           })
//         }).appendTo('.active-user-list > ul');
//       });
//     }
//   });
// });

// window.setInterval(function(){
//   $.ajax({
//     url: 'http://tcc.devp/checkstatus/'+activeUserId,
//     method: 'POST',
//     data: {'id': activeUserId, '_token': token},
//     success: function(res){
//       // console.log(res);
//     }
//   });
//
//   $.ajax({
//     url: 'http://tcc.devp/checkstatus/usersonline/'+activeUserId,
//     method: 'GET',
//     dataType: 'json',
//     data: {'id': activeUserId},
//     success: function(res){
//       // $.each(res, function(key, value){
//       //   // console.log(res[key].id);
//       //   // $('.active-user-list > ul').append("<a id='' href='#'><li><div class='active-user-image'><img id='active-flash' src='{{asset('images/pro1.jpg')}}'></div><span id='active-flash-text'></span><p class='user-online-icon'></p></li></a>");
//       //   // $('#active-flash-text').append(res[key].first_name);
//       // });
//     }
//   });
// }, 10000);

$('.navigation-wrapper > ul > #info').on('click', function(){
    $('.navigation-wrapper > ').removeClass('active');
    $('.navigation-wrapper > ul > a > ').removeClass('active');
    $('.navigation-wrapper > #personal-info').addClass('active');
    $('.navigation-wrapper > ul >  #info > ').addClass('active');
    return false;
});
$('.navigation-wrapper > ul > #personal-statement').on('click', function(){
    $('.navigation-wrapper > ').removeClass('active');
    $('.navigation-wrapper > ul > a > ').removeClass('active');
    $('.navigation-wrapper > #personal-statement').addClass('active');
    $('.navigation-wrapper > ul > #personal-statement > ').addClass('active');
    return false;
});
$('.navigation-wrapper > ul > #education').on('click', function(){
    $('.navigation-wrapper > ').removeClass('active');
    $('.navigation-wrapper > ul > a > ').removeClass('active');
    $('.navigation-wrapper > #education').addClass('active');
    $('.navigation-wrapper > ul > #education > ').addClass('active');
    return false;
});
$('.navigation-wrapper > ul > #achievements').on('click', function(){
    $('.navigation-wrapper > ').removeClass('active');
    $('.navigation-wrapper > ul > a > ').removeClass('active');
    $('.navigation-wrapper > #achievements').addClass('active');
    $('.navigation-wrapper > ul > #achievements > ').addClass('active');
    return false;
});
$('.navigation-wrapper > ul > #work-exp').on('click', function(){
    $('.navigation-wrapper > ').removeClass('active');
    $('.navigation-wrapper > ul > a > ').removeClass('active');
    $('.navigation-wrapper > #work-exp').addClass('active');
    $('.navigation-wrapper > ul > #work-exp > ').addClass('active');
    return false;
});
$('.navigation-wrapper > ul > #skills').on('click', function(){
    $('.navigation-wrapper > ').removeClass('active');
    $('.navigation-wrapper > ul > a > ').removeClass('active');
    $('.navigation-wrapper > #skills').addClass('active');
    $('.navigation-wrapper > ul > #skills > ').addClass('active');
    return false;
});
$('.navigation-wrapper > ul > #interests').on('click', function(){
    $('.navigation-wrapper > ').removeClass('active');
    $('.navigation-wrapper > ul > a > ').removeClass('active');
    $('.navigation-wrapper > #interests').addClass('active');
    $('.navigation-wrapper > ul > #interests > ').addClass('active');
    return false;
});
$('.navigation-wrapper > ul > #languages').on('click', function(){
    $('.navigation-wrapper > ').removeClass('active');
    $('.navigation-wrapper > ul > a > ').removeClass('active');
    $('.navigation-wrapper > #languages').addClass('active');
    $('.navigation-wrapper > ul > #languages > ').addClass('active');
    return false;
});
$('.navigation-wrapper > ul > #contact').on('click', function(){
    $('.navigation-wrapper > ').removeClass('active');
    $('.navigation-wrapper > ul > a > ').removeClass('active');
    $('.navigation-wrapper > #contact').addClass('active');
    $('.navigation-wrapper > ul > #contact > ').addClass('active');
    return false;
});

// personal statement Information

$('.personal_statement').on('submit', function(){

  var text = $(this).children().children().children().val(),
      url = $(this).attr('action'),
      method = $(this).attr('method');

  $.ajax({
    url: url,
    method: method,
    data: {'text': text, '_token': token},
    success: function(res){
      console.log(res);
    }
  });

  return false;
})

$('.personal_statement textarea').on('keyup', function(){
  var a = $(this).val();
  var b = a.length;
  // put b in the html document
});

$('form#education, form#achievement, form#work-exp, form#contact').on('submit', function(e){
  e.preventDefault();
  alert('hello');
  var that = $(this),
      url = that.attr('action'),
      type = that.attr('method'),
      data = {};

  // var post_content = $('#description_id').val();

  that.find('[name]').each(function(index, value){
    var that = $(this),
        name = that.attr('name'),
        value = that.val();
        data[name] = value;
    });

    $.ajax({
      url: url,
      method: type,
       data: {'data': data, '_token': token},
      success: function(res){
        console.log(res);
      }
    });

  return false;
});

$('form#skills textarea').on('keyup', function(){
  $('.drop-down-container').css('display', 'block');

  var a = $(this).val();
  var not_like = {};

  $('.item').each(function(key, value){
    not_like[key] = $(this).attr('id');
    $('#skills body ol li').each(key, value, function(){
      not_like[key] = $(this).attr('id');
    });
  });

  $.ajax({
    url: 'search/skills',
    method: 'post',
    data: {'search': a, 'not_like': not_like, '_token': token},
    success: function(res){
      console.log(res);

      $('.drop-down-container > ol').html(res);
    }
  });
});

$('form#skills').on('click', '.drop-down-container > ol > li', function(){
  var id = $(this).attr('id');
  var html = $(this).text();
  $('.items-added').children().append($('<li>', {
    'id': id,
    'class': 'item',
    'html': html
  })).show('slow');

  $('.drop-down-container > ol > li').remove();
  $('form#skills textarea').val('');
  $('.drop-down-container').css('display', 'none');
});

$('form#skills').on('submit', function(e){
  e.preventDefault();
  var url = $(this).attr('action'),
      method = $(this).attr('method');
  $('.item').each(function(){
    var id = $(this).attr('id');

    $.ajax({
      url: url,
      method: method,
      data: {'id': id, '_token': token},
      success: function(res){
        console.log(res);
      }
    });

  });
});


$('form#interests textarea').on('keyup', function(){
  $('form#interests .drop-down-container').css('display', 'block');

  var a = $(this).val();
  var not_like = {};

  $('form#interests .item').each(function(key, value){
    not_like[key] = $(this).attr('id');
  });

  $.ajax({
    url: 'search/interests',
    method: 'post',
    data: {'search': a, 'not_like': not_like, '_token': token},
    success: function(res){
      console.log(res);

      $('form#interests .drop-down-container > ol').html(res);
    }
  });
});

$('form#interests').on('click', '.drop-down-container > ol > li', function(){
  var id = $(this).attr('id');
  var html = $(this).text();
  $('form#interests .items-added').children().append($('<li>', {
    'id': id,
    'class': 'item',
    'html': html
  })).show('slow');

  $('form#interests .drop-down-container > ol > li').remove();
  $('form#interests textarea').val('');
  $('form#interests .drop-down-container').css('display', 'none');
});

$('form#interests').on('submit', function(e){
  e.preventDefault();
  var url = $(this).attr('action'),
      method = $(this).attr('method');
  $('form#interests .item').each(function(){
    var id = $(this).attr('id');

    $.ajax({
      url: url,
      method: method,
      data: {'id': id, '_token': token},
      success: function(res){
        console.log(res);
      }
    });

  });
});

$('form#languages textarea').on('keyup', function(){
  $('#languages .drop-down-container').css('display', 'block');

  var a = $(this).val();
  var not_like = {};

  $('#languages .item').each(function(key, value){
    not_like[key] = $(this).attr('id');
    $('#languages body ol li').each(key, value, function(){
      not_like[key] = $(this).attr('id');
    });
  });

  $.ajax({
    url: 'search/languages',
    method: 'post',
    data: {'search': a, 'not_like': not_like, '_token': token},
    success: function(res){
      console.log(res);

      $('#languages .drop-down-container > ol').html(res);
    }
  });
});

$('form#languages').on('click', '.drop-down-container > ol > li', function(){
  var id = $(this).attr('id');
  var html = $(this).text();
  $('#languages .items-added').children().append($('<li>', {
    'id': id,
    'class': 'item',
    'html': html
  })).show('slow');

  $('#languages .drop-down-container > ol > li').remove();
  $('form#languages textarea').val('');
  $('#languages .drop-down-container').css('display', 'none');
});

$('form#languages').on('submit', function(e){
  e.preventDefault();
  var url = $(this).attr('action'),
      method = $(this).attr('method');
  $('.item').each(function(){
    var id = $(this).attr('id');

    $.ajax({
      url: url,
      method: method,
      data: {'id': id, '_token': token},
      success: function(res){
        console.log(res);
      }
    });

  });
});


// var skill_set = {};
// var items_added = {};
// $('.skill-set > ol').on('click', 'li', function(){
//   var that = $(this);
//   var skill = that.attr('id');
//
//   $('.skill-set > ol > li').each(function(key, value){
//     skill_set[key] = $(this).attr('id');
//   });
//
//   $('.item').each(function(key, value){
//     items_added[key] = $(this).attr('id');
//
//     if($(this).attr('id') == skill){
//       that.remove();
//       var h = $('.skill-set > ol').html();
//
//       $.ajax({
//         url: 'add/skills',
//         method: 'post',
//         data: {'_token': token, 'skill_set': skill_set, 'items_added': items_added},
//         success: function(res){
//           console.log(res);
//           $('.skill-set > ol').html(h + res);
//         }
//       });
//
//     }
//     else{
//       // when skill-set-item is clicked
//       $('.skill-set > ol').on('click', 'li', function(){
//         console.log('here');
//           var id = $(this).val();
//           var html = $(this).html();
//
//           $('.items-added > ol').append($('<li>', {
//             'class': 'item',
//             'id': id,
//             'html': html
//           }));
//
//           $(this).remove();
//
//       });
//     }
//   });
// });


// else{
//   console.log('here');
//   $('.item').on('click', function(){
//     var id = $(this).val();
//     var html = $(this).html();
//
//     $('.items-added > ol').append($('<li>', {
//       'class': 'item',
//       'id': id,
//       'html': html
//     }));
//
//   });
// }

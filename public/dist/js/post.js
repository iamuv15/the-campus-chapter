/*$(document).ready(function(){
	/*$("#post_form").submit(function(){
		var post = $("#post_body").val();
		var post_image = $("#post_image").val();
		var uid = $("#uid").val();
		var postdate = $("#postdate").val();
		
		$.post('ajax.php?f=s', {post: post, post: post_image, post: uid, post: postdate}, function(data){
			$("#response").html(data);
			get_posts();
		});
		return false;
	});*/
	/*
	var start = 0;
	var limit = 7;
	
	function get_posts(start, limit){
		$.get('ajax.php', function(data){
			$('#newsfeed').html(data);	  
		});
	}
	//get_posts(start, limit);
	
	function yHandler(){
		var wrap = $('#newsfeed');
		// gets page content height
		//var contentHeight = $(window).scrollTop();
		//console.log(contentHeight);
		
		var contentHeight = wrap.height();
		//console.log(contentHeight);

		//gets vertical scroll position
		var yOffset = window.pageYOffset;
		//console.log(yOffset);

		//gets the inner window height + yOffset
		var y = yOffset + window.innerHeight;
		//console.log(y);

		if(y >= contentHeight){
			// Ajax call required.
			
			get_posts(start, limit);
		}
	}

	window.onscroll = yHandler;
	
});*/

$(document).ready(function(){
	var limit = 7;
	var start = 0;
	var action = 'inactive';
	var h = 2000;
	
	function load_posts(limit, start){
		$.ajax({
			url: 'ajax.php',
			method: 'POST',
			data: {limit: limit, start: start},
			cache: false,
			success: function(data){
				$('#newsfeed').append(data);
				if(data == ''){
					
				} else {
					$('#load-more').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>');
					action = 'inactive';
				}
			}
		});
	}
	
	if(action == 'inactive'){
		action = 'active';
		load_posts(limit, start);
	}
	
	$(window).scroll(function(){
		if(window.innerHeight + window.pageYOffset + h >= $('#newsfeed').height() && action == 'inactive'){
			action = 'active';
			start = start + limit;
			setTimeout(function(){
				load_posts(limit, start);
			});
		}
	});
});
// $(window).height()  $(window).scrollTop() 
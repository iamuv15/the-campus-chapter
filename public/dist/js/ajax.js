$(document).on('submit','.create_album', function() {
	var that = $(this),
		url = that.attr('action'),
		type = that.attr('method'),
		data = {};

	that.find('[name]').each(function(index, value){
		var that = $(this),
			name = that.attr('name'),
			value = that.val();
		data[name] = value;
	});
	
	var album_name = $('#album-name').val();
	
	$.ajax({
		url: url,
		type: type,
		data: data,
		success: function(response){
			if(response != 'error'){
				window.location.assign('photos.php?'+$.trim(album_name));
			}
		}
	});

	return false;
});


$('form.ajax-form').on('submit',function(event){
	event.preventDefault();
	var url = $(this).attr('action');
	//console.log(url);
	$.ajax({
		url: url,
		type: 'POST',
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success: function(data){
			console.log(data);
		}
	});
});

$('.multi-upload').on('submit',function(event){
	event.preventDefault();
	var url = $(this).attr('action');
	//console.log(url);
	$.ajax({
		url: url,
		type: 'POST',
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success: function(data){
			console.log(data);
		}
	});
});

$(document).on('click','.like-post', function() {
	var postid = $(this).attr('id');
	var uid = $(this).attr('name');
	$.post('ajax.php',{liked: 1, uid: uid, postid: postid}, function(){
		$.get('ajax.php?postid='+postid, function(data){
			$('#'+postid).replaceWith(data);
			$.get('ajax.php?likeid='+postid, function(data){
				$('#response-field-'+postid).replaceWith(data);
			});	
		});
	});
	return false;
});

$(document).on('click','.unlike-post', function() {
	var postid = $(this).attr('id');
	var uid = $(this).attr('name');
	$.post('ajax.php',{unliked: 1, uid: uid, postid: postid}, function(){
		$.get('ajax.php?postid='+postid, function(data){
			$('#'+postid).replaceWith(data);
			$.get('ajax.php?likeid='+postid, function(data){
				$('#response-field-'+postid).replaceWith(data);
			});
		});
	});
	return false;
});

$(document).on('keypress','form.comment-form', function(e) {
    if(e.which == 13) {
		var that = $(this),
			url = that.attr('action'),
			type = that.attr('method'),
			data = {};

		that.find('[name]').each(function(index, value){
			var that = $(this),
				name = that.attr('name'),
				value = that.val();
			data[name] = value;
		});

		$.ajax({
			url: url,
			type: type,
			data: data,
			success: function(response){
				$('#getComment').html(response);
			}
		});

		return false;
	}
});

// PIN POSTS AJAX
$(document).on('click', '.pin-btn', function(event){
	event.preventDefault();
		
	var pin_btn = $(this).attr('name');
	var postid = $(this).attr('id');
	var userid = $(this).attr('rel');

	$.post({
		url: 'ajax.php',
		type: 'POST',
		data: {pin_btn: pin_btn, postid: postid, userid: userid},
		success: function(response){
			$.get('ajax.php?pinResponse='+postid, function(data){
				$('.post-'+postid).replaceWith(data);
			});
		}
	});
});

$('form.debate-form').on('submit', function() {
		var that = $(this),
			url = that.attr('action'),
			type = that.attr('method'),
			data = {};

		that.find('[name]').each(function(index, value){
			var that = $(this),
				name = that.attr('name'),
				value = that.val();
			data[name] = value;
		});

		$.ajax({
			url: url,
			type: type,
			data: data,
			success: function(response){
				$('.debate-form-container').css('display', 'none');
				$('.open-me').css('display', 'none');
				//$('.flash').html('You have successfully submitted the form!').fadeIn('80000').hide('20000');
			}
		});

	return false;
});

$(document).on('click', 'a.post-drpbtn', function(){
	var post_drpdwn = $(this).attr('id');
	$.ajax({
		url: 'ajax.php?post_drpdwn='+post_drpdwn,
		success: function(h){
			$('.dropdown-menu').html(h);
			//delete button is clicked
			$(document).on('click', 'a.post-dropdown', function(){
				//$('body').css('overflow-y', 'hidden');
				//$('section').css('opacity', '0');
				$("button.accept").click(function(){
					//$('.accept').css('disable');
					$.post('ajax.php?accept='+post_drpdwn, function(){
						$.get('ajax.php?f=g', function(data){
							$('#newsfeed').html(data); 
						});
					});
					//$('body').css('overflow-y', 'auto');
					return false;
				});
				$("button.decline").click(function(){
					$.get('ajax.php?f=g', function(data){
						$('#newsfeed').html(data); 
					});
					return false;
					//$('body').css('overflow-y', 'auto');
				});
			});
		}
	});
});

$(document).ready( function() {
	$(document).on('change', '.btn-file :file', function() {
	var input = $(this);
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#img-upload').attr('src', e.target.result);
				$('#img-upload').css('display', 'block');
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgInp").change(function(){
		readURL(this);
	}); 	
});

$('form.unfriend').on('submit', function() {
	var that = $(this),
		url = that.attr('action'),
		type = that.attr('method'),
		data = {};
	
	that.find('[name]').each(function(index, value){
		var that = $(this),
			name = that.attr('name'),
			value = that.val();

		data[name] = value;
		sentto = data['sentto'];
	});

		$.post(url+sentto, data, function(res){
			
		});
		//$.get('ajax.php?f=g', function(data){
		//$('#newsfeed').html(data);

	return false;
});

//flying hearts
/*var HeartsBackground = {
  heartHeight: 60,
  heartWidth: 64,
  hearts: [],
  heartImage: 'http://i58.tinypic.com/ntnw5.png',
  maxHearts: 30,
  minScale: 0.4,
  draw: function() {
    this.setCanvasSize();
    this.ctx.clearRect(0, 0, this.w, this.h);
    for (var i = 0; i < this.hearts.length; i++) {
      var heart = this.hearts[i];
      heart.image = new Image();
      heart.image.style.height = heart.height;
      heart.image.src = this.heartImage;
      this.ctx.globalAlpha = heart.opacity;
      this.ctx.drawImage (heart.image, heart.x, heart.y, heart.width, heart.height);
    }
    this.move();
  },
  move: function() {
    for(var b = 0; b < this.hearts.length; b++) {
      var heart = this.hearts[b];
      heart.y += heart.ys;
      if(heart.y > this.h) {
        heart.x = Math.random() * this.w;
        heart.y = -1 * this.heartHeight;
      }
    }
  },
  setCanvasSize: function() {
    this.canvas.width = window.innerWidth;
    this.canvas.height = window.innerHeight;
    this.w = this.canvas.width;
    this.h = this.canvas.height;
  },
  initialize: function() {
    this.canvas = $('#canvas')[0];

    if(!this.canvas.getContext)
      return;

    this.setCanvasSize();
    this.ctx = this.canvas.getContext('2d');

    for(var a = 0; a < this.maxHearts; a++) {
      var scale = (Math.random() * (1 - this.minScale)) + this.minScale;
      this.hearts.push({
        x: Math.random() * this.w,
        y: Math.random() * this.h,
        ys: Math.random() + 1,
        height: scale * this.heartHeight,
        width: scale * this.heartWidth,
        opacity: scale
      });
    }

    setInterval($.proxy(this.draw, this), 30);
  }
};

$(document).ready(function(){
  HeartsBackground.initialize();
});*/	

$('#question-form').on('submit', function(){
	
	var that = $(this),
		url = that.attr('action'),
		type = that.attr('method'),
		data = {};
	
		that.find('[name]').each(function(index, value){
			var that = $(this),
				name = that.attr('name'),
				value = that.val();

			data[name] = value;
			userid = data['user-id'];
		});

		$.post(url+'?username='+userid, data, function(res){
			
		});
	
	return false;
})
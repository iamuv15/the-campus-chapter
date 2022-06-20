$('input#like-submit').on('click', function(){
   var name = $('input#name').val();
    if($.trim(name) != ''){
        $.post('..\..\post.php', {name: name}, function(data){
           $('div#name-data').text(data); 
        });
    }
});
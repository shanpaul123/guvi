
$(document).ready(function() {
	$(".check_login").on("click", function(){

   // setup some local variables
   var email = $('.email').val();
   var password = $('.password').val();
	

    // Let's select and cache all the fields
 request = $.ajax({
        url: "login.php",
        type: "post",
        data: {'email': email , 'password':password},

        success: function(data){
        if (data!="") { 
       $("#ajax_append_error").html(data);
   }  else{

   	window.location.href = 'dashboard.html';


      // $("#destination_id").html(data);
   }

    } 
    });



});
});


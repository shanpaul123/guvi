
$(document).ready(function() {


   // setup some local variables
	
    // Let's select and cache all the fields
 request = $.ajax({
        url: "user_data.php",
        type: "post",

        success: function(data){  

       $(".ajax_append").html(data);
      // $("#destination_id").html(data);

    } 
    });

  $(".logout").on("click", function(){
request = $.ajax({
        url: "logout.php",
        type: "post",

        success: function(data){  
              window.location.href = 'index.html';

    //   $(".ajax_append").html(data);
      // $("#destination_id").html(data);

    } 
    });
    });

});


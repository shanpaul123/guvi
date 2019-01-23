
$(document).ready(function() {
	$(".insert_data").on("click", function(){
   // setup some local variables
   var phone_no = $('#phone_no').val();
   var degree = $('#degree').val();
   var salary = $('#salary').val();
   var address = $('#address').val();
   var gender = $('#gender').val();
   var age = $('#age').val();
   var school_name = $('#school_name').val();
    // Let's select and cache all the fields
 request = $.ajax({
        url: "insert_data.php",
        type: "post",
        data: {'phone_no': phone_no , 'degree':degree  , 'salary':salary, 'address':address, 'gender':gender, 'age':age, 'school_name':school_name },

        success: function(data){
        if (data) { 
              window.location.href = 'dashboard.html';

   } else{
  window.location.href = 'dashboard.html';
   }
    } 
    });
});

$(".register_data").on("click", function(){
   // setup some local variables
   var first_name = $('#first_name').val();
   var last_name = $('#last_name').val();
   var email = $('#email').val();
   var phone = $('#phone').val();
   var password = $('#password').val();
   var confirm_password = $('#confirm_password').val();

    // Let's select and cache all the fields
 request = $.ajax({
        url: "userAccount.php",
        type: "post",
        data: {'first_name': first_name , 'last_name':last_name  , 'email':email, 'phone':phone, 'password':password, 'confirm_password':confirm_password },

        success: function(data){
          alert(data);
        if (data=='success') { 
              window.location.href = 'index.html';

   } else{
       $("#ajax_append_error").html(data);
   }

    } 
    });



});



});


// Input Fields
var lemail =  $('#email');
var lpassword =  $('#password');


// When the login button is clicked
$(document).on('click', '.lognBtn', function(e) {
  e.preventDefault();
  

  $.ajax({
     beforeSend: function(){
        $('.msg').html("Loading........");
     }
  });


  var request = $.ajax({
    url: "core.php",
    type: "POST",
    data: {email : lemail.val(),password :lpassword.val(), login : "login"},
    dataType: "html"
  });

  request.done(function(feeback){
    console.log(feeback);
    if (feeback == 1 ) 
    {
      window.location="dashboard.php";
    }
      else
    {
      $('.msg').html("Incorrect Credentials");
    }
  });

  request.fail(function(jqXHR, textStatus){
    console.log("failed");
  });

});

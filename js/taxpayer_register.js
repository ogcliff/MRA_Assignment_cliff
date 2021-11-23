// When the login button is clicked
$(document).on('click', '#rgbtn', function(e) {
  e.preventDefault();
  // Input Fields
  var tpin      = $('#tpin');
  var cbn       = $('#cbn');
  var trn       = $('#trn');
  var brd       = $('#brd');
  var phone     = $('#phone');
  var email     = $('#email');
  var location  = $('#location');
  var username  = $('#username');

  var request = $.ajax({
    url: "core.php",
    type: "POST",
    data: {tpin : tpin.val(),cbn :cbn.val(),trn : trn.val(),brd : brd.val(),phone : phone.val(),email :email.val(),location : location.val(),
          taxPayerRegister : "reg"},
    dataType: "html"
  });

  request.done(function(feeback){
    console.log(feeback);
    if (feeback == 0 ) 
    {
      alert("failed to save");
    }
      else if(feeback == 1)
    {
      alert("taxPayer ' "+trn.val()+" ' Saved");
      window.location="taxpayer_create.php";
    }
  });

  request.fail(function(jqXHR, textStatus){
    console.log("failed");
  });
});
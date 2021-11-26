// When the register button is clicked
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


  if( !tpin.val() || !cbn.val() || !trn.val() || !brd.val() || !phone.val() || !email.val() || !location.val() )
  {
    alert("Please Fill in all Fields");
  }else{
    var request = $.ajax({
        url: "core.php",
        type: "POST",
        data: {tpin : tpin.val(),cbn :cbn.val(),trn : trn.val(),brd : brd.val(),phone : phone.val(),email :email.val(),location : location.val(),
              taxPayerRegister : "reg"},
        dataType: "html"
      });

      request.done(function(feeback){
        console.log(feeback);
        var fbk = JSON.parse(feeback);

        if(fbk['Remark'])
        {
          alert(fbk['Remark']);
        }
        else if(fbk['TPIN']) 
        {
          alert("taxPayer ' "+trn.val()+" ' Saved Successfully");
          window.location="taxpayer_create.php";
        }
        else
        {
          alert("failed to save");
          window.location="taxpayer_create.php";
        }
      });

      request.fail(function(jqXHR, textStatus){
        console.log("failed");
      });
  }



});
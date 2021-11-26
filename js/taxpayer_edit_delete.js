    $(document).ready(
      function()
      {
        var request = $.ajax({
          url: "core.php",
          type: "GET",
          data: {getAll : "Tax Payers"},
          dataType: "html"
        });

        request.done(function(feeback){
          // console.log(feeback);
          var data = JSON.parse(feeback);
          if (data) {
             // console.log(data);
            renderHTML(data);
          }else{

          }
          
          
        });

        request.fail(function(jqXHR, textStatus){
          console.log("failed");
        });
      }
    ); 

    $taxpayers = $('#taxpayers');

    function renderHTML(data){
      $("#loader").hide();
          for (var i = 0; i < data.length; i++) {
            taxpayers.innerHTML += `
                    <tr>
                      <td>`+data[i].TradingName+`</td>
                      <td>
                        <small>
                          TPIN : `+data[i].TPIN+`<br>
                          BusinessCertificateNumber: `+data[i].BusinessCertificateNumber+`<br>
                          BusinessRegistrationDate : `+data[i].BusinessRegistrationDate+`<br>
                          MobileNumber : `+data[i].MobileNumber+`<br>
                          Email : `+data[i].Email+`<br>
                          PhysicalLocation : `+data[i].PhysicalLocation+`<br>
                        </small>
                      </td>
                      <td>
                        <button  onclick="editTaxpayer('`+data[i].TPIN+`','`+data[i].BusinessCertificateNumber+`','`+data[i].TradingName+`','`+data[i].BusinessRegistrationDate+`','`+data[i].MobileNumber+`','`+data[i].Email+`','`+data[i].PhysicalLocation+`')" class="btn btn-warning btn-icon-split">
                          <span class="icon text-white-50">
                            <i class="fas fa-pen"></i>
                          </span>
                          <span class="text">Edit</span>
                        </button>
                        <br>
                        <br>
                        <button onclick="deleteTaxpayer(`+data[i].TPIN+`)" class="btn btn-danger btn-icon-split">
                          <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                          </span>
                          <span class="text">Delete</span>
                        </button>
                      </td>
                    </tr>`;
          }
          $('#dataTable').DataTable();
  }


  function deleteTaxpayer(tpin)
  {
    if (confirm('Are you sure you want to delete this from your database?')) {
      $(document).ready(
        function()
        {

          $.ajax({
             beforeSend: function(){
                $taxpayers.hide();
                $("#loader").show();
             }
          });


          var request = $.ajax({
            url: "core.php",
            type: "POST",
            data: {deleteTP : "TaxPayer",TPIN : tpin},
            dataType: "html"
          });

          request.done(function(feeback){
            console.log(feeback);
            if (feeback == 1) 
            {
              alert("Tax payer deleted");
              window.location = "taxpayer_edit_delete.php";
            }
          });

          request.fail(function(jqXHR, textStatus){
            console.log("failed");
          });
        }
      ); 
    } else {
      // Do nothing!
      console.log('The was not deleted.');
    }
  }


  function editTaxpayer(TPIN,BusinessCertificateNumber,TradingName,BusinessRegistrationDate,MobileNumber,Email,PhysicalLocation)
  {
    $('#editLoader').hide();
    // Input Fields
    var tpin      = $('#tpin');
    var cbn       = $('#cbn');
    var trn       = $('#trn');
    var brd       = $('#brd');
    var phone     = $('#phone');
    var email     = $('#email');
    var location  = $('#location');


    // var dt = new Date(BusinessRegistrationDate);
    // var formarteddate = dt.getMonth()+'/'+dt.getDay()+'/'+dt.getFullYear();
    // console.log(formarteddate);

    tpin.val(TPIN);
    cbn.val(BusinessCertificateNumber);
    trn.val(TradingName);
    brd.val(BusinessRegistrationDate);
    phone.val(MobileNumber);
    email.val(Email);
    location.val(PhysicalLocation);

    $('#taxpayersModal').modal('show');

  }


  function sendEditTaxPayer()
  {
    // Input Fields
    var tpin      = $('#tpin');
    var cbn       = $('#cbn');
    var trn       = $('#trn');
    var brd       = $('#brd');
    var phone     = $('#phone');
    var email     = $('#email');
    var location  = $('#location');
    $('#editBtn').prop('disabled', true);
    $('#editLoader').show();


    var request = $.ajax({
      url: "core.php",
      type: "POST",
      data: {tpin : tpin.val(),cbn :cbn.val(),trn : trn.val(),brd : brd.val(),phone : phone.val(),email :email.val(),location : location.val(),
            editTaxpayer : "ed"},
      dataType: "html"
    });

    request.done(function(feeback){
      console.log(feeback);
      if (feeback) 
      {
        window.location="taxpayer_edit_delete.php";
      }
    });

    // request.fail(function(jqXHR, textStatus){
    //   console.log("failed");
    // });
  }



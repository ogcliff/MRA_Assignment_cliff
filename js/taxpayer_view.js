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
             console.log(data);
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
                    </tr>`;
          }

          $('#dataTable').DataTable();

    }
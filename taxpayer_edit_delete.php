<?php
session_start();
// Checking if the user is authorized to view the page
require 'classes/guards.php';
$guards = new Guards();
if (!$guards->authCheck()) { header("location:index.php"); }

// Loading the UI Element for the app
require 'classes/layouts.php';
$layout = new Layouts('dashboard');
$layout->header();
?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tax Payers</h1>
          <p class="mb-4">Edit or Delete Tax Payers.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Business</th>
                      <th>Business Details</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="taxpayers">

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

<?php
$layout->footer();
?>




  <script type="text/javascript">
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
          console.log(feeback);
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
                        <a href="#" class="btn btn-warning btn-icon-split">
                          <span class="icon text-white-50">
                            <i class="fas fa-pen"></i>
                          </span>
                          <span class="text">Edit</span>
                        </a>
                        <br>
                        <br>
                        <a href="#" onclick="deleteTaxpayer(`+data[i].TPIN+`)" class="btn btn-danger btn-icon-split">
                          <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                          </span>
                          <span class="text">Delete</span>
                        </a>
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





  </script>


    <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>



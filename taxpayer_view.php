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
          <h1 class="h3 mb-2 text-gray-800">MY TAX PAYERS</h1>
          <p class="mb-4">List of Tax payers added by <?php echo $_COOKIE['firstname']." ".$_COOKIE['lastname'] ?>.</p>

          <!-- DataTales -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tax Payers</h6>
              <small>You can search by anything</small>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Business</th>
                      <th>Business Details</th>
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

  </script>


    <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

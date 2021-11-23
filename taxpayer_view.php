<?php
session_start();
// Checking if the user is authorized to view the page
require 'classes/guards.php';
$guards = new Guards();
if (!$guards->authCheck()) { header("location:index.php"); }

// Loading the UI Element for the app
require 'classes/layouts.php';
$layout = new Layouts('View Tax payers');
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

  <script src="js/taxpayer_view.js" ></script>
    <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

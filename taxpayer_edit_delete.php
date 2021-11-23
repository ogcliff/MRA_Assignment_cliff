<?php
session_start();
// Checking if the user is authorized to view the page
require 'classes/guards.php';
$guards = new Guards();
if (!$guards->authCheck()) { header("location:index.php"); }

// Loading the UI Element for the app
require 'classes/layouts.php';
$layout = new Layouts('Edit or Delete Taxpayer');
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
              <h6 class="m-0 font-weight-bold text-primary">Tax payers List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Business Nmae</th>
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

          <!-- Large modal -->

          <div class="modal fade bd-example-modal-lg" id="taxpayersModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="col-lg-10 offset-lg-1">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Edit Tax Payer</h1>
                    </div>
                    <form class="user">
                      Update Tax payers Details
                      <hr class="sidebar-divider">
                      <div class="form-group">
                        <input type="hidden" class="form-control form-control-user" id="tpin" placeholder="TPIN">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="cbn" placeholder="Business Certificate Number">
                      </div>                
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="trn" placeholder="Trading Name">
                      </div>
                      Bussines registration date
                      <!-- <hr class="sidebar-divider"> -->
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="brd" placeholder="BusinessRegistrationDate">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="phone" placeholder="MobileNumber e.g 0995900000">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="location" placeholder="Physical Location">
                      </div>
                      <hr class="sidebar-divider">
                      <div class="form-group">
                        <button type="button" class="btn btn-primary btn-user btn-block" onclick="sendEditTaxPayer()">Edit Tax Payer</button>
                      </div>
                      <hr>

                    </form>
                  </div>
                </div>              
              </div>
            </div>
          </div>

        </div>

<?php
$layout->footer();
?>

  <script type="text/javascript" src="js/taxpayer_edit_delete.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


